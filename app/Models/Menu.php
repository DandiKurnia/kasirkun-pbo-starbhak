<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    protected $table = 'menus';

    protected $guarded = [''];

    public function jenis_menu(){
        return $this->belongsTo(JenisMenu::class);
    }

    public function transaksi(){
        return $this->hasMany(Transaksi::class);
    }
}
