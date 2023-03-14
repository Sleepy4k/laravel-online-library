@extends('layouts.error')

@section('title')
    @lang('error.403.title')
@endsection

@section('message')
    @if (config('app.debug') && config('app.env') == 'local')
        {{ $exception->getMessage() ?: 'Forbidden' }}
        <br>
        {{ $exception->getFile() }}:{{ $exception->getLine() }}
        <br>
        {{ $exception->getTraceAsString() }}
    @else
        @lang('error.403.description')
    @endif
@endsection

@section('image')
    <img class="img-error" src="{{ asset('user/images/samples/error-403.svg') }}" alt="Not Found">
@endsection
