<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class bookseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $response = Http::get('https://fakerapi.it/api/v1/books?_quantity=100');
        $data = $response->json();

        foreach ($data['data'] as $book) {
            DB::table('books')->insert([
                'title' => $book['title'],
                'author' => $book['author'],
                'genre' => $book['genre'],
                'description' => $book['description'],
                'isbn' => $book['isbn'],
                'image' => $book['image'],
                'published' => $book['published'],
                'publisher' => $book['publisher'],
            ]);
        }
    }
}
