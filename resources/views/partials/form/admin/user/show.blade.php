@extends('layouts.admin')

@section('page-content')
    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" id="name" name="name" class="form-control" placeholder="Name" value="{{ $user->name }}" disabled>
    </div>

    <div class="form-group">
        <label for="address">Address</label>
        <textarea name="address" id="address" class="form-control" placeholder="Your Home Address" disabled>{{ $user->address }}</textarea>
    </div>

    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" id="email" name="email" class="form-control" placeholder="Email" value="{{ $user->email }}" disabled>
    </div>

    <div class="form-group">
        <label for="age">Age</label>
        <input type="number" id="age" name="age" class="form-control" placeholder="Age" value="{{ $user->age }}" disabled>
    </div>

    <div class="form-group">
        <label for="phone">Phone</label>
        <input type="number" id="phone" name="phone" class="form-control" placeholder="Phone" value="{{ $user->phone }}" disabled>
    </div>

    <div class="form-group">
        <label for="gender">Gender</label>
        <select name="gender" id="gender" class="choices form-select" disabled>
            <option value="{{ $user->gender }}" selected>{{ ucfirst($user->gender) }}</option>
        </select>
    </div>

    <div class="form-group">
        <label for="grade_id">Gender</label>
        <select name="grade_id" id="grade_id" class="choices form-select" disabled>
            <option value="{{ $user->grade_id }}" selected>{{ $user->grade->name() }}</option>
        </select>
    </div>

    <div class="form-group">
        <label for="role">Role</label>
        <select name="role" id="role" class="choices form-select" disabled>
            <option value="{{ $user->getRoleNames()[0] }}" selected>{{ ucfirst($user->getRoleNames()[0]) }}</option>
        </select>
    </div>

    <div class="row">
        <div class="col-md-12 mb-4">
            <a class="btn btn-primary btn-block btn-lg shadow-lg mt-5" href="{{ route('admin.users.index') }}">Kembali</a>
        </div>
    </div>
@endsection
