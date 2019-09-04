<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <script>
        window.trans = <?php
        // copy all translations from /resources/lang/CURRENT_LOCALE/* to global JS variable
        $lang_files = File::files(resource_path() . '/lang/' . App::getLocale());
        $trans = [];
        foreach ($lang_files as $f) {
            $filename = pathinfo($f)['filename'];
            $trans[$filename] = trans($filename);
        }
        echo json_encode($trans);
        ?>;
    </script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-dark shadow-sm">
            <div class="container">
                @if (Auth::check())
                    <a class="navbar-brand" href="{{ route('main') }}">
                        <div class="logo">
                            <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" viewBox="0 0 250 120"><defs id="SvgjsDefs13914"></defs><g id="SvgjsG13915" rel="mainfill" name="main_text" xmlns:name="main_text" transform="translate(-1.6200000047683716,-120.6602554321289)" fill="#ffffff"><path d="M17.52 216.31L17.43 216.31C16.87 216.31 16.42 216.77 16.42 217.32L16.42 226.50C16.42 226.66 16.29 226.83 16.13 226.83L4.02 226.83C3.86 226.83 3.73 226.66 3.73 226.50L3.73 217.32C3.73 216.77 3.28 216.31 2.73 216.31L2.63 216.31C2.08 216.31 1.62 216.77 1.62 217.32L1.62 238.99C1.62 239.55 2.08 240 2.63 240L2.73 240C3.28 240 3.73 239.55 3.73 238.99L3.73 229.23C3.73 229.03 3.86 228.90 4.02 228.90L16.13 228.90C16.29 228.90 16.42 229.03 16.42 229.23L16.42 238.99C16.42 239.55 16.87 240 17.43 240L17.52 240C18.07 240 18.53 239.55 18.53 238.99L18.53 217.32C18.53 216.77 18.07 216.31 17.52 216.31ZM38.06 216.57L38.00 216.51C37.54 216.18 36.93 216.31 36.60 216.77C36.60 216.77 31.25 224.68 30.92 225.14C30.28 226.05 30.41 226.18 29.66 225.11C29.30 224.59 24.01 216.77 24.01 216.77C23.69 216.31 23.07 216.18 22.62 216.51L22.52 216.57C22.07 216.86 21.97 217.51 22.29 217.97C22.29 217.97 28.30 226.66 28.69 227.21C29.08 227.80 29.27 228.35 29.27 229.10C29.27 229.84 29.27 238.99 29.27 238.99C29.27 239.55 29.72 240 30.28 240L30.34 240C30.89 240 31.35 239.55 31.35 238.99C31.35 238.99 31.35 229.88 31.35 229.13C31.35 228.42 31.57 227.73 31.96 227.15C32.35 226.60 38.32 217.97 38.32 217.97C38.65 217.51 38.52 216.86 38.06 216.57ZM49.03 216.31L43.09 216.31C42.54 216.31 42.09 216.77 42.09 217.32L42.09 238.99C42.09 239.55 42.54 240 43.09 240L43.19 240C43.74 240 44.20 239.55 44.20 238.99L44.20 231.37C44.20 231.08 44.29 231.01 44.59 231.01L49.03 231.01C53.54 231.01 57.21 228.06 57.21 223.55C57.21 219.04 53.54 216.31 49.03 216.31ZM49.03 228.90L44.55 228.90C44.26 228.90 44.20 228.80 44.20 228.51L44.20 218.75C44.20 218.49 44.29 218.39 44.59 218.39L49.03 218.39C52.41 218.39 55.13 220.17 55.13 223.55C55.13 226.92 52.41 228.90 49.03 228.90ZM73.99 237.89L63.76 237.89C63.47 237.89 63.41 237.79 63.41 237.50L63.41 229.26C63.41 228.97 63.50 228.90 63.83 228.90L72.14 228.90C72.69 228.90 73.14 228.45 73.14 227.90L73.14 227.83C73.14 227.28 72.69 226.83 72.14 226.83L63.76 226.83C63.47 226.83 63.41 226.73 63.41 226.40L63.41 218.75C63.41 218.49 63.50 218.39 63.83 218.39L73.37 218.39C73.92 218.39 74.38 217.93 74.38 217.38L74.38 217.32C74.38 216.77 73.92 216.31 73.37 216.31L62.30 216.31C61.75 216.31 61.33 216.77 61.33 217.32L61.33 238.99C61.33 239.55 61.75 240 62.30 240L73.99 240C74.54 240 74.99 239.55 74.99 238.99L74.99 238.90C74.99 238.35 74.54 237.89 73.99 237.89ZM93.72 238.09C92.90 238.09 94.04 235.10 94.04 233.35C94.04 231.08 93.03 229.62 91.28 228.61C90.83 228.35 90.86 228.19 91.22 227.93C92.84 226.79 93.94 225.17 93.94 222.96C93.94 218.71 90.11 216.31 85.73 216.31L80.12 216.31C79.57 216.31 79.11 216.77 79.11 217.61C79.11 217.61 79.11 239.03 79.11 239.29C79.11 239.55 79.57 240 80.12 240L80.22 240C80.77 240 81.22 239.61 81.22 239.29C81.22 238.99 81.22 230.01 81.22 230.01C81.22 229.71 81.32 229.65 81.61 229.65L86.67 229.65C90.44 229.65 91.90 230.72 91.90 233.35C91.90 235.59 91.15 238.15 92.06 239.35C92.42 239.84 93.13 240.19 93.72 240.19C95.70 240.19 95.50 238.09 93.72 238.09ZM85.73 227.54L81.58 227.54C81.29 227.54 81.22 227.44 81.22 227.15L81.22 218.75C81.22 218.49 81.32 218.39 81.61 218.39L85.73 218.39C88.95 218.39 91.87 219.85 91.87 222.96C91.87 226.01 89.04 227.54 85.73 227.54ZM111.95 216.31L99.23 216.31C98.68 216.31 98.23 216.77 98.23 217.32L98.23 217.38C98.23 217.93 98.68 218.39 99.23 218.39L104.20 218.39C104.49 218.39 104.55 218.49 104.55 218.81L104.55 238.99C104.55 239.55 105.01 240 105.56 240L105.62 240C106.18 240 106.63 239.55 106.63 238.99L106.63 218.75C106.63 218.49 106.73 218.39 107.05 218.39L111.95 218.39C112.50 218.39 112.96 217.93 112.96 217.38L112.96 217.32C112.96 216.77 112.50 216.31 111.95 216.31ZM133.56 216.31L133.47 216.31C132.92 216.31 132.46 216.77 132.46 217.32L132.46 229.06C132.46 234.71 130.90 238.47 125.71 238.47C120.49 238.47 118.60 234.71 118.60 229.06L118.60 217.32C118.60 216.77 118.18 216.31 117.63 216.31L117.53 216.31C116.98 216.31 116.53 216.77 116.53 217.32L116.53 229.06C116.53 235.85 118.93 240.42 125.71 240.42C132.46 240.42 134.57 235.85 134.57 229.06L134.57 217.32C134.57 216.77 134.12 216.31 133.56 216.31ZM151.28 226.60C152.68 225.75 153.88 224.39 153.88 222.31C153.88 218.03 150.60 216.31 146.09 216.31L140.44 216.31C139.89 216.31 139.44 216.77 139.44 217.32L139.44 238.99C139.44 239.55 139.89 240 140.44 240L146.87 240C151.22 240 155.01 237.40 155.01 233.15C155.01 230.62 153.26 228.55 151.25 227.25C150.89 227.02 150.83 226.89 151.28 226.60ZM151.80 222.31C151.80 225.33 149.43 225.79 146.09 225.79C146.09 225.79 142.68 225.79 142.20 225.79C141.74 225.79 141.55 225.53 141.55 225.07C141.55 223.42 141.55 219.39 141.55 219.07C141.55 218.68 141.71 218.42 142.26 218.42C142.81 218.42 146.25 218.42 146.25 218.42C149.53 218.42 151.80 219.23 151.80 222.31ZM146.87 237.89C146.87 237.89 142.81 237.89 142.33 237.89C141.84 237.89 141.55 237.63 141.55 237.18C141.55 236.82 141.55 230.72 141.55 228.61C141.55 228.16 141.71 227.90 142.20 227.90C142.65 227.90 146.87 227.90 146.87 227.90C150.05 227.90 152.94 230.04 152.94 233.15C152.94 236.27 150.05 237.89 146.87 237.89ZM171.95 237.89L161.73 237.89C161.44 237.89 161.37 237.79 161.37 237.50L161.37 229.26C161.37 228.97 161.47 228.90 161.80 228.90L170.10 228.90C170.65 228.90 171.11 228.45 171.11 227.90L171.11 227.83C171.11 227.28 170.65 226.83 170.10 226.83L161.73 226.83C161.44 226.83 161.37 226.73 161.37 226.40L161.37 218.75C161.37 218.49 161.47 218.39 161.80 218.39L171.34 218.39C171.89 218.39 172.34 217.93 172.34 217.38L172.34 217.32C172.34 216.77 171.89 216.31 171.34 216.31L160.27 216.31C159.72 216.31 159.30 216.77 159.30 217.32L159.30 238.99C159.30 239.55 159.72 240 160.27 240L171.95 240C172.50 240 172.96 239.55 172.96 238.99L172.96 238.90C172.96 238.35 172.50 237.89 171.95 237.89Z" fill="#ffffff" style="fill: rgb(255, 255, 255);"></path></g><g id="SvgjsG13916" rel="mainfill" name="symbol" xmlns:name="symbol_mainfill" transform="translate(40.67000961303711,-4.674249649047852) scale(1)" fill="#ffffff"><path d="M58.478,26.77H21.38c-5.182,0-9.423,4.24-9.423,9.423v25.922c0,5.183,4.24,9.423,9.423,9.423h37.099  c5.182,0,9.423-4.24,9.423-9.423V36.193C67.901,31.011,63.661,26.77,58.478,26.77z M24.768,31.67  c-3.613,1.936-6.221,4.771-7.854,6.968c-0.619,0.833-1.939,0.251-1.736-0.766c1.244-6.215,5.653-7.783,9.059-8.024  C25.277,29.774,25.687,31.178,24.768,31.67z M71.426,17.292H57.717c-1.992-1.559-4.277-2.761-6.759-3.508l5.172-5.171  c0.901-0.901,0.901-2.361,0-3.262c-0.901-0.901-2.361-0.901-3.262,0l-7.191,7.191c-0.116,0.116-0.217,0.242-0.303,0.374  C45.249,12.914,45.125,12.91,45,12.91c-0.125,0-0.249,0.003-0.373,0.005c-0.086-0.132-0.187-0.258-0.303-0.374L37.133,5.35  c-0.901-0.901-2.361-0.901-3.262,0c-0.901,0.901-0.901,2.361,0,3.262l5.172,5.171c-2.483,0.747-4.767,1.949-6.759,3.508H18.574  c-8.848,0-16.087,7.239-16.087,16.087v31.55c0,8.848,7.239,16.087,16.087,16.087h0.213v1.596c0,1.492,1.221,2.713,2.713,2.713h1.651  c1.492,0,2.713-1.221,2.713-2.713v-1.596h38.272v0.924c0,1.492,1.221,2.713,2.713,2.713H68.5c1.492,0,2.713-1.221,2.713-2.713  v-0.924h0.213c8.848,0,16.087-7.239,16.087-16.087v-31.55C87.513,24.531,80.274,17.292,71.426,17.292z M20.276,74.958  c-6.373,0-11.586-5.214-11.586-11.586V35.163c0-6.373,5.214-11.586,11.586-11.586h39.306c6.373,0,11.587,5.214,11.587,11.586v28.209  c0,6.373-5.214,11.586-11.587,11.586H20.276z M79.019,59.404c-1.415,0-2.562-1.147-2.562-2.562c0-1.415,1.147-2.562,2.562-2.562  s2.562,1.147,2.562,2.562C81.581,58.257,80.434,59.404,79.019,59.404z M79.019,51.717c-1.415,0-2.562-1.147-2.562-2.562  s1.147-2.562,2.562-2.562s2.562,1.147,2.562,2.562S80.434,51.717,79.019,51.717z M79.019,44.029c-1.415,0-2.562-1.147-2.562-2.562  s1.147-2.562,2.562-2.562s2.562,1.147,2.562,2.562S80.434,44.029,79.019,44.029z" fill="#ffffff" style="fill: rgb(255, 255, 255);"></path></g></svg>
                        </div>
                    </a>
                @else
                    <a class="navbar-brand" href="{{ route('welcome') }}">
                        <div class="logo">
                            <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" viewBox="0 0 250 120"><defs id="SvgjsDefs13914"></defs><g id="SvgjsG13915" rel="mainfill" name="main_text" xmlns:name="main_text" transform="translate(-1.6200000047683716,-120.6602554321289)" fill="#ffffff"><path d="M17.52 216.31L17.43 216.31C16.87 216.31 16.42 216.77 16.42 217.32L16.42 226.50C16.42 226.66 16.29 226.83 16.13 226.83L4.02 226.83C3.86 226.83 3.73 226.66 3.73 226.50L3.73 217.32C3.73 216.77 3.28 216.31 2.73 216.31L2.63 216.31C2.08 216.31 1.62 216.77 1.62 217.32L1.62 238.99C1.62 239.55 2.08 240 2.63 240L2.73 240C3.28 240 3.73 239.55 3.73 238.99L3.73 229.23C3.73 229.03 3.86 228.90 4.02 228.90L16.13 228.90C16.29 228.90 16.42 229.03 16.42 229.23L16.42 238.99C16.42 239.55 16.87 240 17.43 240L17.52 240C18.07 240 18.53 239.55 18.53 238.99L18.53 217.32C18.53 216.77 18.07 216.31 17.52 216.31ZM38.06 216.57L38.00 216.51C37.54 216.18 36.93 216.31 36.60 216.77C36.60 216.77 31.25 224.68 30.92 225.14C30.28 226.05 30.41 226.18 29.66 225.11C29.30 224.59 24.01 216.77 24.01 216.77C23.69 216.31 23.07 216.18 22.62 216.51L22.52 216.57C22.07 216.86 21.97 217.51 22.29 217.97C22.29 217.97 28.30 226.66 28.69 227.21C29.08 227.80 29.27 228.35 29.27 229.10C29.27 229.84 29.27 238.99 29.27 238.99C29.27 239.55 29.72 240 30.28 240L30.34 240C30.89 240 31.35 239.55 31.35 238.99C31.35 238.99 31.35 229.88 31.35 229.13C31.35 228.42 31.57 227.73 31.96 227.15C32.35 226.60 38.32 217.97 38.32 217.97C38.65 217.51 38.52 216.86 38.06 216.57ZM49.03 216.31L43.09 216.31C42.54 216.31 42.09 216.77 42.09 217.32L42.09 238.99C42.09 239.55 42.54 240 43.09 240L43.19 240C43.74 240 44.20 239.55 44.20 238.99L44.20 231.37C44.20 231.08 44.29 231.01 44.59 231.01L49.03 231.01C53.54 231.01 57.21 228.06 57.21 223.55C57.21 219.04 53.54 216.31 49.03 216.31ZM49.03 228.90L44.55 228.90C44.26 228.90 44.20 228.80 44.20 228.51L44.20 218.75C44.20 218.49 44.29 218.39 44.59 218.39L49.03 218.39C52.41 218.39 55.13 220.17 55.13 223.55C55.13 226.92 52.41 228.90 49.03 228.90ZM73.99 237.89L63.76 237.89C63.47 237.89 63.41 237.79 63.41 237.50L63.41 229.26C63.41 228.97 63.50 228.90 63.83 228.90L72.14 228.90C72.69 228.90 73.14 228.45 73.14 227.90L73.14 227.83C73.14 227.28 72.69 226.83 72.14 226.83L63.76 226.83C63.47 226.83 63.41 226.73 63.41 226.40L63.41 218.75C63.41 218.49 63.50 218.39 63.83 218.39L73.37 218.39C73.92 218.39 74.38 217.93 74.38 217.38L74.38 217.32C74.38 216.77 73.92 216.31 73.37 216.31L62.30 216.31C61.75 216.31 61.33 216.77 61.33 217.32L61.33 238.99C61.33 239.55 61.75 240 62.30 240L73.99 240C74.54 240 74.99 239.55 74.99 238.99L74.99 238.90C74.99 238.35 74.54 237.89 73.99 237.89ZM93.72 238.09C92.90 238.09 94.04 235.10 94.04 233.35C94.04 231.08 93.03 229.62 91.28 228.61C90.83 228.35 90.86 228.19 91.22 227.93C92.84 226.79 93.94 225.17 93.94 222.96C93.94 218.71 90.11 216.31 85.73 216.31L80.12 216.31C79.57 216.31 79.11 216.77 79.11 217.61C79.11 217.61 79.11 239.03 79.11 239.29C79.11 239.55 79.57 240 80.12 240L80.22 240C80.77 240 81.22 239.61 81.22 239.29C81.22 238.99 81.22 230.01 81.22 230.01C81.22 229.71 81.32 229.65 81.61 229.65L86.67 229.65C90.44 229.65 91.90 230.72 91.90 233.35C91.90 235.59 91.15 238.15 92.06 239.35C92.42 239.84 93.13 240.19 93.72 240.19C95.70 240.19 95.50 238.09 93.72 238.09ZM85.73 227.54L81.58 227.54C81.29 227.54 81.22 227.44 81.22 227.15L81.22 218.75C81.22 218.49 81.32 218.39 81.61 218.39L85.73 218.39C88.95 218.39 91.87 219.85 91.87 222.96C91.87 226.01 89.04 227.54 85.73 227.54ZM111.95 216.31L99.23 216.31C98.68 216.31 98.23 216.77 98.23 217.32L98.23 217.38C98.23 217.93 98.68 218.39 99.23 218.39L104.20 218.39C104.49 218.39 104.55 218.49 104.55 218.81L104.55 238.99C104.55 239.55 105.01 240 105.56 240L105.62 240C106.18 240 106.63 239.55 106.63 238.99L106.63 218.75C106.63 218.49 106.73 218.39 107.05 218.39L111.95 218.39C112.50 218.39 112.96 217.93 112.96 217.38L112.96 217.32C112.96 216.77 112.50 216.31 111.95 216.31ZM133.56 216.31L133.47 216.31C132.92 216.31 132.46 216.77 132.46 217.32L132.46 229.06C132.46 234.71 130.90 238.47 125.71 238.47C120.49 238.47 118.60 234.71 118.60 229.06L118.60 217.32C118.60 216.77 118.18 216.31 117.63 216.31L117.53 216.31C116.98 216.31 116.53 216.77 116.53 217.32L116.53 229.06C116.53 235.85 118.93 240.42 125.71 240.42C132.46 240.42 134.57 235.85 134.57 229.06L134.57 217.32C134.57 216.77 134.12 216.31 133.56 216.31ZM151.28 226.60C152.68 225.75 153.88 224.39 153.88 222.31C153.88 218.03 150.60 216.31 146.09 216.31L140.44 216.31C139.89 216.31 139.44 216.77 139.44 217.32L139.44 238.99C139.44 239.55 139.89 240 140.44 240L146.87 240C151.22 240 155.01 237.40 155.01 233.15C155.01 230.62 153.26 228.55 151.25 227.25C150.89 227.02 150.83 226.89 151.28 226.60ZM151.80 222.31C151.80 225.33 149.43 225.79 146.09 225.79C146.09 225.79 142.68 225.79 142.20 225.79C141.74 225.79 141.55 225.53 141.55 225.07C141.55 223.42 141.55 219.39 141.55 219.07C141.55 218.68 141.71 218.42 142.26 218.42C142.81 218.42 146.25 218.42 146.25 218.42C149.53 218.42 151.80 219.23 151.80 222.31ZM146.87 237.89C146.87 237.89 142.81 237.89 142.33 237.89C141.84 237.89 141.55 237.63 141.55 237.18C141.55 236.82 141.55 230.72 141.55 228.61C141.55 228.16 141.71 227.90 142.20 227.90C142.65 227.90 146.87 227.90 146.87 227.90C150.05 227.90 152.94 230.04 152.94 233.15C152.94 236.27 150.05 237.89 146.87 237.89ZM171.95 237.89L161.73 237.89C161.44 237.89 161.37 237.79 161.37 237.50L161.37 229.26C161.37 228.97 161.47 228.90 161.80 228.90L170.10 228.90C170.65 228.90 171.11 228.45 171.11 227.90L171.11 227.83C171.11 227.28 170.65 226.83 170.10 226.83L161.73 226.83C161.44 226.83 161.37 226.73 161.37 226.40L161.37 218.75C161.37 218.49 161.47 218.39 161.80 218.39L171.34 218.39C171.89 218.39 172.34 217.93 172.34 217.38L172.34 217.32C172.34 216.77 171.89 216.31 171.34 216.31L160.27 216.31C159.72 216.31 159.30 216.77 159.30 217.32L159.30 238.99C159.30 239.55 159.72 240 160.27 240L171.95 240C172.50 240 172.96 239.55 172.96 238.99L172.96 238.90C172.96 238.35 172.50 237.89 171.95 237.89Z" fill="#ffffff" style="fill: rgb(255, 255, 255);"></path></g><g id="SvgjsG13916" rel="mainfill" name="symbol" xmlns:name="symbol_mainfill" transform="translate(40.67000961303711,-4.674249649047852) scale(1)" fill="#ffffff"><path d="M58.478,26.77H21.38c-5.182,0-9.423,4.24-9.423,9.423v25.922c0,5.183,4.24,9.423,9.423,9.423h37.099  c5.182,0,9.423-4.24,9.423-9.423V36.193C67.901,31.011,63.661,26.77,58.478,26.77z M24.768,31.67  c-3.613,1.936-6.221,4.771-7.854,6.968c-0.619,0.833-1.939,0.251-1.736-0.766c1.244-6.215,5.653-7.783,9.059-8.024  C25.277,29.774,25.687,31.178,24.768,31.67z M71.426,17.292H57.717c-1.992-1.559-4.277-2.761-6.759-3.508l5.172-5.171  c0.901-0.901,0.901-2.361,0-3.262c-0.901-0.901-2.361-0.901-3.262,0l-7.191,7.191c-0.116,0.116-0.217,0.242-0.303,0.374  C45.249,12.914,45.125,12.91,45,12.91c-0.125,0-0.249,0.003-0.373,0.005c-0.086-0.132-0.187-0.258-0.303-0.374L37.133,5.35  c-0.901-0.901-2.361-0.901-3.262,0c-0.901,0.901-0.901,2.361,0,3.262l5.172,5.171c-2.483,0.747-4.767,1.949-6.759,3.508H18.574  c-8.848,0-16.087,7.239-16.087,16.087v31.55c0,8.848,7.239,16.087,16.087,16.087h0.213v1.596c0,1.492,1.221,2.713,2.713,2.713h1.651  c1.492,0,2.713-1.221,2.713-2.713v-1.596h38.272v0.924c0,1.492,1.221,2.713,2.713,2.713H68.5c1.492,0,2.713-1.221,2.713-2.713  v-0.924h0.213c8.848,0,16.087-7.239,16.087-16.087v-31.55C87.513,24.531,80.274,17.292,71.426,17.292z M20.276,74.958  c-6.373,0-11.586-5.214-11.586-11.586V35.163c0-6.373,5.214-11.586,11.586-11.586h39.306c6.373,0,11.587,5.214,11.587,11.586v28.209  c0,6.373-5.214,11.586-11.587,11.586H20.276z M79.019,59.404c-1.415,0-2.562-1.147-2.562-2.562c0-1.415,1.147-2.562,2.562-2.562  s2.562,1.147,2.562,2.562C81.581,58.257,80.434,59.404,79.019,59.404z M79.019,51.717c-1.415,0-2.562-1.147-2.562-2.562  s1.147-2.562,2.562-2.562s2.562,1.147,2.562,2.562S80.434,51.717,79.019,51.717z M79.019,44.029c-1.415,0-2.562-1.147-2.562-2.562  s1.147-2.562,2.562-2.562s2.562,1.147,2.562,2.562S80.434,44.029,79.019,44.029z" fill="#ffffff" style="fill: rgb(255, 255, 255);"></path></g></svg>
                        </div>
                    </a>
                @endif
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link menu_link" href="{{ route('login') }}">{{ trans('titles.signIn') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link menu_link" href="{{ route('register') }}">{{ trans('titles.register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle menu_link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->login }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">

                                    {{-- My Profile --}}
                                    <a class="dropdown-item menu_link" href="{{ route('show.auth') }}">
                                        {{ __('titles.myProfile') }}
                                    </a>

                                    {{-- Logout --}}
                                    <a class="dropdown-item menu_link" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('titles.logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main id="main_container">
            @yield('content')
        </main>
        <footer-component ua_url="{{ route('set.language', 'ua') }}"
                          en_url="{{ route('set.language', 'en') }}"
                          ua_img="{{ asset('images/service/ua.png') }}"
                          ru_url="{{ route('set.language', 'ru') }}"
                          ru_img="{{ asset('images/service/ru.png') }}"
                          en_img="{{ asset('images/service/en.png') }}"
        ></footer-component>
    </div>
</body>
</html>
