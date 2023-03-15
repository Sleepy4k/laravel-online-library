@if (isset($meta->app_icon))
    @if (file_exists(public_path('storage/image/'.$meta->app_icon)))
        <link rel="shortcut icon" href="{{ asset('storage/image/'.$meta->app_icon) }}" type="image/png">
        <link rel="shortcut icon" href="{{ asset('storage/image/'.$meta->app_icon) }}" type="image/x-icon">
    @else
        <link rel="shortcut icon" href="{{ asset('assets/images/logo/favicon.png') }}" type="image/png">
        <link rel="shortcut icon" href="{{ asset('assets/images/logo/favicon.svg') }}" type="image/x-icon">
    @endif
@else
    <link rel="shortcut icon" href="{{ asset('assets/images/logo/favicon.png') }}" type="image/png">
    <link rel="shortcut icon" href="{{ asset('assets/images/logo/favicon.svg') }}" type="image/x-icon">
@endif


@stack('addon-icon')
