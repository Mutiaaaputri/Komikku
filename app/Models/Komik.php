<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Komik extends Model
{
    use HasFactory;
    // protected $table = "komik";
    protected $fillable = ['judul', 'genre' , 'pengarang','tanggal_publikasi'];
}
