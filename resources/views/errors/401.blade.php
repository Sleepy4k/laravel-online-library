@extends('layouts.error')

@section('title')
    @lang('error.404.title')
@endsection

@section('message')
    @lang('error.404.description')
@endsection

@section('image')
    <img class="img-error" src="{{ asset('images/samples/error-403.svg') }}" alt="Not Found">
@endsection
