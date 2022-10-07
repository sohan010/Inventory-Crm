
<div class="col-lg-{{$col ?? '4'}} {{$marginTop ?? ''}}">
    <label for="name">{{$label}}</label>
    <div class="input-group">
        <div class="input-group-addon"><i class="ti-{{$icon ?? 'user'}}"></i></div>
        <input type="email" class="form-control {{$class ?? ''}}" value="{{$value ?? ''}}" name="{{$name}}" placeholder="{{$placeholder ?? 'Enter Value'}}">
    </div>
</div>