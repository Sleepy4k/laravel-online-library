@extends('layouts.user')

@section('page-content')
    <div class="container">
        <form action="{{ route('profile.store') }}" method="post">
            @csrf

            <div class="form-group position-relative mb-4">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $user->name) }}" required autofocus>
            </div>

            <div class="form-group position-relative mb-4">
                <label for="age">Age</label>
                <input type="number" name="age" id="age" class="form-control" value="{{ old('age', $user->age) }}" required autofocus>
            </div>

            <div class="form-group position-relative mb-4">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" class="form-control" value="{{ old('email', $user->email) }}" required autofocus>
            </div>

            <div class="form-group position-relative mb-4">
                <label for="phone">Phone</label>
                <input type="number" name="phone" id="phone" class="form-control" value="{{ old('phone', $user->phone) }}" required autofocus>
            </div>

            <div class="form-group position-relative mb-4">
                <label for="gender">Gender</label>
                <select name="gender" id="gender" class="form-control" required autofocus>
                    @foreach ($genders as $gender)
                        <option value="{{ $gender }}" {{ $user->gende == $gender ? 'selected' : '' }}>{{ ucfirst($gender) }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group position-relative mb-4">
                <label for="grade">Grade</label>
                <input type="text" name="grade" id="grade" class="form-control" value="{{ $user->grade->name() }}" disabled>
            </div>

            <div class="form-group position-relative mb-4">
                <label for="address">Address</label>
                <div>
                    <textarea name="address" id="address" class="form-control" cols="57" rows="5" placeholder="Your Home Address" required autofocus>{{ old('address', $user->address) }}</textarea>
                </div>
            </div>

            <div class="mb-4">
                <a href="{{ route('profile.index') }}" class="btn btn-success me-3">Kembali</a>
                <button class="btn btn-primary" type="submit">Submit Profile</button>
            </div>
        </form>
    </div>
@endsection
