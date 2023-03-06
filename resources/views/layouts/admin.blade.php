<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        @includeIf('partials.head.meta')
        @includeIf('partials.head.title')
        @includeIf('partials.head.icon')
        @includeIf('partials.head.admin.css')
    </head>
    <body class="{{ $class ?? '' }}">
        <div class="wrapper">
            @includeIf('partials.sidebar.admin')

            <div class="main-panel">
                @includeIf('partials.navbar.admin.main')

                <div class="content">
                    @hasSection ('page-content')
                        @yield('page-content')
                    @endif
                </div>

                @includeIf('partials.footer.admin')
            </div>
        </div>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>

        @includeIf('partials.script.admin')
    </body>
</html>
