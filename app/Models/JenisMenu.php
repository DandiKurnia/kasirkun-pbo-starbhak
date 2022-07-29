<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisMenu extends Model
{
    use HasFactory;

    protected $table = 'jenis_menus';

    protected $guarded = [''];

    public function user(){
        return $this->hasMany(Menu::class);
    }
}
