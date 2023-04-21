
    <div class="modal fade" id="add_customer_modal_in_pos" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-info">
                    <h5 class="modal-title text-white">{{__('Add New Customer')}}</h5>
                    <a href="#" type="button" class="close text-white" data-dismiss="modal"><span>×</span></a>
                </div>
                <form action="{{route('admin.customer.ajax.store')}}" method="post" enctype="multipart/form-data" class="customer_add_form_pos">
                    <div class="modal-body">
                        @csrf

                        <div class="error_container"></div>

                        <div class="row">
                            <x-form-fields.text label="Name" name="name" icon="user" col="12"/>
                            <x-form-fields.email label="Email" name="email"  marginTop="my-3" icon="email" col="12"/>
                            <x-form-fields.number label="Phone" name="phone" marginTop="my-3" icon="mobile" col="12"/>
                            <x-form-fields.text class="mt-3" label="Address" name="address" icon="home" col="12"/>

                            <x-form-fields.select name="customer_type" label="{{__('Customer Type')}}" col="12" customClass="customer_type">
                                <option value="0">{{ __('General') }}</option>
                                <option value="1">{{ __('Other') }}</option>
                            </x-form-fields.select>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary customer_add_form_pos_close_btn" data-dismiss="modal">{{__('Close')}}</button>
                            <button id="submit" type="submit" class="btn btn-info customer_submit_btn_from_pos">{{__('Submit')}}</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
