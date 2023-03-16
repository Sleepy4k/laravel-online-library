@extends('layouts.admin')

@once
    @push('addon-css')
        <link rel="stylesheet" href="{{ asset('dist/css/choices.min.css') }}">
    @endpush
@endonce

@section('page-content')
    <form action="{{ route('admin.books.update', $book->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" id="title" name="title" class="form-control" placeholder="Book Title" value="{{ old('title', $book->title) }}" required autofocus>
        </div>

        <div class="form-group">
            <label for="image">Book Cover</label>
            <div>
                <img src="{{ old('image', $book->image) }}" class="show-image-cover img-fluid mb-3 col-sm-5" style="max-width: 12.5em; max-height: 12.5em;">
                <input type="file" id="image" name="image" class="form-control logo-cover" accept="image/*">
                <input type="hidden" name="old_image" value="{{ $book->image }}">
            </div>
        </div>

        <div class="form-group">
            <label for="year">Year Release</label>
            <input type="number" id="year" name="year" class="form-control" min="1" max="{{ date('Y') + 1 }}" value="{{ $book->year }}" required autofocus>
        </div>

        <div class="form-group">
            <label for="description">Book Description</label>
            <textarea class="form-control" id="description" name="description" rows="3" placeholder="Book Description" required autofocus>{{ old('description', $book->description) }}</textarea>
        </div>

        <div class="form-group">
            <label for="author_id">Book Author</label>
            <select name="author_id" id="author_id" class="choices form-select" required autofocus>
                @foreach ($authors as $author)
                    <option value="{{ $author->id }}" {{ $book->author_id == $author->id ? 'selected' : '' }}>{{ $author->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="publisher_id">Book Publisher</label>
            <select name="publisher_id" id="publisher_id" class="choices form-select" required autofocus>
                @foreach ($publishers as $publisher)
                    <option value="{{ $publisher->id }}" {{ $book->publisher_id == $publisher->id ? 'selected' : '' }}>{{ $publisher->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="category_id">Book Category</label>
            <select name="category_id" id="category_id" class="choices form-select" required autofocus>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ $book->category_id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="row">
            <div class="col-md-6 mb-4">
                <a class="btn btn-primary btn-block btn-lg shadow-lg mt-5" href="{{ route('admin.books.index') }}">Kembali</a>
            </div>
            <div class="col-md-6 mb-4">
                <button type="submit" class="btn btn-primary btn-block btn-lg shadow-lg mt-5">Submit</button>
            </div>
        </div>
    </form>
@endsection

@once
    @push('addon-script')
        <script src="{{ asset('dist/js/choices.min.js') }}"></script>
    @endpush
@endonce
