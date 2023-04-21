
    <div class="modal fade" id="cart_coupon_modal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-info">
                    <h5 class="modal-title text-white">{{__('Coupon Section')}}</h5>
                    <a href="#" type="button" class="close text-white" data-dismiss="modal"><span>×</span></a>
                </div>
                <form action="{{route('admin.cart.pos.coupon.discount.store')}}" method="post" enctype="multipart/form-data" class="cart_coupon_form">
                    <div class="modal-body">
                        @csrf
                        <input type="hidden" name="subtotal_amount" class="subtotal_amount" value="">

                        <div class="error-container"></div>

                        <div class="row">

                            <x-form-fields.text label="Code" name="code" innerClass="coupon_code" icon="money" col="12"/>

                            @php
                                $all_coupons = \App\Coupon::select('id','discount_amount','discount_type','code')->get();
                                $colors = ['info','primary','dark'];
                            @endphp
                            <div class="form-group my-3 col-lg-12 available_coupon_group">
                                @foreach($all_coupons as $coupon)
                                    <a class="badge badge-{{$colors[$loop->index % count($colors)]}} py-2 px-2" href=""
                                       data-toggle="tooltip" title="{{ __('Click to Add ') }}" data-coupon_code="{{$coupon->code}}">{{ $coupon->code }}
                                    </a>

                                     @if($loop->last)
                                        <a class="badge badge-danger ml-2 py-2 px-2 text-white" href=""
                                           data-toggle="tooltip" title="{{ __('Click to Add ') }}" data-coupon_code="none">{{__('None') }}
                                        </a>
                                    @endif


                                @endforeach
                            </div>
                        </div>


                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary cart_coupon_submit_cancel_btn" data-dismiss="modal">{{__('Close')}}</button>
                            <button id="submit" type="submit" class="btn btn-info cart_coupon_submit_btn">{{__('Submit')}}</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
