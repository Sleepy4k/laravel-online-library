@extends('layouts.error')

@section('title')
    @lang('error.419.title')
@endsection

@section('message')
    @lang('error.419.description')
@endsection

@section('image')
    <img class="img-error" src="{{ asset('images/samples/error-403.svg') }}" alt="Not Found">
@endsection
