@extends('layouts')

@section('title', 'Admin Panel')

@section('content')
<style>
.btn-logout{
    position: relative;
    float: right;
}
</style>
<meta name="csrf-token" content="{{ csrf_token() }}">

<form method="POST" action="{{ route('logout') }}">
@csrf
<div class="btn-logout">  
<br>
<button type="submit" class="btn btn-outline-primary" >Logout</button>
</div>
</form>

  <div class="container">
    <br>
    <h1>Search Books</h1>
    <form action="{{ route('admin.dashboard') }}" method="GET" class="mb-4">
        <div class="input-group">
            <input type="text" name="search" class="form-control" placeholder="Search books" value="{{ request('search') }}">
            <div class="input-group-append">
                <button type="submit" class="btn btn-primary">Search</button>
            </div>
        </div>
    </form>
    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif
    <table class="table">
        <thead>
            <tr>
                <th>Title</th>
                <th>Author</th>
                <th>Genre</th>
                <th>Published</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($books as $book)
                <tr>
                    <td>{{ $book->title }}</td>
                    <td>{{ $book->author }}</td>
                    <td>{{ $book->genre }}</td>
                    <td>{{ $book->published }}</td>
                <td>
                    <button type="button" class="btn btn-outline-primary edit-btn" data-book-id="{{ $book->id }}">Edit</button>

                    <button type="button" class="btn btn-outline-danger delete-btn" data-book-id="{{ $book->id }}">Delete</button>
                </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $books->appends(request()->input())->links() }}
</div>
@endsection

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {
            // Edit button click event
            $('.edit-btn').on('click', function () {
                var bookId = $(this).data('book-id');
                window.location.href = '/admin/books/' + bookId + '/edit';
            });


            var csrfToken = $('meta[name="csrf-token"]').attr('content');

            $('.delete-btn').on('click', function () {
                var bookId = $(this).data('book-id');
                var rowToDelete = $(this).closest('tr');
                if (confirm('Are you sure you want to delete this book?')) {
                    $.ajax({
                        url: '/admin/books/' + bookId,
                        type: 'DELETE',
                        headers: {
                        'X-CSRF-TOKEN': csrfToken
                    },
                        success: function (data) {
                            alert(data);
                            rowToDelete.remove();
                        },
                        error: function () {
                            alert('Error deleting the book.');
                        }
                    });
                }
            });
        });
    </script>
 