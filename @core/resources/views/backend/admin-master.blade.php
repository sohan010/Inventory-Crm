

 <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>
        {{get_static_option('site_title')}} -
        @if(request()->path() == 'admin-home')
            {{get_static_option('site_tag_line')}}
        @else
            @yield('site-title')
        @endif
    </title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    @php
        $site_favicon = get_attachment_image_by_id(get_static_option('site_favicon'),"full",false);
    @endphp
    @if (!empty($site_favicon))
        <link rel="icon" href="{{$site_favicon['img_url']}}" type="image/png">
    @endif


    <link href="{{asset('assets/backend/assets/plugins/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/backend/assets/plugins/morrisjs/morris.css')}}" rel="stylesheet">
    <link href="{{asset('assets/backend/css/style.css')}}" rel="stylesheet">
    <link href="{{asset('assets/backend/css/colors/blue.cs')}}s" id="theme" rel="stylesheet">

    {{--Xg Styles--}}
     <link rel="stylesheet" href="{{asset('assets/backend/xgenious/css/style.css')}}" >
     <link rel="stylesheet" href="{{asset('assets/backend/xgenious/css/flatpickr.min.css')}}">
     <link rel="stylesheet" href="{{asset('assets/common/css/font-awesome.min.css')}}">
     <link rel="stylesheet" href="{{asset('assets/common/css/themify-icons.css')}}">
     <link rel="stylesheet" href="{{asset('assets/common/css/toastr.css')}}">


    @yield('style')
     <link rel="stylesheet" href="{{asset('assets/backend/xgenious/css/custom-style.css')}}">
    {{--Xg Styles--}}

    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>

    <x-preloader.css/>
</head>



<body class="fix-header fix-sidebar card-no-border">

<div class="wrapper sohan_custom_loader_wrapper" style="display: none">
    <div class="preloader"></div>
</div>


