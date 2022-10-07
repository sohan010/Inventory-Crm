<div class="col-lg-{{$col ?? '12'}} mt-3">
    <label for="">{{ $label ?? 'Image' }}</label>
    <div class="media-upload-btn-wrapper">
        <div class="img-wrap">
            @php
                $image = get_attachment_image_by_id($value ?? '',null,true);
                $image_btn_label = __('Upload Image');
            @endphp
            @if (!empty($image))
                <div class="attachment-preview">
                    <div class="thumbnail">
                        <div class="centered">
                            <img class="avatar user-thumb" src="{{$image['img_url']}}" alt="">
                        </div>
                    </div>
                </div>
                @php  $label =__( 'Change Image'); @endphp
            @endif
        </div>
        <input type="hidden" name="{{$name}}" value="{{$value ?? ''}}">
        <button type="button" class="btn btn-info media_upload_form_btn" data-btntitle="{{__('Select Image')}}" data-modaltitle="{{__('Upload Image')}}" data-toggle="modal" data-target="#media_upload_modal">
            {{__($label ?? 'Image')}}
        </button>
    </div>
</div>
