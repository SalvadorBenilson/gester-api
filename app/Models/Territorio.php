<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Territorio extends Model
{
    use HasFactory;

    protected $table = 'territorio';

    protected $fillable = [
        'numero',
        'tipo',
        'anexo',
    ];
}
