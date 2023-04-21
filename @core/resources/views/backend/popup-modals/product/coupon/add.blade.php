
    <div class="modal fade" id="new_coupon_modal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-info">
                    <h4 class="modal-title text-white">{{__('New Coupon Item')}}</h4>
                    <button type="button" class="close text-white" data-dismiss="modal"><span>×</span></button>
                </div>
                <form action="{{route('admin.coupon')}}" method="post" enctype="multipart/form-data">
                    <div class="modal-body">
                        @csrf

                        <label for="edit_name">{{__('Title')}}</label>
                        <div class="input-group">
                            <div class="input-group-addon"><i class="ti-file"></i></div>
                            <input type="text" class="form-control" name="title" placeholder="{{__('Title')}}">
                        </div>

                        <div class="main my-3">
                            <label for="edit_name">{{__('Code')}}</label>
                            <div class="input-group">
                                <div class="input-group-addon"><i class="ti-settings"></i></div>
                                <input type="text" class="form-control" name="code" placeholder="{{__('Code')}}">
                            </div>
                        </div>

                        <label for="edit_name">{{__('Discount Amount')}}</label>
                        <div class="input-group">
                            <div class="input-group-addon"><i class="ti-money"></i></div>
                            <input type="number" min="1" class="form-control" name="discount_amount" placeholder="{{__('Discount Amount')}}">
                        </div>

                        <div class="form-group my-3">
                            <label for="edit_status">{{__('Discount Type')}}</label>
                            <select name="discount_type" class="form-control">
                                <option value="flat">{{__('Flat')}}</option>
                                <option value="percentage">{{__('Percentage')}}</option>
                            </select>
                        </div>

                        <label for="edit_name">{{__('Maximum Use Quantity')}}</label>
                        <div class="input-group">
                            <div class="input-group-addon"><i class="ti-shield"></i></div>
                            <input type="number" min="1" class="form-control" name="max_use_qty" placeholder="{{__('Maximum Use Quantity')}}">
                        </div>

                          <div class="main my-3">
                              <label for="edit_name">{{__('Expire Date')}}</label>
                              <div class="input-group">
                                  <div class="input-group-addon"><i class="ti-alarm-clock"></i></div>
                                  <input type="date" class="form-control expire_date" name="expire_date" placeholder="{{__('Expire Date')}}">
                              </div>
                          </div>

                        <div class="form-group my-3">
                            <label for="edit_status">{{__('Status')}}</label>
                            <select name="status" class="form-control">
                                <option value="1">{{__('Publish')}}</option>
                                <option value="0">{{__('Draft')}}</option>
                            </select>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">{{__('Close')}}</button>
                            <button id="submit" type="submit" class="btn btn-info">{{__('Submit')}}</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
