<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>@yield('page-title')</title>

        @vite('resources/js/app.js')
    </head>
    <body>
        <header>
            @include('partials.header')
        </header>

        <main>
            <div class="container text-light">
                @yield('main-content')
            </div>
        </main>

       <footer>
            @include('partials.footer')
       </footer>
    </body>
</html>

<style lang="scss" scoped>
</style>
