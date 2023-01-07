@can('product-color-create')
    <div class="modal fade" id="new_color" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{__('New Color Item')}}</h5>
                    <button type="button" class="close" data-dismiss="modal"><span>×</span></button>
                </div>
                <form action="{{route('admin.color')}}" method="post" enctype="multipart/form-data">
                    <div class="modal-body">
                        @csrf

                        <label for="edit_name">{{__('Name')}}</label>
                        <div class="input-group mb-3">
                            <div class="input-group-addon"><i class="ti-user"></i></div>
                            <input type="text" class="form-control" name="name" placeholder="{{__('Name')}}">
                        </div>

                        <label for="edit_name ">{{__('Color Code')}}</label>
                        <div class="input-group">
                            <div class="input-group-addon"><i class="ti-settings"></i></div>
                            <input type="text" name="color_code" class="form-control" value="" id="color_code">
                        </div>

                        <div class="form-group mt-3">
                       <label for="edit_status">{{__('Status')}}</label>
                            <select name="status" class="form-control">
                                <option value="1">{{__('Publish')}}</option>
                                <option value="0">{{__('Draft')}}</option>
                            </select>
                        </div>



                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary"
                                    data-dismiss="modal">{{__('Close')}}</button>
                            <button id="submit" type="submit" class="btn btn-primary">{{__('Submit')}}</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endcan