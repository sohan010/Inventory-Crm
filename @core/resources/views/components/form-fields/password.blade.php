
<div class="col-lg-{{$col ?? '4'}}">
    <label for="name">{{$label}}</label>
    <div class="input-group">
        <div class="input-group-addon"><i class="ti-{{$icon ?? 'user'}}"></i></div>
        <input type="password" class="form-control {{$class ?? ''}}" name="{{$name}}" placeholder="{{$placeholder ?? 'Enter Password'}}">
    </div>
</div>

