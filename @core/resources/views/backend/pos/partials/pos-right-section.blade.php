
    <div class="card">
        <div class="card-header">
            <div class="d-flex justify-content-between">
                <div class="left">
                    <h3 class="card-title">{{__('Product Section')}}</h3>
                </div>

                <div class="right">
                    <a class="btn btn-outline-primary btn-sm top_right_all_product_btn" href="">{{__('All Product')}} </a>
                    <a class="btn btn-outline-info btn-sm top_right_content_btn" data-content="category" href="">{{__('Categories')}} </a>
                    <a class="btn btn-outline-primary btn-sm top_right_content_btn" data-content="subcategory" href="">{{__('Subcategories')}}</a>
                    <a class="btn btn-outline-dark btn-sm top_right_content_btn" data-content="brand" href="">{{__('Brands')}}</a>
                </div>

            </div>
        </div>
        <div class="card-body">

            <div class="inner_items_from_top_right_container"></div>

            <div class="table-responsive product_list_table">
                <table id="example23" class="display nowrap table table-hover table-bordered">
                    <thead>
                    <tr>
                        <th>{{__('Action')}}</th>
                        <th>{{__('Image')}}</th>
                        <th>{{__('Information')}}</th>
                    </tr>
                    </thead>

                    <tbody class="pos_table_body">
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
                    </tbody>
                </table>
            </div>
        </div>
    </div>
