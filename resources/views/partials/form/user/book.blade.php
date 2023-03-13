@extends('layouts.user')

@section('page-content')
    <form disabled>
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" id="title" class="form-control" value="{{ $book->title }}" disabled>
        </div>

        <div class="form-group">
            <label for="image">Image</label>
            <div>
                <img id="image" src="{{ $book->image }}" alt="{{ $book->title }}" class="show-image-candidate img-fluid mb-3 col-sm-5" style="max-width: 12.5em; max-height: 12.5em;">
            </div>
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea id="description" class="form-control" style="resize: none" disabled>{{ $book->description }}</textarea>
        </div>

        <div class="form-group">
            <label for="year">Year</label>
            <input type="text" id="year" class="form-control" value="{{ $book->year }}" disabled>
        </div>

        <div class="form-group">
            <label for="author">Author</label>
            <input type="text" id="author" class="form-control" value="{{ $book->author->name }}" disabled>
        </div>

        <div class="form-group">
            <label for="publisher">Publisher</label>
            <input type="text" id="publisher" class="form-control" value="{{ $book->publisher->name }}" disabled>
        </div>

        <div class="form-group">
            <label for="category">Category</label>
            <input type="text" id="category" class="form-control" value="{{ $book->category->name }}" disabled>
        </div>

        <div class="row">
            <div class="col-md-12 mb-4">
                <a class="btn btn-primary btn-block btn-lg shadow-lg mt-5" href="{{ route('books.index') }}">Kembali</a>
            </div>
        </div>
    </form>
@endsection
