@extends('layouts')

@section('title', 'Edit Book')

@section('content')
<div class="container">
    <div class="row justify-content-center">
    
        <div class="col-md-6">
        <br><br> <br><br>
            <div class="card">
                
                <div class="card-header">{{ __('Edit Book') }}</div>

                <div class="card-body">
                    <form method="POST" action="/admin/books/{{ $books->id }}">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="title">{{ __('Title') }}</label>
                            <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ $books->title }}" required autocomplete="title" autofocus>
                            @error('title')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
<br>
                        <div class="form-group">
                            <label for="author">{{ __('Author') }}</label>
                            <input id="author" type="author" class="form-control @error('author') is-invalid @enderror" name="author" value="{{ $books->author}}" required autocomplete="author" autofocus>
                            @error('author')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
<br>
                        <div class="form-group">
                            <label for="genre">{{ __('Genre') }}</label>
                            <input id="genre" type="text" class="form-control @error('genre') is-invalid @enderror" name="genre" value="{{ $books->genre }}" required autocomplete="genre" autofocus>
                            @error('genre')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
<br>

<br>
                        <div class="form-group">
                            <label for="description">{{ __('Description') }}</label>
                            <textarea class="form-control @error('description') is-invalid @enderror" id="description" rows="3" 
                            name="description">{{ $books->description }}</textarea>
                            @error('description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
<br>
                        <div class="form-group">
                            <label for="isbn">{{ __('Isbn') }}</label>
                            <input id="isbn" type="number" class="form-control @error('isbn') is-invalid @enderror" value="{{ $books->isbn }}" name="isbn">
                            @error('isbn')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
<br>
                        <div class="form-group">
                            <label for="publisher">{{ __('Publisher') }}</label>
                            <input id="publisher" type="text" class="form-control @error('publisher') is-invalid @enderror"  value="{{ $books->publisher }}" name="publisher">
                            @error('publisher')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
<br>
                        <div class="form-group">
                            <label for="published">{{ __('Published') }}</label>
                            <input id="published" type="date" class="form-control @error('published') is-invalid @enderror" value="{{ $books->published }}" name="published">
                            @error('published')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
<br>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary center">
                                {{ __('Update') }}
                            </button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
