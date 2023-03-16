@extends('layouts.admin')

@section('page-content')
    <form action="{{ route('admin.application.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label for="app_name">Application Name</label>
            <input type="text" id="app_name" name="app_name" class="form-control" value="{{ old('app_name', $meta->app_name) }}" required autofocus>
        </div>

        <div class="form-group">
            <label for="app_icon">Application Icon</label>
            <div>
                <img src="{{ old('app_icon', $meta->app_icon) }}" class="show-image-cover img-fluid mb-3 col-sm-5" style="max-width: 12.5em; max-height: 12.5em;">
                <input type="file" id="app_icon" name="app_icon" class="form-control logo-cover" accept="image/*">
            </div>
        </div>

        <div class="form-group">
            <label for="meta_author">Meta Author</label>
            <input type="text" id="meta_author" name="meta_author" class="form-control" value="{{ old('meta_author', $meta->meta_author) }}"  required autofocus>
        </div>

        <div class="form-group">
            <label for="meta_keywords">Meta Keywords</label>
            <input type="text" id="meta_keywords" name="meta_keywords" class="form-control" value="{{ old('meta_keywords', $meta->meta_keywords) }}"  required autofocus>
        </div>

        <div class="form-group">
            <label for="meta_description">Meta Description</label>
            <textarea class="form-control" id="meta_description" name="meta_description" rows="3"  required autofocus>{{ old('meta_description', $meta->meta_description) }}</textarea>
        </div>

        <div class="row">
            <div class="col-md-6 mb-4">
                <a class="btn btn-primary btn-block btn-lg shadow-lg mt-5" href="{{ route('admin.application.index') }}">Kembali</a>
            </div>
            <div class="col-md-6 mb-4">
                <button type="submit" class="btn btn-primary btn-block btn-lg shadow-lg mt-5">Submit</button>
            </div>
        </div>
    </form>
@endsection
