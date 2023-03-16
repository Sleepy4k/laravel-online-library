@extends('layouts.admin')

@section('page-content')
    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" id="name" name="name" class="form-control" placeholder="Name" value="{{ $permission->name }}" disabled>
    </div>

    <div class="form-group">
        <label for="guard_name">Guard Name</label>
        <select name="guard_name" id="guard_name" class="choices form-select" disabled>
            <option value="{{ $permission->guard_name }}" selected>{{ ucfirst($permission->guard_name) }}</option>
        </select>
    </div>

    <div class="row">
        <div class="col-md-12 mb-4">
            <a class="btn btn-primary btn-block btn-lg shadow-lg mt-5" href="{{ route('admin.roles.index') }}">Kembali</a>
        </div>
    </div>
@endsection
