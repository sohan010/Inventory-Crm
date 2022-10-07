
<div class="col-lg-{{$col ?? '4'}} {{$class ?? ''}}">
    <label for="name">{{$label ?? 'Title'}}</label>
    <div class="input-group">
        <div class="input-group-addon"><i class="ti-{{$icon ?? 'user'}}"></i></div>
        <input type="text" class="form-control" value="{{$value ?? ''}}" name="{{$name}}" placeholder="{{$placeholder ?? 'Enter Value'}}">
    </div>
    <small class="text-info">{{$notice ?? ''}}</small>
</div>