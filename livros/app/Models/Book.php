<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'author',
        'title',
        'subtitle',
        'edition',
        'publisher',
        'publication_year',
        'cover_image',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
