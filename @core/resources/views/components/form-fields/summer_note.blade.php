<div class="col-lg-{{$col ?? '12'}} {{$class ?? ''}}">
    <div class="form-group">
        <label>{{$label}}</label>
        <textarea  name="{{$name}}" class="form-control summernote {{$class ?? ''}}" rows="3" cols="5" placeholder="{{$label}}">{{$value ?? ''}}</textarea>
        @if(isset($info))
            <small class="info-text d-block mt-2">{!! $info !!}</small>
        @endif
    </div>
</div>
