<meta charset="utf-8">
<meta name="csrf-token" content="{{ csrf_token() }}">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width,initial-scale=1.0">

<meta name="author" content="{{ config('meta.author') }}">
<meta name="keywords" content="{{ config('meta.keyword') }}">
<meta name="description" content="{{ config('meta.description') }}">

<meta property="og:site_name" content="{{ config('app.name') }}">
<meta property="og:title" content="{{ basename(request()->path()) ? ucfirst(basename(request()->path())) : config('app.name') }}">
<meta property="og:description" content="{{ config('meta.description') }}">
<meta property="og:type" content="website">
<meta property="og:locale" content="{{ str_replace('_', '-', app()->getLocale()) }}">
<meta property="og:url" content="{{ config('app.url') }}">
<meta property="og:image" content="">
<meta property="og:image:width" content="1200">
<meta property="og:image:height" content="630">
<meta property="og:image:alt" content="{{ config('app.name') }}">

<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:title" content="{{ basename(request()->path()) ? ucfirst(basename(request()->path())) . ' |' : '' }} {{ config('app.name') }}">
<meta name="twitter:image" content="">

@yield('addon-meta')
