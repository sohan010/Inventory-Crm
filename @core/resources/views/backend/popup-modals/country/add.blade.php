@can('country-create')
    <div class="modal fade" id="new_country" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{__('New Testimonial Item')}}</h5>
                    <button type="button" class="close" data-dismiss="modal"><span>×</span></button>
                </div>
                <form action="{{route('admin.country')}}" method="post" enctype="multipart/form-data">
                    <div class="modal-body">
                        @csrf

                        <label for="edit_name">{{__('Name')}}</label>
                        <div class="input-group">
                            <div class="input-group-addon"><i class="ti-user"></i></div>
                            <input type="text" class="form-control" name="name" placeholder="{{__('Name')}}">
                        </div>

                        <div class="form-group mt-3">
                       <label for="edit_status">{{__('Status')}}</label>
                            <select name="status" class="form-control">
                                <option value="publish">{{__('Publish')}}</option>
                                <option value="draft">{{__('Draft')}}</option>
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