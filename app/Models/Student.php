<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Facetories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = ['nama', 'nim', 'email', 'prodi'];
    protected $table = 'students';
}