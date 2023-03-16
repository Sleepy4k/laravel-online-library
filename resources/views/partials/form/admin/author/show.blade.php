@extends('layouts.admin')

@section('page-content')
    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" id="name" name="name" class="form-control" value="{{ $author->name }}" disabled>
    </div>

    <div class="row">
        <div class="col-md-12 mb-4">
            <a class="btn btn-primary btn-block btn-lg shadow-lg mt-5" href="{{ route('admin.authors.index') }}">Kembali</a>
        </div>
    </div>
@endsection
