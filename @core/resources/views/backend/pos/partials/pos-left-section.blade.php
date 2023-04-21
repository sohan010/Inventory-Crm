<div class="card">
    <div class="card-header">
        <div class="d-flex justify-content-between">
            <div class="left">
                <h3 class="card-title text-dark">{{__('Bill Section')}}</h3>
            </div>
            <div class="right">
                <a class="btn btn-outline-info btn-sm top_right_all_product_btn"
                   data-toggle="modal"
                   data-target="#add_customer_modal_in_pos"
                >
                    {{__('Add New Customer')}}
                </a>
            </div>
        </div>
    </div>

    <div class="card-body">
        <form action="">
            <div class="row">
                   <x-form-fields.text label="{{__('Bill Date')}}" col="6" name="bill_date" innerClass="bill_date bill_date" icon="time" placeholder="Click to set date"/>

                    <x-form-fields.select name="feature" margin-top="mt-0" customClass="select2 pos_customer_selectbox" label="{{__('Select Customer')}}" col="6">
                        @foreach($all_customers as $customer)
                            <option value="{{$customer->id}}">{{ $customer->name }}</option>
                        @endforeach
                    </x-form-fields.select>


                <div class="col-md-12">
                    <table class="table table-bordered pos_cart_table" style="width: 100%">
                        <thead class="text-white" style="background-color: #625a91">
                        <td class="text-center"><strong>{{__('SL#')}}</strong></td>
                        <td class="text-center"><strong>{{__('Product Name')}}</strong></td>
                        <td class="text-center"><strong>{{__('Unit Price')}}</strong></td>
                        <td class="text-center"><strong>{{__('Qty')}}</strong></td>
                        <td class="text-center"><strong>{{__('Total')}}</strong></td>
                        <td class="text-center"><strong>{{__('Action')}}</strong></td>
                        </thead>
                        <tbody class="pos_cart_body">
                        @foreach($all_cart_products as $cart)
                            <tr>
                                <td> {{ $loop->iteration }}</td>
                                <td>{{$cart->product_name}}</td>
                                <td class="text-center">{{ amount_with_currency_symbol($cart->unit_price) }}</td>
                                <td class="text-center">

                                    <a href="" class="badge badge-danger btn-sm cart_product_minus"
                                       data-id="{{$cart->id}}"
                                       data-product_id="{{ $cart->product_id }}">
                                        -
                                    </a>

                                    <span class="mx-2 cart_table_middle_qty">{{ $cart->quantity }}</span>

                                    <a href="" class="badge badge-info btn-sm cart_product_plus"
                                       data-id="{{$cart->id}}"
                                       data-product_id="{{ $cart->product_id }}">
                                        +
                                    </a>

                                </td>
                                <input type="hidden" class="cart_table_total" value="{{$cart->total_price}}">
                                <td class="text-center">{{ amount_with_currency_symbol($cart->total_price) }}</td>
                                <td class="text-center">
                                    <a href="" data-id="{{$cart->id}}" class="badge badge-danger btn-sm pos_cart_item_delete_btn">X</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                          @include('backend.pos.partials.pos-cart-footer')
                    </table>
                </div>
            </div>
        </form>
    </div>
</div>