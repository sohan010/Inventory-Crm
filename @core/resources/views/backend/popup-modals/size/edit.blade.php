@can('product-category-edit')
    <div class="modal fade" id="edit_size_modal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{__('Edit Subcategory Item')}}</h5>
                    <button type="button" class="close" data-dismiss="modal"><span>×</span></button>
                </div>

                <form action="#" id="size_edit_modal_form" method="post"
                      enctype="multipart/form-data">
                    <div class="modal-body">
                        @csrf

                        <input type="hidden" name="id" id="size_id" value="">

                        <label for="edit_name">{{__('Name')}}</label>
                        <div class="input-group">
                            <div class="input-group-addon"><i class="ti-user"></i></div>
                            <input type="text" class="form-control" id="edit_name" name="name" placeholder="{{__('Name')}}">
                        </div>

                        <div class="parent my-3">
                            <label for="edit_name">{{__('Size')}}</label>
                            <div class="input-group">
                                <div class="input-group-addon"><i class="ti-settings"></i></div>
                                <input type="text" class="form-control" name="size_code" placeholder="{{__('Size')}}" id="edit_size_code">
                            </div>
                        </div>

                        <div class="form-group ">
                            <label for="edit_status">{{__('Status')}}</label>
                            <select name="status" class="form-control" id="edit_status">
                                <option value="1">{{__('Publish')}}</option>
                                <option value="0">{{__('Draft')}}</option>
                            </select>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary"
                                data-dismiss="modal">{{__('Close')}}</button>
                        <button id="update" type="submit" class="btn btn-primary">{{__('Save Changes')}}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endcan