<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bands extends Model
{
    use HasFactory;
    protected $table = 'bands';
    protected $fillable = [
        'id',
        'name',
        'genre',
        'founded',
        'active_till',
        'created_at',
        'updated_at',
    ];
}
