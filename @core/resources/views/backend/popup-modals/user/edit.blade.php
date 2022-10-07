
<div class="modal fade" id="user_edit_modal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{__('User Details Edit')}}</h5>
                <button type="button" class="close" data-dismiss="modal"><span>×</span></button>
            </div>
            <form action="{{route('admin.frontend.user.update')}}" id="user_edit_modal_form" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <input type="hidden" name="user_id" id="user_id">
                    @csrf
                    <div class="form-group">
                        <label for="name">{{__('Name')}}</label>
                        <input type="text" class="form-control"  id="name" name="name" placeholder="{{__('Enter name')}}">
                    </div>
                    <div class="form-group">
                        <label for="email">{{__('Email')}}</label>
                        <input type="text" class="form-control"  id="email" name="email" placeholder="{{__('Email')}}">
                    </div>
                    <div class="form-group">
                        <label for="phone">{{__('Phone')}}</label>
                        <input type="text" class="form-control"  id="phone" name="phone" placeholder="{{__('Phone')}}">
                    </div>
                    <div class="form-group">
                        <label for="country">{{__('Country')}}</label>
                        {!! get_country_field('country','country','form-control') !!}
                    </div>
                    <div class="form-group">
                        <label for="state">{{__('State')}}</label>
                        <input type="text" class="form-control"  id="state" name="state" placeholder="{{__('State')}}">
                    </div>
                    <div class="form-group">
                        <label for="city">{{__('City')}}</label>
                        <input type="text" class="form-control"  id="city" name="city" placeholder="{{__('City')}}">
                    </div>
                    <div class="form-group">
                        <label for="zipcode">{{__('Zipcode')}}</label>
                        <input type="text" class="form-control"  id="zipcode" name="zipcode" placeholder="{{__('Zipcode')}}">
                    </div>
                    <div class="form-group">
                        <label for="address">{{__('Address')}}</label>
                        <input type="text" class="form-control"  id="address" name="address" placeholder="{{__('Address')}}">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">{{__('Close')}}</button>
                    <button id="update" type="submit" class="btn btn-primary">{{__('Save changes')}}</button>
                </div>
            </form>
        </div>
    </div>
</div>