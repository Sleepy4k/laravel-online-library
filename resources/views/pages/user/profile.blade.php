@extends('layouts.user')

@section('page-content')
    <div class="container">
        @includeIf('partials.form.user.profile.edit')
    </div>
@endsection
