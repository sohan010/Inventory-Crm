@foreach($all_products as $data)
    <tr>
        <td class="text-center">
            <div class="action_button_container">
                <form action="" class="add_to_cart_pos_form" type="post">
                    <button type="submit" class="btn btn-primary btn-sm btn-circle add_to_cart_btn"
                            data-product_id="{{$data->id}}"
                            data-toggle="tooltip"
                            data-title="Add to Bill"
                    ><i class="fa fa-plus"></i>
                    </button>
                </form>
            </div>
        </td>

        <td class="text-info">
            {!! render_attachment_preview_for_admin($data->image) !!}
            {{$data->product_name}}
        </td>

        <td>
            <ul>
                <li>{{__('Product Code')}} : <strong class="text-info">{{$data->product_code}}</strong></li>
                <li>{{__('Available Quantity')}} : <strong class="text-info">{{$data->quantity}}</strong></li>
                <li>{{__('Category')}} : <strong class="text-info">{{$data->category?->name}}</strong></li>
                <li>{{__('Subcategory')}} : <strong class="text-info">{{$data->subcategory?->name}}</strong></li>
                <li>{{__('Brand')}} : <strong class="text-info">{{$data->brand?->name}}</strong></li>
                <li>{{__('Price')}} : <strong class="text-info">{{amount_with_currency_symbol($data->sale_price)}}</strong></li>
                <li>{{__('Sold Count')}} : <strong class="text-info">{{$data->sold_count}}</strong></li>
            </ul>
        </td>
    </tr>
@endforeach