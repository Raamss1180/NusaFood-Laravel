<?php

namespace App\Http\Controllers;
use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class MenuController extends Controller
{
    public function index()
    {
        $tbmenu = Menu::all();
        return view('layouts.index', compact('tbmenu'));
    }
    public function menu()
    {
        $tbmenu = Menu::all();
        return view('menu.menu', compact('tbmenu'));
    }

    public function create()
    {
        return view('menu.menu-entry');
    }

    public function store(Request $request)
    {
        $request->validate([
            'menu' => 'required',
            'deskripsi' => 'required',
            'harga' => 'required',
            'foto' => 'required|file|mimes:png,jpg,jpeg|max:2048',
        ]);

        $foto = $request->file('foto');
        $nama_foto = time() . '_' . $foto->getClientOriginalName();
        $direktori = 'images-menu';
        $foto->move($direktori, $nama_foto);

        Menu::create([
            'menu' => $request->menu,
            'deskripsi' => $request->deskripsi,
            'harga' => $request->harga,
            'foto' => $nama_foto,
        ]);

        return redirect('/menu');
    }

    public function edit($id_menu)
    {
        $menu = Menu::find($id_menu);
        return view('Menu.menu-edit', compact('menu'));
    }

    public function update(Request $request, $id_menu)
    {
        $request->validate([
            'menu' => 'required',
            'deskripsi' => 'required',
            'harga' => 'required',
            'foto' => 'file|mimes:png,jpg,jpeg|max:2048',
        ]);

        $menu = Menu::find($id_menu);

        if($request->hasFile('foto')){
            File::delete('images-menu/'.$menu->foto);
            $foto = $request->file('foto');
            $nama_foto = time() . '_' . $foto->getClientOriginalName();
            $direktori = 'images-menu';
            $foto->move($direktori, $nama_foto);
            $menu->foto = $nama_foto;
        }

        $menu->update([
            'menu' => $request->menu,
            'deskripsi' => $request->deskripsi,
            'harga' => $request->harga,
        ]);

        return redirect('/menu');
    }

    public function destroy($id_menu)
    {
        $menu = Menu::find($id_menu);
        File::delete('images-menu/'.$menu->foto);
        $menu->delete();
        return redirect('/menu');
    }
}