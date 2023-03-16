@extends('layouts.admin')

@section('page-content')
    <div class="form-group">
        <label for="title">Title</label>
        <input type="text" id="title" name="title" class="form-control" placeholder="Book Title" value="{{ $book->title }}" disabled>
    </div>

    <div class="form-group">
        <label for="image">Book Cover</label>
        <div>
            <img src="{{ $book->image }}" class="show-image-cover img-fluid mb-3 col-sm-5" style="max-width: 12.5em; max-height: 12.5em;">
        </div>
    </div>

    <div class="form-group">
        <label for="year">Year Release</label>
        <input type="number" id="year" name="year" class="form-control" min="1" max="{{ date('Y') + 1 }}" value="{{ $book->year }}" disabled>
    </div>

    <div class="form-group">
        <label for="description">Book Description</label>
        <textarea class="form-control" id="description" name="description" rows="3" placeholder="Book Description" disabled>{{ $book->description }}</textarea>
    </div>

    <div class="form-group">
        <label for="author_id">Book Author</label>
        <select name="author_id" id="author_id" class="choices form-select" disabled>
            <option value="{{ $book->author->id }}" selected>{{ $book->author->name }}</option>
        </select>
    </div>

    <div class="form-group">
        <label for="publisher_id">Book Publisher</label>
        <select name="publisher_id" id="publisher_id" class="choices form-select" disabled>
            <option value="{{ $book->publisher->id }}" selected>{{ $book->publisher->name }}</option>
        </select>
    </div>

    <div class="form-group">
        <label for="category_id">Book Category</label>
        <select name="category_id" id="category_id" class="choices form-select" disabled>
            <option value="{{ $book->category->id }}" selected>{{ $book->category->name }}</option>
        </select>
    </div>

    <div class="row">
        <div class="col-md-12 mb-4">
            <a class="btn btn-primary btn-block btn-lg shadow-lg mt-5" href="{{ route('admin.books.index') }}">Kembali</a>
        </div>
    </div>
@endsection
