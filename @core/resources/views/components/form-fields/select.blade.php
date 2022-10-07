
<div class="form-group col-lg-{{$col ?? '4'}} {{$marginTop ?? 'mt-3'}}">
    <label for="role">{{$label ?? ''}}</label>
    <select name="{{$name}}" class="form-control {{$custom_class ?? ''}}">
         {{$slot ?? ''}}
    </select>
</div>
