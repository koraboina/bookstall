<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\books;

class bookController extends Controller
{
    public function index(Request $request)
    {
        $query = books::query();

        if ($request->filled('search')) {
            $books = books::search($request->search)->paginate(10);
        } else {
            $books = $query->paginate(10);
        }
    
        return view('books', compact('books'));
    }
}
