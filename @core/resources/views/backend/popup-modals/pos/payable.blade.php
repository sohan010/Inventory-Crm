
    <div class="modal fade" id="cart_payable_modal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-info">
                    <h5 class="modal-title text-white">{{__('Payable Amount')}}</h5>
                    <a href="#" type="button" class="close text-white" data-dismiss="modal"><span>×</span></a>
                </div>
                <form action="{{route('admin.product.cart.pos.payable.store')}}" method="post" enctype="multipart/form-data" class="cart_payable_form">
                    <div class="modal-body">
                        @csrf
                        <input type="hidden" name="subtotal_amount" class="subtotal_amount" value="{{ $virtual_cart_toal_amount }}">

                        <div class="error-container"></div>

                        <div class="row">
                            <x-form-fields.number label="Amount" name="payable_amount" class="payable_amount" icon="money" col="12" placeholder="{{__('Enter Amount')}}"/>

                           <div class="col-lg-12">
                               <a class="btn btn-danger btn-xs my-2 py-2 px-2 text-white payable_none_btn" href=""
                                  data-toggle="tooltip" title="{{ __('Click to make full due ') }}" data-payable_none="0">{{__('Full Due') }}
                               </a>
                               <a class="btn btn-primary btn-xs my-2 py-2 px-2 text-white payable_full_amount_btn" href=""
                                  data-toggle="tooltip" title="{{ __('Click to add as grand total ') }}">{{__('Full Paid') }}
                               </a>
                           </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary payable_modal_close_button" data-dismiss="modal">{{__('Close')}}</button>
                            <button id="submit" type="submit" class="btn btn-info cart_shipping_form_submit_button">{{__('Submit')}}</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
