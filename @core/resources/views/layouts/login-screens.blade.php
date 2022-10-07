
<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>{{__("Admin Login")}} - {{get_static_option('site_title')}}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="{{asset('assets/uploads/site-favicon.'.get_static_option('site_favicon'))}}" type="image/png">

    <link href="{{asset('assets/backend/assets/plugins/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/backend/assets/plugins/morrisjs/morris.css')}}" rel="stylesheet">
    <link href="{{asset('assets/backend/css/style.css')}}" rel="stylesheet">
    <link href="{{asset('assets/backend/css/colors/blue.cs')}}s" id="theme" rel="stylesheet">

</head>

<body>
    @yield('content')
    <script src="{{asset('assets/backend/assets/plugins/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('assets/backend/assets/plugins/bootstrap/js/popper.min.js')}}"></script>
    <script src="{{asset('assets/backend/assets/plugins/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('assets/backend/js/jquery.slimscroll.js')}}"></script>
    <script src="{{asset('assets/backend/js/waves.js')}}"></script>
    <script src="{{asset('assets/backend/js/sidebarmenu.js')}}"></script>
    <script src="{{asset('assets/backend/assets/plugins/sticky-kit-master/dist/sticky-kit.min.js')}}"></script>
    <script src="{{asset('assets/backend/js/custom.min.js')}}"></script>
    <script src="{{asset('assets/backend/assets/plugins/sparkline/jquery.sparkline.min.js')}}"></script>

    <script src="{{asset('assets/backend/assets/plugins/raphael/raphael-min.js')}}"></script>
    <script src="{{asset('assets/backend/assets/plugins/morrisjs/morris.min.js')}}"></script>
    <script src="{{asset('assets/backend/js/dashboard1.js')}}"></script>
    <script src="{{asset('assets/backend/assets/plugins/styleswitcher/jQuery.style.switcher.js')}}"></script>
    @yield('scripts')
</body>
</html>
