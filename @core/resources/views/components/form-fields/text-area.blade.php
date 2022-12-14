<div class="col-lg-{{$col ?? '12'}} {{$class ?? ''}}">
    <div class="form-group">
        <label>{{$label}}</label>
        <textarea name="{{$name}}" class="form-control {{$innerClass ?? ''}}" rows="5" cols="5" placeholder="{{$label}}" style="height:{{ $height ?? '100px' }}">{{$value ?? ''}}</textarea>
        @if(isset($info))
            <small class="info-text d-block mt-2">{!! $info !!}</small>
        @endif
    </div>
</div>
