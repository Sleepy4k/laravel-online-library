<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        @includeIf('partials.head.meta')
        @includeIf('partials.head.title')
        @includeIf('partials.head.icon')
        @vite(['resources/js/app.js', 'resources/js/horizontal-layout.js', 'resources/css/app.css', 'resources/js/swal.js', 'resources/css/fontawesome.css', 'resources/css/iconly.css'])
        @stack('addon-css')
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

        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script type="text/javascript" src="https://kit.fontawesome.com/740c5cc09f.js" crossorigin="anonymous"></script>
        @stack('addon-script')
    </body>
</html>
