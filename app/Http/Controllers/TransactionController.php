<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function index()
    {
        $transactions = Transaction::all();
        return view('Transaction.transaction', compact('transactions'));
    }

    public function pesan()
    {
        $tbmenu = Menu::all();
        return view('Transaction.pesanan', compact('tbmenu'));
    }

    public function create()
    {
        $tbmenu = Menu::all();
        return view('Transaction.create', compact('tbmenu'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'no_hp' => 'required|string|max:15',
            'menu_id' => 'required|exists:tbmenu,id_menu',
            'jumlah' => 'required|integer|min:1',
        ]);

        $menu = Menu::findOrFail($request->menu_id);
        $totalHarga = $menu->harga * $request->jumlah;

        Transaction::create([
            'nama' => $request->input('nama'),
            'alamat' => $request->input('alamat'),
            'no_hp' => $request->input('no_hp'),
            'menu_id' => $request->input('menu_id'),
            'jumlah' => $request->input('jumlah'),
            'harga' => $totalHarga,
            'status' => $request->input('status'),
        ]);

        return redirect('index')->with('success', 'Pemesanan berhasil!');
    }

    public function edit($id)
    {
        $transaction = Transaction::findOrFail($id);
        $tbmenu = Menu::all();
        return view('Transaction.transaction-edit', compact('transaction', 'tbmenu'));
    }

    public function update(Request $request, $id)
    {
         // Validasi data request
        $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'no_hp' => 'required|string|max:15',
            'menu_id' => 'required|exists:tbmenu,id_menu',
            'jumlah' => 'required|integer|min:1',
        ]);

        // Cari transaksi berdasarkan ID
        $transaction = Transaction::findOrFail($id);

        $menu = Menu::findOrFail($request->menu_id);
        $totalHarga = $menu->harga * $request->jumlah;

        // Update transaksi dengan data yang sudah divalidasi
        $transaction->update([
            'nama' => $request->input('nama'),
            'alamat' => $request->input('alamat'),
            'no_hp' => $request->input('no_hp'),
            'menu_id' => $request->input('menu_id'),
            'jumlah' => $request->input('jumlah'),
            'harga' => $totalHarga,
            'status' => $request->input('status'),
        ]);

        return redirect ('transaction')->with('success', 'Transaksi berhasil diperbarui');
    }

    public function destroy($id)
    {
        $transaction = Transaction::findOrFail($id);
        $transaction->delete();

        return redirect('/transaction')->with('success', 'Transaksi berhasil dihapus!');
    }
}