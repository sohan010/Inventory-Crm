@php
    $multiple = isset($multiple) ? 'multiple' : '';
@endphp

<div class="form-group col-lg-{{$col ?? '4'}} {{$marginTop ?? 'mt-3'}} {{ $groupClass ?? '' }}">
    <label for="role">{{$label ?? ''}}</label>
    <select name="{{$name}}" class="form-control {{$customClass ?? ''}}" {{$multiple}} >
         {{$slot ?? ''}}
    </select>
</div>
