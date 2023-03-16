@extends('layouts.admin')

@section('page-content')
    <div class="form-group">
        <label for="app_name">Application Name</label>
        <input type="text" id="app_name" name="app_name" class="form-control" value="{{ $meta->app_name }}" disabled>
    </div>

    @if (isset($meta->app_logo))
        <div class="form-group">
            <label for="app_icon">Application Icon</label>
            <div>
                <img src="{{ $meta->app_icon }}" alt="{{ $meta->app_name }}">
            </div>
        </div>
    @endif

    <div class="form-group">
        <label for="meta_author">Meta Author</label>
        <input type="text" id="meta_author" name="meta_author" class="form-control" value="{{ $meta->meta_author }}" disabled>
    </div>

    <div class="form-group">
        <label for="meta_keywords">Meta Keywords</label>
        <input type="text" id="meta_keywords" name="meta_keywords" class="form-control" value="{{ $meta->meta_keywords }}" disabled>
    </div>

    <div class="form-group">
        <label for="meta_description">Meta Description</label>
        <textarea class="form-control" id="meta_description" name="meta_description" rows="3" disabled>{{ $meta->meta_description }}</textarea>
    </div>

    <div class="row">
        <div class="col-md-12 mb-4">
            <a class="btn btn-primary btn-block btn-lg shadow-lg mt-5" href="{{ route('admin.application.create') }}">Ubah</a>
        </div>
    </div>
@endsection
