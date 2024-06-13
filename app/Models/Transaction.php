<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $table = 'transaction';
    public $incrementing = true;
    protected $fillable = ['nama', 'alamat', 'no_hp', 'menu_id', 'jumlah', 'harga', 'status'];
    
    public function menu()
    {
        return $this->belongsTo(Menu::class, 'menu_id', 'id_menu');
    }
}
