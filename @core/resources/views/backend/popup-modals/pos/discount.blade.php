
    <div class="modal fade" id="cart_pos_discount_modal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-info">
                    <h5 class="modal-title text-white">{{__('Discount Section')}}</h5>
                    <a href="#" type="button" class="close text-white" data-dismiss="modal"><span>×</span></a>
                </div>
                <form action="{{route('admin.product.cart.pos.discount.store')}}" method="post" enctype="multipart/form-data" class="cart_discount_form">
                    <div class="modal-body">
                        @csrf
                        <input type="hidden" name="subtotal_amount" class="subtotal_amount" value="">

                        <div class="error-container"></div>

                        <div class="row">
                            <x-form-fields.select name="discount_type" label="{{__('Discount Type')}}" col="12" marginTop="mt-0 mb-3" customClass="discount_type">
                                <option value="none">{{ __('None') }}</option>
                                <option value="flat">{{ __('Flat') }}</option>
                                <option value="percentage">{{ __('Percentage') }}</option>
                            </x-form-fields.select>

                            <x-form-fields.number label="Amount" name="discount_amount" class="discount_amount" icon="money" col="12"/>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary discount_modal_close_button" data-dismiss="modal">{{__('Close')}}</button>
                            <button id="submit" type="submit" class="btn btn-info cart_discount_form_submit_button">{{__('Submit')}}</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
