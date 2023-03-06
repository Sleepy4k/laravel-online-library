@extends('layouts.auth')

@section('page-title', 'Log in.')
@section('page-description', 'Log in with your data that you entered during registration.')

@section('page-content')
    @includeIf('partials.form.auth.login')

    <div class="text-center mt-5 text-lg fs-4">
        <p class="text-gray-600">Don't have an account? <a href="{{ route('register.index') }}" class="font-bold">Sign up</a>. </p>
    </div>
@endsection
