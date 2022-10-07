
<div class="modal fade" id="user_change_password_modal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{__('Change Admin Password')}}</h5>
                <button type="button" class="close" data-dismiss="modal"><span>×</span></button>
            </div>
            @include('backend/partials/error')
            <form action="{{route('admin.user.password.change')}}" id="user_password_change_modal_form" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <input type="hidden" name="ch_user_id" id="ch_user_id">
                    <div class="form-group">
                        <label for="password">{{__('Password')}}</label>
                        <input type="password" class="form-control" name="password" placeholder="{{__('Enter Password')}}">
                    </div>
                    <div class="form-group">
                        <label for="password_confirmation">{{__('Confirm Password')}}</label>
                        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="{{__('Confirm Password')}}">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">{{__('Close')}}</button>
                    <button type="submit" class="btn btn-primary">{{__('Change Password')}}</button>
                </div>
            </form>
        </div>
    </div>
</div>