<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Currencies extends Model
{
    protected $fillable = [
        'num_code',
        'char_code',
        'nominal',
        'value',
        'date'
    ];
}
