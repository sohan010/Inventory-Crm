@extends('backend.admin-master')

@section('style')
    <link rel="stylesheet" href="{{asset('assets/backend/css/colorpicker.css')}}">
    <link rel="stylesheet" href="{{asset('assets/backend/css/dropzone.css')}}">
    <x-media.css/>
@endsection

@section('site-title')
    {{__('Basic Settings')}}
@endsection

@section('page-title')
    {{__('Basic Settings')}}
@endsection

@section('content')
    <div class="col-lg-12 col-ml-12 padding-bottom-30">
        <div class="row">
            <div class="col-12 mt-5">
              <x-msg.success/>
                <x-msg.error/>
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex">
                            <h4 class="header-title">{{__("Basic Settings")}}</h4>
                        </div>
                    </div>
                    <div class="card-body">

                        <form action="{{route('admin.general.basic.settings')}}" method="POST" enctype="multipart/form-data">
                            @csrf

                                <div class="form-group">
                                    <label for="site_title">{{__('Site Title')}}</label>
                                    <input type="text" name="site_title"  class="form-control" value="{{get_static_option('site_title')}}" id="site_title">
                                </div>
                                <div class="form-group">
                                    <label for="site_tag_line">{{__('Site Tag Line')}}</label>
                                    <input type="text" name="site_tag_line"  class="form-control" value="{{get_static_option('site_tag_line')}}" id="site_tag_line">
                                </div>
                                <div class="form-group">
                                    <label for="site_footer_copyright">{{__('Footer Copyright')}}</label>
                                    <input type="text" name="site_footer_copyright"  class="form-control" value="{{get_static_option('site_footer_copyright')}}" id="site_footer_copyright">
                                    <small class="form-text text-muted">{copy} {{__('Will replace by &copy; and {year} will be replaced by current year.')}}</small>
                                </div>



                            <div class="form-group">
                                <label for="site_sticky_navbar_enabled"><strong>{{__('Sticky Navbar Enable/Disable')}}</strong></label>
                                <label class="switch">
                                    <input type="checkbox" name="site_sticky_navbar_enabled"  @if(!empty(get_static_option('site_sticky_navbar_enabled'))) checked @endif id="site_sticky_navbar_enabled">
                                    <span class="slider onff"></span>
                                </label>
                            </div>



                            <div class="form-group">
                                <label for="site_admin_panel_nav_sticky"><strong>{{__('Enable/Disable Admin Panel Nav Sticky')}}</strong></label>
                                <label class="switch">
                                    <input type="checkbox" name="site_admin_panel_nav_sticky"  @if(!empty(get_static_option('site_admin_panel_nav_sticky'))) checked @endif >
                                    <span class="slider onff"></span>
                                </label>
                            </div>
                            <div class="form-group">
                                <label for="site_payment_gateway"><strong>{{__('Enable/Disable Payment Gateway')}}</strong></label>
                                <label class="switch">
                                    <input type="checkbox" name="site_payment_gateway"  @if(!empty(get_static_option('site_payment_gateway'))) checked @endif id="site_payment_gateway">
                                    <span class="slider onff"></span>
                                </label>
                            </div>
                            <div class="form-group">
                                <label for="disable_backend_preloader"><strong>{{__('Enable/Disable Backend Preloader')}}</strong></label>
                                <label class="switch">
                                    <input type="checkbox" name="disable_backend_preloader"  @if(!empty(get_static_option('disable_backend_preloader'))) checked @endif id="disable_backend_preloader">
                                    <span class="slider onff"></span>
                                </label>
                            </div>
                            <div class="form-group">
                                <label for="site_force_ssl_redirection"><strong>{{__('Enable/Disable Force SSL Redirection')}}</strong></label>
                                <label class="switch">
                                    <input type="checkbox" name="site_force_ssl_redirection"  @if(!empty(get_static_option('site_force_ssl_redirection'))) checked @endif>
                                    <span class="slider onff"></span>
                                </label>
                            </div>
                            <div class="form-group">
                                <label for="disable_user_email_verify"><strong>{{__('Disable User Email Verify')}}</strong></label>
                                <label class="switch">
                                    <input type="checkbox" name="disable_user_email_verify"  @if(!empty(get_static_option('disable_user_email_verify'))) checked @endif id="disable_user_email_verify">
                                    <span class="slider onff"></span>
                                </label>
                                <small class="info-text">{{__('No, means user must have to verify their email account in order access his/her dashboard.')}}</small>
                            </div>


                            <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4">{{__('Update Changes')}}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <x-media.markup/>
@endsection
@section('script')
    <script src="{{asset('assets/backend/js/colorpicker.js')}}"></script>
    <x-media.js/>
    <script>
        (function($){
            "use strict";
            $(document).ready(function(){

                initColorPicker('#site_color');
                initColorPicker('#site_secondary_color');
                initColorPicker('#site_main_color_two');
                initColorPicker('#site_heading_color');
                initColorPicker('#site_paragraph_color');
                initColorPicker('input[name="portfolio_home_color"');
                initColorPicker('input[name="logistics_home_color"');

                function initColorPicker(selector){
                    $(selector).ColorPicker({
                        color: '#852aff',
                        onShow: function (colpkr) {
                            $(colpkr).fadeIn(500);
                            return false;
                        },
                        onHide: function (colpkr) {
                            $(colpkr).fadeOut(500);
                            return false;
                        },
                        onChange: function (hsb, hex, rgb) {
                            $(selector).css('background-color', '#' + hex);
                            $(selector).val('#' + hex);
                        }
                    });
                }
            });
        }(jQuery));
    </script>
@endsection
