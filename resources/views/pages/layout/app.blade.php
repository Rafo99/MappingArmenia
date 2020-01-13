<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="format-detection" content="telephone=no">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>@yield('title', env('APP_NAME')) | MappingArmenia.com</title>
    <link rel="icon" href="{{ asset('favicon.ico') }}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,400i,500,500i,700,700i">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

<body>

@include('pages.layout.components.header')

@yield('slider')

@yield('content')

@include('pages.layout.components.footer')

@include('pages.layout.components.components')

<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://getbootstrap.com/docs/4.1/assets/js/vendor/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
<script type="text/javascript" src="{{ asset('js/jssor.slider-28.0.0.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
<!--Start of Tawk.to Script-->
<script type="text/javascript">
    var Tawk_API = Tawk_API || {}, Tawk_LoadStart = new Date();
    (function () {
        var s1 = document.createElement("script"), s0 = document.getElementsByTagName("script")[0];
        s1.async = true;
        s1.src = 'https://embed.tawk.to/5e07c5f227773e0d832b0704/default';
        s1.charset = 'UTF-8';
        s1.setAttribute('crossorigin', '*');
        s0.parentNode.insertBefore(s1, s0);
    })();
</script>
<script type="text/javascript">
    $(window).bind("load", function() {
        document.getElementsByTagName('iframe')[3].style.display = 'none';
    });
</script>

<!--End of Tawk.to Script-->
@stack('scripts')
</body>
</html>
