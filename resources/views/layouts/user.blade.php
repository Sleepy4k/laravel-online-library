<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        @includeIf('partials.head.meta')
        @includeIf('partials.head.title')
        @includeIf('partials.head.icon')
        @includeIf('partials.head.user.css')
    </head>
    <body>
        <div id="app">
            <div id="main" class="layout-horizontal">
                <header class="mb-5">
                    @includeIf('partials.navbar.user.menu')
                </header>
                <div class="content-wrapper container">
                    <div class="page-heading">
                        @includeIf('partials.navbar.user.breadcrumb')
                    </div>
                    <div class="page-content">
                        <section class="row">
                            @hasSection ('page-content')
                                @yield('page-content')
                            @endif
                        </section>
                    </div>
                </div>
                @includeIf('partials.footer.user')
            </div>
        </div>

        @includeIf('partials.script.user')
    </body>
</html>
