<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Song extends Model
{
    use HasFactory;
    protected $table = 'songs';
    protected $fillable = [
        'id',
        'title',
        'singer',
        'created_at',
        'updated_at',
    ];

    public function albums()
    {
        return $this->belongsToMany(Album::class);
    }


}
