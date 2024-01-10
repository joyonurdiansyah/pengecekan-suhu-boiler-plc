<!DOCTYPE html>
<html>

<head>
    
    @include('includes.meta')
    <title>@yield('title') | dashboard monitoring boiler</title>

    {{-- favicon --}}
    <link rel="apple-touch-icon" href="">
    <link rel="shortcut icon" href="image/x-icon" href="">

    @stack('before-style')
    {{-- style --}}
    @include('includes.style')
    {{-- @vite('resources/css/app.css') --}}
    @stack('after-style')
</head>

<body>
    <div id="app">
        @include('includes.sidebar')
        @include('includes.spinner')
        @yield('content')
        @include('includes.footer')

        @stack('before-script')
        {{-- script --}}
        @include('includes.script')
        {{-- @vite('resources/js/app.js') --}}
        @stack('after-script')
    </div>
</body>

</html>
