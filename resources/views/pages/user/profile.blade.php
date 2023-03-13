@extends('layouts.user')

@section('page-content')
    <div class="container">
        <h1>{{ $user->name }}</h1>

        <div class="form-group position-relative mb-4">
            <label for="age">Age</label>
            <input type="text" id="age" class="form-control" value="{{ $user->age }}" disabled>
        </div>

        <div class="form-group position-relative mb-4">
            <label for="email">Email</label>
            <input type="text" id="email" class="form-control" value="{{ $user->email }}" disabled>
        </div>

        <div class="form-group position-relative mb-4">
            <label for="phone">Phone</label>
            <input type="text" id="phone" class="form-control" value="{{ $user->phone }}" disabled>
        </div>

        <div class="form-group position-relative mb-4">
            <label for="gender">Gender</label>
            <input type="text" id="gender" class="form-control" value="{{ $user->gender }}" disabled>
        </div>

        <div class="form-group position-relative mb-4">
            <label for="grade">Grade</label>
            <input type="text" id="grade" class="form-control" value="{{ $user->grade->name() }}" disabled>
        </div>

        <div class="form-group position-relative mb-4">
            <label for="address">Address</label>
            <div>
                <textarea name="address" id="address" class="form-control" placeholder="Your Home Address" style="resize: none" disabled>{{ $user->address }}</textarea>
            </div>
        </div>

        <div class="mb-4">
            <a href="{{ route('profile.create') }}">
                <button class="btn btn-primary">Edit Profile</button>
            </a>
        </div>
    </div>
@endsection
