<!doctype html>
<html class="no-js" lang="en">
<head>
    <title>@yield('title')</title>
    <!-- favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('frontend/images/favicon.webp') }}">
    <!-- favicon end -->
    <meta name="robots" content="noindex">
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ asset('backend/css/bootstrap.min.css') }}">
    <!-- others css -->
    <link rel="stylesheet" href="{{ asset('backend/css/typography.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/css/default-css.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/css/styles.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/css/responsive.css') }}">
</head>

<body>
    <div id="preloader">
        <div class="loader"></div>
    </div>
    <!-- preloader area end -->
    <!-- login area start -->
    <div class="login-area">
        <div class="container">
            <div class="login-box ptb--100">

                @yield('form.content')

            </div>
        </div>
    </div>
    <!-- login area end -->

<!-- jquery latest version -->
<script src="{{ asset('backend/js/vendor/jquery-2.2.4.min.js') }}"></script>
<!-- bootstrap 4 js -->
<script src="{{ asset('backend/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('backend/js/metisMenu.min.js') }}"></script>
<script src="{{ asset('backend/js/jquery.slimscroll.min.js') }}"></script>
<script src="{{ asset('backend/js/jquery.slicknav.min.js') }}"></script>
<!-- others plugins -->
<script src="{{ asset('backend/js/scripts.js') }}"></script>

</body>

</html>