<div id="main-wrapper">

    <header class="topbar">
        <nav class="navbar top-navbar navbar-expand-md navbar-light">

            <div class="navbar-header">
                <a class="navbar-brand" href="index.html">

                        <img src="{{asset('assets/backend/assets/images/logo-icon.png')}}" alt="homepage" class="dark-logo" />

                        <img src="{{asset('assets/backend/assets/images/logo-light-icon.png')}}" alt="homepage" class="light-logo" />
                    </b>

                    <!-- Logo text --><span>
                         <!-- dark Logo text -->
                         <img src="{{asset('assets/backend/assets/images/logo-text.png')}}" alt="homepage" class="dark-logo" />
                        <!-- Light Logo text -->
                         <img src="{{asset('assets/backend/assets/images/logo-light-text.png')}}" class="light-logo" alt="homepage" /></span> </a>
            </div>

            <div class="navbar-collapse">

                <ul class="navbar-nav mr-auto mt-md-0">
                    <!-- This is  -->
                    <li class="nav-item"> <a class="nav-link nav-toggler hidden-md-up text-muted waves-effect waves-dark" href="javascript:void(0)"><i class="mdi mdi-menu"></i></a> </li>
                    <li class="nav-item m-l-10"> <a class="nav-link sidebartoggler hidden-sm-down text-muted waves-effect waves-dark" href="javascript:void(0)"><i class="ti-menu"></i></a> </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-muted text-muted waves-effect waves-dark" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="mdi mdi-message"></i>
                            <div class="notify"> <span class="heartbit"></span> <span class="point"></span> </div>
                        </a>
                        <div class="dropdown-menu mailbox animated slideInUp">
                            <ul>
                                <li>
                                    <div class="drop-title">Notifications</div>
                                </li>
                                <li>
                                    <div class="message-center">
                                        <!-- Message -->
                                        <a href="index.html#">
                                            <div class="btn btn-danger btn-circle"><i class="fa fa-link"></i></div>
                                            <div class="mail-contnet">
                                                <h5>Luanch Admin</h5> <span class="mail-desc">Just see the my new admin!</span> <span class="time">9:30 AM</span> </div>
                                        </a>
                                        <!-- Message -->
                                        <a href="index.html#">
                                            <div class="btn btn-success btn-circle"><i class="ti-calendar"></i></div>
                                            <div class="mail-contnet">
                                                <h5>Event today</h5> <span class="mail-desc">Just a reminder that you have event</span> <span class="time">9:10 AM</span> </div>
                                        </a>
                                        <!-- Message -->
                                        <a href="index.html#">
                                            <div class="btn btn-info btn-circle"><i class="ti-settings"></i></div>
                                            <div class="mail-contnet">
                                                <h5>Settings</h5> <span class="mail-desc">You can customize this template as you want</span> <span class="time">9:08 AM</span> </div>
                                        </a>
                                        <!-- Message -->
                                        <a href="index.html#">
                                            <div class="btn btn-primary btn-circle"><i class="ti-user"></i></div>
                                            <div class="mail-contnet">
                                                <h5>Pavan kumar</h5> <span class="mail-desc">Just see the my admin!</span> <span class="time">9:02 AM</span> </div>
                                        </a>
                                    </div>
                                </li>
                                <li>
                                    <a class="nav-link text-center" href="javascript:void(0);"> <strong>Check all notifications</strong> <i class="fa fa-angle-right"></i> </a>
                                </li>
                            </ul>
                        </div>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark" href="" id="2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="mdi mdi-email"></i>
                            <div class="notify"> <span class="heartbit"></span> <span class="point"></span> </div>
                        </a>
                        <div class="dropdown-menu mailbox animated slideInUp" aria-labelledby="2">
                            <ul>
                                <li>
                                    <div class="drop-title">You have 4 new messages</div>
                                </li>
                                <li>
                                    <div class="message-center">
                                        <!-- Message -->
                                        <a href="index.html#">
                                            <div class="user-img"> <img src="../assets/images/users/1.jpg" alt="user" class="img-circle"> <span class="profile-status online pull-right"></span> </div>
                                            <div class="mail-contnet">
                                                <h5>Pavan kumar</h5> <span class="mail-desc">Just see the my admin!</span> <span class="time">9:30 AM</span> </div>
                                        </a>
                                        <!-- Message -->
                                        <a href="index.html#">
                                            <div class="user-img"> <img src="../assets/images/users/2.jpg" alt="user" class="img-circle"> <span class="profile-status busy pull-right"></span> </div>
                                            <div class="mail-contnet">
                                                <h5>Sonu Nigam</h5> <span class="mail-desc">I've sung a song! See you at</span> <span class="time">9:10 AM</span> </div>
                                        </a>
                                        <!-- Message -->
                                        <a href="index.html#">
                                            <div class="user-img"> <img src="../assets/images/users/3.jpg" alt="user" class="img-circle"> <span class="profile-status away pull-right"></span> </div>
                                            <div class="mail-contnet">
                                                <h5>Arijit Sinh</h5> <span class="mail-desc">I am a singer!</span> <span class="time">9:08 AM</span> </div>
                                        </a>
                                        <!-- Message -->
                                        <a href="index.html#">
                                            <div class="user-img"> <img src="../assets/images/users/4.jpg" alt="user" class="img-circle"> <span class="profile-status offline pull-right"></span> </div>
                                            <div class="mail-contnet">
                                                <h5>Pavan kumar</h5> <span class="mail-desc">Just see the my admin!</span> <span class="time">9:02 AM</span> </div>
                                        </a>
                                    </div>
                                </li>
                                <li>
                                    <a class="nav-link text-center" href="javascript:void(0);"> <strong>See all e-Mails</strong> <i class="fa fa-angle-right"></i> </a>
                                </li>
                            </ul>
                        </div>
                    </li>


                </ul>

                <ul class="navbar-nav my-lg-0">

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark" href="" id="2" data-toggle="tooltip" aria-haspopup="true" aria-expanded="false" data-title="POS">
                            <i class="mdi mdi-view-dashboard"></i>
                            <div class="notify"> </div>
                        </a>
                    </li>>

                    @php
                        $profile_img = get_attachment_image_by_id(auth()->user()->image,null,true);
                    @endphp

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark" href="{{route('admin.pos')}}" data-toggle="dropdown"
                           aria-haspopup="true" aria-expanded="false">
                            <img src="{{$profile_img['img_url']}}" alt="user" class="profile-pic" />
                        </a>
                        <div class="dropdown-menu dropdown-menu-right scale-up">
                            <ul class="dropdown-user">
                                <li>
                                    <div class="dw-user-box">
                                        <div class="u-img">

                                            <img src="{{$profile_img['img_url']}}" alt="ok">

                                        </div>
                                        <div class="u-text">
                                            <h4>{{auth()->user()->name}}</h4>
                                            <p class="text-muted">{{auth()->user()->email}}</p>
                                            <a href="#!" class="btn btn-rounded btn-danger btn-sm">{{__('View Profile')}}</a>
                                        </div>
                                    </div>
                                </li>
                                <li role="separator" class="divider"></li>
                                <li><a href="{{route('admin.profile.update')}}"><i class="ti-user"></i> {{__('Edit Profile')}}</a></li>
                                <li><a href="{{route('admin.password.change')}}"><i class="ti-wallet"></i> {{__('Password Change')}}</a></li>
                                <li><a href="{{ route('admin.logout') }}"><i class="fa fa-power-off"></i> {{__('Logout')}}</a></li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
    </header>

    @include('backend/partials/sidebar')

    <div class="page-wrapper">

        <div class="row page-titles">
            <div class="col-md-4 align-self-center">
                <h3 class="text-themecolor">@yield('page-title')</h3>
            </div>

            <div class="col-md-4">
                <h3 class="text-themecolor"><span class="text-dark">{{__('Today :')}}</span> {{ \Carbon\Carbon::today()->format('d-m-Y') }} ({{ \Carbon\Carbon::today()->isoFormat('dddd') }})</h3>
            </div>
            <div class="col-md-4 align-self-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('admin.home')}}">{{__('Home')}}</a></li>
                    <li class="breadcrumb-item active">@yield('page-title')</li>
                </ol>
            </div>
        </div>

        <div class="container-fluid">
            @yield('content')
        </div>
        <footer class="footer">  {!! render_footer_copyright_text() !!}</footer>
    </div>

</div>


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
<script src="{{asset('assets/backend/js/SohanCustom.js')}}"></script>

{{--xg files--}}
<script src="{{asset('assets/backend/xgenious/js/custom.min.js')}}"></script>
<script src="{{asset('assets/common/js/toastr.min.js')}}"></script>
{{--<script src="{{asset('assets/backend/xgenious/js/sweetalert2.js')}}"></script>--}}
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="{{asset('assets/backend/xgenious/js/flatpickr.js')}}"></script>
{{--xg files--}}

<script>
    $(document).on('click','.swal_delete_button',function(e){
        e.preventDefault();
        Swal.fire({
            title: '{{__("Are you sure?")}}',
            text: '{{__("You would not be able to revert this item!")}}',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: "{{__('Yes, delete it!')}}",
            cancelButtonText: "{{__('Cancel')}}"
        }).then((result) => {
            if (result.isConfirmed) {
                $(this).next().find('.swal_form_submit_btn').trigger('click');
            }
        });
    });

    //for flash msg
    // setTimeout(function(){
    //     $('.alert-success').slideUp();
    //     $('.alert-danger').slideUp();
    // },3000)


</script>


@yield('script')
</body>

</html>