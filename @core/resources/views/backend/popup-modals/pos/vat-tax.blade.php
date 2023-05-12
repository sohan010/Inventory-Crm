
    <div class="modal fade" id="cart_vat_tax_modal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-info">
                    <h5 class="modal-title text-white">{{__('Vat/Tax Section')}}</h5>
                    <a href="#" type="button" class="close text-white" data-dismiss="modal"><span>×</span></a>
                </div>
                <form action="{{route('admin.product.cart.pos.vat.tax.store')}}" method="post" enctype="multipart/form-data" class="vat_tax_form">
                    <div class="modal-body">
                        @csrf
                        <input type="hidden" name="subtotal_amount" class="subtotal_amount">

                        <div class="error-container"></div>

                        <div class="row">
                            <x-form-fields.select name="vat_tax" label="{{__('Select Tax')}}" col="12" marginTop="mt-0 mb-3" customClass="vat_tax">
                                <option value="0" selected>{{ __('None') }}</option>
                                <option value="5">{{ __('Vat 5%') }}</option>
                                <option value="10">{{ __('Vat 10%') }}</option>
                                <option value="15">{{ __('Vat 15%') }}</option>
                                <option value="20">{{ __('Vat 20%') }}</option>
                            </x-form-fields.select>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary vat_tax_modal_close_button" data-dismiss="modal">{{__('Close')}}</button>
                            <button id="submit" type="submit" class="btn btn-info cart_vat_tax_submit_button">{{__('Submit')}}</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
