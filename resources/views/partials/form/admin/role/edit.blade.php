@extends('layouts.admin')

@once
    @push('addon-css')
        <link rel="stylesheet" href="{{ asset('dist/css/choices.min.css') }}">
    @endpush
@endonce

@section('page-content')
    <form action="{{ route('admin.roles.update', $role->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" id="name" name="name" class="form-control" placeholder="Name" value="{{ old('name', $role->name) }}" required autofocus>
        </div>

        <div class="form-group">
            <label for="guard_name">Guard Name</label>
            <select name="guard_name" id="guard_name" class="choices form-select" required autofocus>
                @foreach ($guards as $guard)
                    <option value="{{ $guard }}" {{ $role->guard_name == $guard ? 'selected' : '' }}>{{ ucfirst($guard) }}</option>
                @endforeach
            </select>
        </div>

        <div class="row">
            <div class="col-md-6 mb-4">
                <a class="btn btn-primary btn-block btn-lg shadow-lg mt-5" href="{{ route('admin.roles.index') }}">Kembali</a>
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
