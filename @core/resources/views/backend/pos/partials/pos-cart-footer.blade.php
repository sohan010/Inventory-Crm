    <tfoot class="pos_cart_footer d-none">

    <tr>
        <td colspan="6" style="border-right-style: hidden;border-left-style: hidden" ></td>
    </tr>

    <tr>
        <td colspan="4" style="border-bottom-style: hidden; border-left-style: hidden; border-top-style: hidden"></td>
        <td class="text-right"><strong class="">{{__('Subtotal')}}</strong> :</td>

        <td class="text-right"><strong class="cart_subtotal_amount" style="font-size: 16px;">{{$virtual_cart_toal_amount ?? 0 }}</strong>{{site_currency_symbol()}}</td>
    </tr>

    <tr>
        <td colspan="4" style="border-bottom-style: hidden; border-left-style: hidden"></td>
        <td class="text-right">{{__('Discount')}}
            <a class="btn btn-info btn-sm cart_table_icon_button" data-toggle="modal" data-target="#cart_pos_discount_modal">
                <i class="fa fa-edit text-white"></i>
            </a>
        </td>

        <td class="d-flex justify-content-between">
            <span class="text-info cart_discount_percentage_show cart_percentage_show"></span>
            <span class="cart_discount_amount">0</span>
        </td>
    </tr>

    <tr>
        <td colspan="4" style="border-bottom-style: hidden; border-left-style: hidden"></td>
        <td class="text-right">{{__('Coupon')}}
            <a class="btn btn-info btn-sm cart_table_icon_button" data-toggle="modal" data-target="#cart_coupon_modal">
                <i class="fa fa-edit text-white"></i>
            </a>
        </td>
        <td class="d-flex justify-content-between">
            <span class="cart_coupon_percentage_show text-info cart_percentage_show"></span>
            <span class="cart_coupon_amount">0</span>
        </td>
    </tr>

    <tr>
        <td colspan="4" style="border-bottom-style: hidden; border-left-style: hidden"></td>
        <td class="text-right">{{__('Vat / Tax')}}
            <a class="btn btn-info btn-sm cart_table_icon_button" data-toggle="modal" data-target="#cart_vat_tax_modal">
                <i class="fa fa-edit text-white"></i>
            </a>
        </td>
        <td class="d-flex justify-content-between">
            <span class="cart_vat_tax_percentage_show text-left text-info cart_percentage_show"></span>
            <span class="cart_vat_tax_amount text-right">0</span>
        </td>

    </tr>

    <tr>
        <td colspan="4" style="border-bottom-style: hidden; border-left-style: hidden"></td>
        <td class="text-right">{{__('Shipping')}}
            <a class="btn btn-info btn-sm cart_table_icon_button" data-toggle="modal" data-target="#cart_shipping_modal">
                <i class="fa fa-edit text-white"></i>
            </a>
        </td>
        <td class="text-right">
            <span class="cart_shipping_amount">0</span>
        </td>
    </tr>

    <tr>
        <td colspan="4" style="border-bottom-style: hidden; border-left-style: hidden"></td>
        <td class="text-right">
            <h4>{{__('Grand Total')}} : </h4>
        </td>
        <td class="text-right">
            <h4 class="cart_grand_total_amount">{{$virtual_cart_toal_amount ?? 0}}<span class="currency">{{site_currency_symbol()}}</span></h4>
        </td>
    </tr>

    <tr>
        <td colspan="4" style="border-bottom-style: hidden; border-left-style: hidden"></td>
        <td colspan="2" class="text-right">
            <button class="btn btn-primary">{{__('Place Order')}}</button>
        </td>
    </tr>
    </tfoot>