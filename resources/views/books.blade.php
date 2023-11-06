<!doctype html>
@extends('layouts')

@section('title', 'Welcome Page')

@section('content')

  <div class="container">
    <br>
    <h1>Search Books</h1>
    <form action="{{ route('books.index') }}" method="GET" class="mb-4">
        <div class="input-group">
            <input type="text" name="search" class="form-control" placeholder="Search books" value="{{ request('search') }}">
            <div class="input-group-append">
                <button type="submit" class="btn btn-primary">Search</button>
            </div>
        </div>
    </form>

    <table class="table">
        <thead>
            <tr>
                <th>Title</th>
                <th>Author</th>
                <th>Genre</th>
                <th>Published</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($books as $book)
                <tr>
                    <td>{{ $book->title }}</td>
                    <td>{{ $book->author }}</td>
                    <td>{{ $book->genre }}</td>
                    <td>{{ $book->published }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $books->appends(request()->input())->links() }}
</div>
@endsection