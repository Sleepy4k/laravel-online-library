@extends('layouts.auth')

@section('page-title', 'Sign Up')
@section('page-description', 'Input your data to register to our website.')

@once
    @push('addon-css')
        <link rel="stylesheet" href="{{ asset('dist/css/choices.min.css') }}">
    @endpush
@endonce

@section('page-content')
    @includeIf('partials.form.auth.register')

    <div class="text-center mt-5 text-lg fs-4">
        <p class='text-gray-600'>Already have an account? <a href="{{ route('login.index') }}" class="font-bold">Log in</a>. </p>
    </div>
@endsection

@once
    @push('addon-script')
        <script src="{{ asset('dist/js/choices.min.js') }}"></script>
    @endpush
@endonce
