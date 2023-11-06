<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;


class books extends Model
{
    use HasFactory, Searchable;

    public $table =  'books';

    public $fillable = [
        'title',
        'author',
        'genre',
        'description',
        'isbn',
        'image',
        'published',
        'publisher'
    ];

    public function toSearchableArray(): array
    {
        return [
            'title' => $this->title,
            'author' => $this->author,
            'genre' => $this->genre,
            'isbn' => $this->isbn,
            'published' => $this->published,
            'publisher' => $this->publisher
        ];
    }
}
