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