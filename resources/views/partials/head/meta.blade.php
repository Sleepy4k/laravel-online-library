<meta charset="utf-8">
<meta name="csrf-token" content="{{ csrf_token() }}">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width,initial-scale=1.0">

<meta name="author" content="{{ isset($meta->meta_author) ? $meta->meta_autho : config('meta.author') }}">
<meta name="keywords" content="{{ isset($meta->meta_keywords) ? $meta->meta_keywords : config('meta.keyword') }}">
<meta name="description" content="{{ isset($meta->meta_description) ? $meta->meta_description : config('meta.description') }}">

<meta property="og:site_name" content="{{ isset($meta->app_name) ? $meta->app_name : config('app.name') }}">
<meta property="og:title" content="{{ basename(request()->path()) ? ucfirst(basename(request()->path())) : (isset($meta->app_name) ? $meta->app_name : config('app.name')) }}">
<meta property="og:description" content="{{ isset($meta->meta_description) ? $meta->meta_description : config('meta.description') }}">
<meta property="og:type" content="website">
<meta property="og:locale" content="{{ str_replace('_', '-', app()->getLocale()) }}">
<meta property="og:url" content="{{ config('app.url') }}">
<meta property="og:image" content="{{ isset($meta->app_icon) ? $meta->app_icon : asset('assets/images/logo/favicon.png') }}">
<meta property="og:image:width" content="1200">
<meta property="og:image:height" content="630">
<meta property="og:image:alt" content="{{ isset($meta->app_name) ? $meta->app_name : config('app.name') }}">

<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:title" content="{{ basename(request()->path()) ? ucfirst(basename(request()->path())) . ' |' : '' }} {{ (isset($meta->app_name) ? $meta->app_name : config('app.name')) }}">
<meta name="twitter:image" content="{{ isset($meta->app_icon) ? $meta->app_icon : asset('assets/images/logo/favicon.png') }}">

@stack('addon-meta')
