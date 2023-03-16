@extends('layouts.admin')

@once
    @push('addon-css')
        <link rel="stylesheet" href="{{ asset('dist/css/choices.min.css') }}">
    @endpush
@endonce

@section('page-content')
    <form action="{{ route('admin.users.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" id="name" name="name" class="form-control" placeholder="Name" value="{{ old('name') }}" required autofocus>
        </div>

        <div class="form-group">
            <label for="address">Address</label>
            <textarea name="address" id="address" class="form-control" placeholder="Your Home Address" required autofocus>{{ old('address') }}</textarea>
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" class="form-control" placeholder="Email" value="{{ old('email') }}" required autofocus>
        </div>

        <div class="form-group">
            <label for="age">Age</label>
            <input type="number" id="age" name="age" class="form-control" placeholder="Age" value="{{ old('age') }}" required autofocus>
        </div>

        <div class="form-group">
            <label for="phone">Phone</label>
            <input type="number" id="phone" name="phone" class="form-control" placeholder="Phone" value="{{ old('phone') }}" required autofocus>
        </div>

        <div class="form-group">
            <label for="gender">Gender</label>
            <select name="gender" id="gender" class="choices form-select" required autofocus>
                @foreach ($genders as $gender)
                    <option value="{{ $gender }}">{{ ucfirst($gender) }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="grade_id">Gender</label>
            <select name="grade_id" id="grade_id" class="choices form-select" required autofocus>
                @foreach ($grades as $grade)
                    <option value="{{ $grade->id }}">{{ $grade->name() }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="role">Role</label>
            <select name="role" id="role" class="choices form-select" required autofocus>
                @foreach ($roles as $role)
                    <option value="{{ $role }}">{{ ucfirst($role) }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" id="password" name="password" class="form-control" placeholder="Password" value="{{ old('password') }}" required autofocus>
        </div>

        <div class="form-group">
            <label for="password_confirmation">Password Confirmation</label>
            <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" placeholder="Password Confirmation" value="{{ old('password_confirmation') }}" required autofocus>
        </div>

        <div class="row">
            <div class="col-md-6 mb-4">
                <a class="btn btn-primary btn-block btn-lg shadow-lg mt-5" href="{{ route('admin.users.index') }}">Kembali</a>
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
