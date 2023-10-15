<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description"
    content="Multikart admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
    <meta name="keywords"
    content="admin template, Multikart admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="pixelstrap">
    <link rel="icon" href="assets/images/dashboard/favicon.png" type="image/x-icon">
    <link rel="shortcut icon" href="assets/images/dashboard/favicon.png" type="image/x-icon">
    <title>Multikart - Premium Admin Template</title>

    {{ $css }}

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased">
    <div class="page-wrapper">
        @include('components.shared.header')
        <div class="page-body-wrapper">
            @include('components.shared.sidebar')
            @include('components.shared.sidebar-right')
            <main style="margin-left: 225px; padding: calc(10px + (15 - 10) * ((100vw - 320px) / (1920 - 320))) calc(5px + (27 - 5) * ((100vw - 320px) / (1920 - 320))) 0;">
                {{ $slot }}
            </main>
            <footer class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-6 footer-copyright text-start">
                            <p class="mb-0">Copyright 2019 © Multikart All rights reserved.</p>
                        </div>
                        <div class="col-md-6 pull-right text-end">
                            <p class=" mb-0">Hand crafted & made with<i class="fa fa-heart"></i></p>
                        </div>
                    </div>
                </div>
            </footer>
            <!-- footer end-->
        </div>
    </div>
    {{ $js }}
</body>
</html>