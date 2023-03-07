<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        @includeIf('partials.head.meta')
        @includeIf('partials.head.title')
        @includeIf('partials.head.icon')
        @includeIf('partials.head.auth.css')
    </head>
    <body>
        <div id="auth">
            <div class="row h-100">
                <div class="col-lg-5 col-12">
                    <div id="auth-left">
                        <div class="auth-logo">
                            <a href="{{ route('landing.index') }}">
                                <img src="{{ asset('user/images/logo/logo.svg') }}" alt="Logo">
                            </a>
                        </div>
                        <h1 class="auth-title">
                            @hasSection ('page-content')
                                @yield('page-title')
                            @endif
                        </h1>
                        <p class="auth-subtitle mb-5">
                            @hasSection ('page-content')
                                @yield('page-description')
                            @endif
                        </p>

                        @hasSection ('page-content')
                            @yield('page-content')
                        @endif
                    </div>
                </div>
                <div class="col-lg-7 d-none d-lg-block">
                    <div id="auth-right"></div>
                </div>
            </div>
        </div>
    </body>
</html>
