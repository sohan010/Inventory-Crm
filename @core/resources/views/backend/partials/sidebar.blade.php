{{--<div class="sidebar-menu">--}}
{{--    <div class="sidebar-header">--}}
{{--        <div class="logo">--}}
{{--            <a href="{{route('admin.home')}}">--}}
{{--                @if(get_static_option('site_admin_dark_mode') == 'off')--}}
{{--                    {!! render_image_markup_by_attachment_id(get_static_option('site_logo')) !!}--}}
{{--                @else--}}
{{--                    {!! render_image_markup_by_attachment_id(get_static_option('site_white_logo')) !!}--}}
{{--                @endif--}}
{{--            </a>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--    <div class="main-menu">--}}
{{--        <div class="menu-inner">--}}
{{--            <nav>--}}
{{--                <ul class="metismenu" id="menu">--}}
{{--                    <li class="{{active_menu('admin-home')}}">--}}
{{--                        <a href="{{route('admin.home')}}"--}}
{{--                           aria-expanded="true">--}}
{{--                            <i class="ti-dashboard"></i>--}}
{{--                            <span>@lang('dashboard')</span>--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                    @if(auth()->guard('admin')->user()->hasRole('Super Admin'))--}}
{{--                        <li class="main_dropdown @if(request()->is(['admin-home/admin/*'])) active @endif">--}}
{{--                            <a href="javascript:void(0)" aria-expanded="true"><i class="ti-user"></i>--}}
{{--                                <span>{{__('Admin Manage')}}</span></a>--}}
{{--                            <ul class="collapse">--}}
{{--                                <li class="{{active_menu('admin-home/admin/all-user')}}"><a--}}
{{--                                            href="{{route('admin.all.user')}}">{{__('All Admin')}}</a></li>--}}
{{--                                <li class="{{active_menu('admin-home/admin/new-user')}}"><a--}}
{{--                                            href="{{route('admin.new.user')}}">{{__('Add New Admin')}}</a></li>--}}
{{--                                <li class="{{active_menu('admin-home/admin/role')}} "><a--}}
{{--                                            href="{{route('admin.all.admin.role')}}">{{__('All Admin Role')}}</a></li>--}}
{{--                            </ul>--}}
{{--                        </li>--}}
{{--                    @endif--}}

