<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>srtdash - ICO Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    @include('backend.partials.style')

</head>

<body>
    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->


    <!-- preloader area start -->
    {{-- <div id="preloader">
        <div class="loader"></div>
    </div> --}}
    <!-- preloader area end -->


    @include('backend.partials.sidebar')

    @include('backend.partials.header')

    @yield('admin-content')

    @include('backend.partials.footer')

    @include('backend.partials.scripts')

</body>

</html>
