
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
                    <a class="waves-effect waves-dark" href="{{route('admin.pos')}}" aria-expanded="false">
                        <i class="mdi mdi-view-dashboard"></i>
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
                <li> <a class="has-arrow waves-effect waves-dark" href="#!" aria-expanded="false"><i class="mdi mdi-cart"></i>
                        <span class="hide-menu">{{__('Products')}}</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="{{route('admin.product')}}">{{__('All Products')}}</a></li>
                        <li><a href="{{route('admin.product.create')}}">{{__('Add Product')}}</a></li>
                        <li><a href="{{route('admin.product.category')}}">{{__('Category')}}</a></li>
                        <li><a href="{{route('admin.product.subcategory')}}">{{__('Subcategory')}}</a></li>
                        <li><a href="{{route('admin.product.brand')}}">{{__('Brand')}}</a></li>
                        <li><a href="{{route('admin.color')}}">{{__('Color')}}</a></li>
                        <li><a href="{{route('admin.size')}}">{{__('Size')}}</a></li>
                        <li><a href="{{route('admin.unit')}}">{{__('Unit')}}</a></li>
                    </ul>
                </li>

                <li> <a class="has-arrow waves-effect waves-dark" href="#!" aria-expanded="false"><i class="mdi mdi-car-battery"></i>
                        <span class="hide-menu">{{__('Order Manage')}}</span></a>
                    <ul aria-expanded="false" class="collapse">
                            <li><a href="{{route('admin.order')}}">{{__('All Order')}} </a></li>
                            <li><a href="{{route('admin.order')}}">{{__('All Reports')}} </a></li>
                    </ul>
                </li>


                    <li> <a class="has-arrow waves-effect waves-dark" href="#!" aria-expanded="false"><i class="mdi mdi-account-multiple-outline"></i>
                            <span class="hide-menu">{{__('HR Manage')}}</span></a>
                        <ul aria-expanded="false" class="collapse">
                                <li><a href="{{route('admin.supplier')}}">{{__('All Employee')}} </a></li>
                        </ul>
                    </li>

                <li> <a class="has-arrow waves-effect waves-dark" href="#!" aria-expanded="false"><i class="mdi mdi-cash"></i>
                        <span class="hide-menu">{{__('Expense Manage')}}</span></a>
                    <ul aria-expanded="false" class="collapse">
                            <li><a href="{{route('admin.supplier')}}">{{__('All Expense')}} </a></li>
                    </ul>
                </li>


                <li class="nav-small-cap">{{__('Setting & Others')}}</li>


                <li>
                    <a class="has-arrow waves-effect waves-dark" href="#!" aria-expanded="false">
                        <i class="mdi mdi-settings"></i>
                        <span class="hide-menu">{{__('Misc Settings')}}</span>
                    </a>

                    <ul aria-expanded="false" class="collapse">
                         <li><a href="{{route('admin.coupon')}}">{{__('Coupon Settings')}}</a></li>
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
                                <li><a href="{{route('admin.general.company.settings')}}">{{__('Comapany Settings')}}</a></li>
                            @endcan

                                @can('general-settings-payment-settings')
                                    <li><a href="{{route('admin.general.payment.settings')}}">{{__('Payment Settings')}}</a></li>
                                @endcan

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