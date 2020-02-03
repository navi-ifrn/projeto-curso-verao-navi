<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Papel extends Model
{
    protected $fillable = [
        'nome'
    ];

    protected $table = 'papeis';
}
