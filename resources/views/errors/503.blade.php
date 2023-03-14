@extends('layouts.error')

@section('title')
    @lang('error.503.title')
@endsection

@section('message')
    @lang('error.503.description')
@endsection

@section('image')
    <img class="img-error" src="{{ asset('images/samples/error-500.svg') }}" alt="Not Found">
@endsection
