<!DOCTYPE html>
<html lang="en" xmlns:v-bind="http://www.w3.org/1999/xhtml">
<head>
    <title>Welcome to iTrade Option</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="BitCoin and Ethereum Investment">
    <meta name="author" description="iTrade Option">
    <meta property="og:url"           content="{{ url('/') }}" />
    <meta property="og:type"          content="website" />
    <meta property="og:title"         content="iTrade Option" />
    <meta property="og:description"   content="a bitcoin and ethereum investment platform" />
    <link rel="stylesheet" href="{!! asset('css/bootstrap.min.css') !!}">
    {{--favicon--}}

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" type="text/css" href="{!! asset('css/flaticon.css') !!}">

    <link href="{!! asset('css/admin/fontawesome-all.css') !!}" rel="stylesheet">
    <link href="{!! asset('css/settings.css') !!}" rel="stylesheet">
    <!-- slider -->
    <link rel="stylesheet" type="text/css" href="{!! asset('css/layers.css') !!}">
    <link rel="stylesheet" type="text/css" href="{!! asset('css/navigation.css') !!}">
    <link rel="stylesheet" type="text/css" href="{!! asset('css/owl.carousel.min.css') !!}">
    <!-- Style CSS -->
    <link href="{!! asset('css/animate.css') !!}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{!! asset('css/nice-select.css') !!}">
    <link rel="stylesheet" type="text/css" href="{!! asset('css/style.css') !!}">
    <link rel="stylesheet" type="text/css" href="{!! asset('css/responsive.css') !!}">
    <link rel="stylesheet" type="text/css" href="{!! asset('css/styles.css') !!}">
    <link rel="stylesheet" type="text/css" href="{!! asset('css/styled.css') !!}">

    <link rel="icon" type="image/png" href="{!! asset('images/logo.png') !!}" width="40px">
    <link rel="apple-touch-icon" href="{{asset('images/favicon.png')}}">

    {{--theme--}}

    {{--Chrome, Firefox OS and Opera --}}
    <meta name="theme-color" content="#1B5E20">
    {{--Windows Phone--}}
    <meta name="msapplication-navbutton-color" content="#1B5E20">
    {{--iOS Safari --}}
    <meta name="apple-mobile-web-app-status-bar-style" content="#1B5E20">


    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">


    @yield('styles')


    <!-- Stylesheets -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">



    {{--ionicons--}}
    <link href="{{asset('css/ionicons/css/ionicons.min.css')}}" rel="stylesheet">


    {{--title of app--}}
    @yield('title')



   <!-- pass php vars to javascript -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
            'appUrl' => url("/"),
            'storyTeller' => auth()->user(),
        ]); ?>
    </script>


    @yield('earlyscripts')


    @yield('styles2')


    <link href="{{'css/jquery.atwho.css'}}" rel="stylesheet">

    <style>
        [v-cloak] { display:none !important; }
    </style>

</head>
<body>



<!--hi let me know if you see this :) -->

@yield('content')
@include('pages.footer')
@yield('scripts')




</body>
</html>