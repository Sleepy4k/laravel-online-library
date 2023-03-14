@extends('layouts.error')

@section('title')
    @lang('error.429.title')
@endsection

@section('message')
    @lang('error.429.description')
@endsection

@section('image')
    <img class="img-error" src="{{ asset('user/images/samples/error-500.svg') }}" alt="Not Found">
@endsection