{{--                    @canany(['user-list','user-create'])--}}
{{--                    <li--}}
{{--                            class="main_dropdown--}}
{{--                        @if(request()->is(['admin-home/frontend/new-user','admin-home/frontend/all-user','admin-home/frontend/all-user/role'])) active @endif--}}
{{--                                    ">--}}
{{--                        <a href="javascript:void(0)" aria-expanded="true"><i class="ti-user"></i>--}}
{{--                            <span>{{__('Users Manage')}}</span></a>--}}
{{--                        <ul class="collapse">--}}
{{--                            @can('user-list')--}}
{{--                                <li class="{{active_menu('admin-home/frontend/all-user')}}"><a--}}
{{--                                            href="{{route('admin.all.frontend.user')}}">{{__('All Users')}}</a></li>--}}
{{--                            @endcan--}}
{{--                            @can('user-create')--}}
{{--                                <li class="{{active_menu('admin-home/frontend/new-user')}}"><a--}}
{{--                                            href="{{route('admin.frontend.new.user')}}">{{__('Add New User')}}</a></li>--}}
{{--                            @endcan--}}
{{--                        </ul>--}}

{{--                    </li>--}}
{{--                    @endcanany--}}





{{--                    @can('testimonial-list')--}}
{{--                        <li class="main_dropdown {{active_menu('admin-home/testimonial/all')}}">--}}
{{--                            <a href="{{route('admin.testimonial')}}" aria-expanded="true"><i--}}
{{--                                        class="ti-control-forward"></i>--}}
{{--                                <span>{{__('Testimonial')}}</span></a>--}}
{{--                        </li>--}}
{{--                    @endcan--}}


{{--                    @canany([--}}
{{--                        'donation-list',--}}
{{--                        'donation-create',--}}
{{--                        'donation-category-list',--}}
{{--                        'donation-pending-cause',--}}
{{--                        'donation-withdraw-list',--}}
{{--                        'onation-payment-list',--}}
{{--                        'donation-cause-report',--}}
{{--                        'donation-flag-report-list',--}}
{{--                        'donation-settings'--}}
{{--                        ])--}}

{{--                    <li class="main_dropdown @if(request()->is(['admin-home/donations/*','admin-home/donations'])) active @endif ">--}}
{{--                        <a href="javascript:void(0)" aria-expanded="true">--}}
{{--                            <i class="ti-agenda mr-2"></i> {{__('Donation')}}--}}
{{--                        </a>--}}
{{--                        <ul class="collapse">--}}
{{--                            @can('donation-list')--}}
{{--                                <li class="{{active_menu('admin-home/donations')}}"><a--}}
{{--                                            href="{{route('admin.donations.all')}}">{{__('All Causes')}}</a>--}}
{{--                                </li>--}}
{{--                            @endcan--}}
{{--                            @can('donation-create')--}}
{{--                                <li class="{{active_menu('admin-home/donations/new')}}"><a--}}
{{--                                            href="{{route('admin.donations.new')}}">{{__('Add New Cause')}}</a>--}}
{{--                                </li>--}}
{{--                            @endcan--}}
{{--                            @can('donation-category-list')--}}
{{--                                <li class="{{active_menu('admin-home/donations/category')}}"><a--}}
{{--                                            href="{{route('admin.donations.category.all')}}">{{__('Causes Category')}}</a>--}}
{{--                                </li>--}}
{{--                            @endcan--}}
{{--                            @can('donation-pending-cause')--}}
{{--                                <li class="{{active_menu('admin-home/donations/pending')}}"><a--}}
{{--                                            href="{{route('admin.donations.pending.all')}}">{{__('All Pending Causes')}} <span class="badge"></span></a>--}}
{{--                                </li>--}}
{{--                            @endcan--}}

{{--                            @can('donation-payment-list')--}}
{{--                                <li class="{{active_menu('admin-home/donations/payment-logs')}}"><a--}}
{{--                                            href="{{route('admin.donations.payment.logs')}}">{{__('Causes Payment Logs')}}</a>--}}
{{--                                </li>--}}
{{--                            @endcan--}}
{{--                            @can('donation-cause-report')--}}
{{--                                <li class="{{active_menu('admin-home/donations/report')}}">--}}
{{--                                    <a href="{{route('admin.donations.report')}}">{{__('Causes Report')}}</a>--}}
{{--                                </li>--}}
{{--                            @endcan--}}

{{--                        </ul>--}}
{{--                    </li>--}}
{{--                    @endcanany--}}




{{--                    <li class="main_dropdown @if(request()->is(['admin-home/notification/all'])) active @endif">--}}
{{--                        <a href="javascript:void(0)"--}}
{{--                           aria-expanded="true">--}}
{{--                            <i class="ti-agenda mr-2"></i>  {{__('Notifications')}}--}}
{{--                        </a>--}}
{{--                        <ul class="collapse">--}}
{{--                                <li class="{{active_menu('admin-home/notification/all')}}">--}}
{{--                                    <a href="{{route('admin.notification')}}">{{__('All Notification')}}</a>--}}
{{--                                </li>--}}

{{--                        </ul>--}}
{{--                    </li>--}}


{{--                    @canany([--}}
{{--                    'general-settings-site-identity',--}}
{{--                    'general-settings-basic-settings',--}}
{{--                    'general-settings-color-settings',--}}
{{--                    'general-settings-typography',--}}
{{--                    'general-settings-seo-settings',--}}
{{--                    'general-settings-third-party-script',--}}
{{--                    'general-settings-email-template',--}}
{{--                    'general-settings-smtp-settings',--}}
{{--                    'general-settings-page-settings',--}}
{{--                    'general-settings-payment-gateway',--}}
{{--                    'general-settings-cache-settings',--}}
{{--                    'general-settings-sitemap',--}}
{{--                    'general-settings-database-upgrade',--}}

{{--                    ])--}}
{{--                       <li class="main_dropdown @if(request()->is('admin-home/general-settings/*')) active @endif">--}}
{{--                        <a href="javascript:void(0)" aria-expanded="true"><i class="ti-settings"></i>--}}
{{--                            <span>{{__('General Settings')}}</span></a>--}}
{{--                        <ul class="collapse ">--}}
{{--                            @can('general-settings-site-identity')--}}
{{--                                <li class="{{active_menu('admin-home/general-settings/site-identity')}}"><a--}}
{{--                                            href="{{route('admin.general.site.identity')}}">{{__('Site Identity')}}</a>--}}
{{--                                </li>--}}
{{--                            @endcan--}}
{{--                            @can('general-settings-basic-settings')--}}
{{--                                <li class="{{active_menu('admin-home/general-settings/basic-settings')}}"><a--}}
{{--                                            href="{{route('admin.general.basic.settings')}}">{{__('Basic Settings')}}</a>--}}
{{--                                </li>--}}
{{--                            @endcan--}}


{{--                            @can('general-settings-seo-settings')--}}
{{--                                <li class="{{active_menu('admin-home/general-settings/seo-settings')}}"><a--}}
{{--                                            href="{{route('admin.general.seo.settings')}}">{{__('SEO Settings')}}</a>--}}
{{--                                </li>--}}
{{--                            @endcan--}}
{{--                            @can('general-settings-third-party-script')--}}
{{--                                <li class="{{active_menu('admin-home/general-settings/scripts')}}"><a--}}
{{--                                            href="{{route('admin.general.scripts.settings')}}">{{__('Third Party Scripts')}}</a>--}}
{{--                                </li>--}}
{{--                            @endcan--}}

{{--                            @can('general-settings-smtp-settings')--}}
{{--                                <li class="{{active_menu('admin-home/general-settings/smtp-settings')}}"><a--}}
{{--                                            href="{{route('admin.general.smtp.settings')}}">{{__('SMTP Settings')}}</a>--}}
{{--                                </li>--}}
{{--                            @endcan--}}


{{--                            @can('general-settings-payment-gateway')--}}
{{--                                @if(!empty(get_static_option('site_payment_gateway')))--}}
{{--                                    <li class="{{active_menu('admin-home/general-settings/payment-settings')}}"><a--}}
{{--                                                href="{{route('admin.general.payment.settings')}}">{{__('Payment Gateway Settings')}}</a>--}}
{{--                                    </li>--}}
{{--                                @endif--}}
{{--                            @endcan--}}

{{--                            @can('general-settings-cache-settings')--}}
{{--                                <li class="{{active_menu('admin-home/general-settings/cache-settings')}}"><a--}}
{{--                                            href="{{route('admin.general.cache.settings')}}">{{__('Cache Settings')}}</a>--}}
{{--                                </li>--}}
{{--                            @endcan--}}



{{--                                @can('general-settings-database-upgrade')--}}
{{--                                <li class="{{active_menu('admin-home/general-settings/database-upgrade')}}"><a--}}
{{--                                            href="{{route('admin.general.database.upgrade')}}">{{__('Database Upgrade')}}</a>--}}
{{--                                </li>--}}
{{--                                @endcan--}}

{{--                        </ul>--}}
{{--                    </li>--}}
{{--                    @endcanany--}}


{{--                    @can('language-list')--}}
{{--                    <li class="@if(request()->is('admin-home/languages/*') || request()->is('admin-home/languages') ) active @endif">--}}
{{--                        <a href="{{route('admin.languages')}}" aria-expanded="true"><i class="ti-signal"></i>--}}
{{--                            <span>{{__('Languages')}}</span></a>--}}
{{--                    </li>--}}
{{--                    @endcan--}}
{{--                </ul>--}}
{{--            </nav>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}



<aside class="left-sidebar">
    <div class="scroll-sidebar">
        <div class="user-profile">
            @php
                $profile_img = get_attachment_image_by_id(auth()->user()->image,null,true);
            @endphp
            <div class="profile-img">
                <img src="{{$profile_img['img_url']}}" alt="user" />
                <div class="notify setpos"> <span class="heartbit"></span> <span class="point"></span> </div>
            </div>

            <div class="profile-text">
                <h5>{{auth()->user()->name}}</h5>
                <a href="{{route('admin.profile.update')}}" class="dropdown-toggle u-dropdown" data-toggle="tooltip" title="Edit Profile" aria-haspopup="true" aria-expanded="true">
                    <i class="mdi mdi-settings"></i></a>
                <a href="{{route('admin.password.change')}}" class="" data-toggle="tooltip" title="Change Password"><i class="mdi mdi-lock"></i></a>
                <a href="{{ route('admin.logout') }}" class="" data-toggle="tooltip" title="Logout"><i class="mdi mdi-power"></i></a>
            </div>
        </div>


        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                <li class="nav-devider"></li>

                <li class="{{active_menu('admin-home')}}">
                    <a class="waves-effect waves-dark" href="{{route('admin.home')}}" aria-expanded="false">
                        <i class="mdi mdi-home"></i>
                        <span class="hide-menu">{{__('Dashboard')}}</span>
                    </a>
                </li>

                <li class="{{active_menu('admin-home')}}">
                    <a class="waves-effect waves-dark" href="{{route('admin.home')}}" aria-expanded="false">
                        <i class="mdi mdi-home"></i>
                        <span class="hide-menu">{{__('POS')}}</span>
                    </a>
                </li>

                <li class="nav-small-cap">{{__('Admin & People')}}</li>
                @if(auth()->guard('admin')->user()->hasRole('Super Admin'))
                    <li><a class="has-arrow waves-effect waves-dark" href="#!" aria-expanded="false">
                            <i class="mdi mdi-account-multiple"></i><span class="hide-menu">{{__('Admin Manage')}}</span></a>
                        <ul aria-expanded="false" class="collapse">
                            <li><a href="{{route('admin.all.user')}}">{{__('All Admin')}} </a></li>
                            <li><a href="{{route('admin.new.user')}}">{{__('Add New Admin')}}</a></li>
                            <li><a href="{{route('admin.all.admin.role')}}">{{__('All Admin Role')}}</a></li>
                        </ul>
                    </li>
                @endif

                @canany(['customer-list','customer-create'])
                    <li> <a class="has-arrow waves-effect waves-dark" href="#!" aria-expanded="false"><i class="mdi mdi-account-multiple-outline">
                            </i><span class="hide-menu">{{__('Customer Manage')}}</span></a>
                        <ul aria-expanded="false" class="collapse">
                            @can('customer-list')
                                <li><a href="{{route('admin.customer')}}">{{__('All Customer')}} </a></li>
                            @endcan
                            @can('customer-create')
                                <li><a href="{{route('admin.customer.new')}}">{{__('Add New Customer')}}</a></li>
                            @endcan
                        </ul>
                    </li>
                @endcanany

                @canany(['supplier-list','supplier-create'])
                    <li> <a class="has-arrow waves-effect waves-dark" href="#!" aria-expanded="false"><i class="mdi mdi-account-multiple-outline"></i>
                            <span class="hide-menu">{{__('Supplier Manage')}}</span></a>
                        <ul aria-expanded="false" class="collapse">
                            @can('supplier-list')
                                <li><a href="{{route('admin.supplier')}}">{{__('All Supplier')}} </a></li>
                            @endcan
                            @can('supplier-create')
                                <li><a href="{{route('admin.supplier.new')}}">{{__('Add New Supplier')}}</a></li>
                            @endcan
                        </ul>
                    </li>
                @endcanany

                <li class="nav-small-cap">{{__('Main Contents')}}</li>
                <li> <a class="has-arrow waves-effect waves-dark" href="#!" aria-expanded="false"><i class="mdi mdi-database"></i>
                        <span class="hide-menu">{{__('Products')}}</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="form-layout.html">{{__('All Products')}}</a></li>
                        <li><a href="form-layout.html">{{__('Add Product')}}</a></li>
                        <li><a href="{{route('admin.product.category')}}">{{__('Category')}}</a></li>
                        <li><a href="{{route('admin.product.subcategory')}}">{{__('Subcategory')}}</a></li>
                        <li><a href="{{route('admin.product.brand')}}">{{__('Brand')}}</a></li>
                        <li><a href="{{route('admin.color')}}">{{__('Color')}}</a></li>
                        <li><a href="{{route('admin.size')}}">{{__('Size')}}</a></li>
                        <li><a href="{{route('admin.product.brand')}}">{{__('Unit')}}</a></li>
                    </ul>
                </li>

                <li class="nav-small-cap">{{__('Setting & Others')}}</li>


                <li>
                    <a class="has-arrow waves-effect waves-dark" href="#!" aria-expanded="false">
                        <i class="mdi mdi-settings"></i>
                        <span class="hide-menu">{{__('Misc Settings')}}</span>
                    </a>

                    <ul aria-expanded="false" class="collapse">
                         <li><a href="{{route('admin.country')}}">{{__('Country Settings')}}</a></li>
                    </ul>
                </li>




                <li>
                    <a class="has-arrow waves-effect waves-dark" href="#!" aria-expanded="false">
                        <i class="mdi mdi-settings"></i>
                        <span class="hide-menu">{{__('General Settings')}}</span>
                    </a>

                    <ul aria-expanded="false" class="collapse">

                        @canany([
                        'general-settings-site-identity',
                        'general-settings-basic-settings',
                        'general-settings-color-settings',
                        'general-settings-typography',
                        'general-settings-seo-settings',
                        'general-settings-third-party-script',
                        'general-settings-email-template',
                        'general-settings-smtp-settings',
                        'general-settings-page-settings',
                        'general-settings-payment-gateway',
                        'general-settings-cache-settings',
                        'general-settings-sitemap',
                        'general-settings-database-upgrade',

                        ])

                            @can('general-settings-site-identity')
                                <li><a href="{{route('admin.general.site.identity')}}">{{__('Site Identity')}}</a></li>
                            @endcan

                            @can('general-settings-basic-settings')
                                <li><a href="{{route('admin.general.basic.settings')}}">{{__('Basic Settings')}}</a></li>
                            @endcan

                            @can('general-settings-seo-settings')
                                <li><a href="{{route('admin.general.seo.settings')}}">{{__('SEO Settings')}}</a></li>
                            @endcan

{{--                            @can('general-settings-third-party-script')--}}
{{--                                <li><a href="{{route('admin.general.scripts.settings')}}">{{__('Third Party Scripts')}}</a></li>--}}
{{--                            @endcan--}}

                            @can('general-settings-smtp-settings')
                                <li><a href="{{route('admin.general.smtp.settings')}}">{{__('SMTP Settings')}}</a></li>
                            @endcan

                            @can('general-settings-cache-settings')
                                <li><a href="{{route('admin.general.cache.settings')}}">{{__('Cache Settings')}}</a></li>
                            @endcan

                            @can('general-settings-database-upgrade')
                                <li><a href="{{route('admin.general.database.upgrade')}}">{{__('Database Upgrade')}}</a></li>
                            @endcan
                      @endcanany

                        @can('language-list')
                        <li><a href="{{route('admin.languages')}}">{{__('Languages')}}</a></li>
                        @endcan
                    </ul>
                </li>

            </ul>
        </nav>
    </div>
</aside>