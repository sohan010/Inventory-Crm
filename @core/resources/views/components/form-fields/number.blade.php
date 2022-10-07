
<div class="col-lg-{{$col ?? '4'}} {{$groupClass ?? ''}}">
    <label for="name">{{$label}}</label>
    <div class="input-group">
        <div class="input-group-addon"><i class="ti-{{$icon ?? 'user'}}"></i></div>
        <input type="number" class="form-control {{$class ?? ''}}" value="{{$value ?? ''}}" name="{{$name}}" placeholder="{{$placeholder ?? 'Enter Value'}}">
    </div>
</div>