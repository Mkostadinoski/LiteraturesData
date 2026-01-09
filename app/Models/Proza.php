<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proza extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'image',
        'author',
        'content',
    ];
}