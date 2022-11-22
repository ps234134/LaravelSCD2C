<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Albums extends Model
{
    use HasFactory;
    protected $table = 'albums';
    protected $fillable = [
        'id',
        'name',
        'year',
        'times_sold'
    ];
}
