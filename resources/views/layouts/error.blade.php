<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        @includeIf('partials.head.meta')
        @includeIf('partials.head.title')
        @includeIf('partials.head.icon')
        @includeIf('partials.head.error.css')
    </head>
    <body>
        <div id="error">
            <div class="error-page container">
                <div class="col-md-8 col-12 offset-md-2">
                    <div class="text-center">
                        @hasSection('image')
                            @yield('image')
                        @endif

                        <h1 class="error-title">
                            @hasSection('title')
                                @yield('title')
                            @endif
                        </h1>

                        <p class='fs-5 text-gray-600'>
                            @hasSection('message')
                                @yield('message')
                            @endif
                        </p>

                        @auth
                            @if (auth()->user()->hasRole('admin'))
                                <a href="{{ route('admin.dashboard.index') }}" class="btn btn-lg btn-outline-primary mt-3">@lang('error.back_home')</a>
                            @else
                                <a href="{{ route('landing') }}" class="btn btn-lg btn-outline-primary mt-3">@lang('error.back_home')</a>
                            @endif
                        @else
                            <a href="{{ route('landing') }}" class="btn btn-lg btn-outline-primary mt-3">@lang('error.back_home')</a>
                        @endauth
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
