<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;
    protected $table = 'tbmenu';
    protected $primaryKey = 'id_menu';
    public $incrementing = true;
    protected $fillable = ['menu', 'deskripsi', 'harga','foto'];
    public $timestamps = false;

    public function transactions()
    {
        return $this->hasMany(Transaction::class, 'menu_id', 'id_menu');
    }
}
