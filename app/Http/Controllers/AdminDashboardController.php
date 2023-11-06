<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\books;

class AdminDashboardController extends Controller
{
    public function index(Request $request)
    {
        $query = books::query();

        if ($request->filled('search')) {
            $books = books::search($request->search)->paginate(10);
        } else {
            $books = $query->paginate(10);
        }

        $response = response()->view('admin.dashboard', compact('books'));

        // Set headers to prevent caching
        $response->header('Cache-Control', 'no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
        $response->header('Pragma', 'no-cache');
        $response->header('Expires', '0');

        return $response;
    }

    public function edit(Request $request)
    {
        $books = books::find($request->id);

        return view('admin.edit', compact('books'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'title' => 'required',
            'author' => 'required',
            'genre' => 'required',
            'description' =>'required',
            'isbn' => 'required',
            'published' => 'required',
            'publisher' => 'required',
        ]);

        $book = books::where('id',$id)
                ->update([
                    'title' =>$request->input('title'),
                    'author' =>$request->input('author'),
                    'genre' =>$request->input('genre'),
                    'description' =>$request->input('description'),
                    'isbn' =>$request->input('isbn'),
                    'publisher' =>$request->input('publisher'),
                    'published' =>$request->input('published'),
                
                ]);

            $books = books::paginate(10);
            $data = [
                'message' => 'Book details updated successfully',
                'book' => $book,
            ];
            $request->session()->flash('updateData', $data);

        return redirect()->route('admin.dashboard', compact('books'))->with('success', 'Book details updated successfully');
    }

    public function destroy(Request $request, $id)
    {
        $book = books::find($id);

        if (!$book) {
            return  'Book not found';
        }
        $book->delete();
        return 'Book deleted successfully';
    }

}
