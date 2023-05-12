    <tfoot class="pos_cart_footer d-none">

    <tr>
        <td colspan="6" style="border-right-style: hidden;border-left-style: hidden" ></td>
    </tr>

    <tr>
        <td colspan="4" style="border-bottom-style: hidden; border-left-style: hidden; border-top-style: hidden"></td>
        <td class="text-right"><strong class=""><?php echo e(__('Subtotal')); ?></strong> :</td>

        <td class="text-right"><strong class="cart_subtotal_amount" style="font-size: 16px;"><?php echo e($virtual_cart_toal_amount ?? 0); ?></strong><?php echo e(site_currency_symbol()); ?></td>
    </tr>

    <tr>
        <td colspan="4" style="border-bottom-style: hidden; border-left-style: hidden"></td>
        <td class="text-right"><?php echo e(__('Discount')); ?>

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
        <td class="text-right"><?php echo e(__('Coupon')); ?>

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
        <td class="text-right"><?php echo e(__('Vat / Tax')); ?>

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
        <td class="text-right"><?php echo e(__('Shipping')); ?>

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
            <h4><?php echo e(__('Grand Total')); ?> : </h4>
        </td>
        <td class="text-right">
            <h4 class="cart_grand_total_amount"><?php echo e($virtual_cart_toal_amount ?? 0); ?><span class="currency"><?php echo e(site_currency_symbol()); ?></span></h4>
        </td>
    </tr>

    <tr>
        <td colspan="4" style="border-bottom-style: hidden; border-left-style: hidden"></td>
        <td class="text-right"><?php echo e(__('Payable')); ?>

            <a class="btn btn-info btn-sm cart_table_icon_button text-primary" data-toggle="modal" data-target="#cart_payable_modal">
                <i class="fa fa-edit text-white"></i>
            </a>
        </td>
        <td class="text-right">
            <span class="cart_payable_amount text-primary">0</span>
        </td>
    </tr>

    <tr>
        <td colspan="4" style="border-bottom-style: hidden; border-left-style: hidden"></td>
        <td class="text-right text-danger"><?php echo e(__('Due Amount')); ?></td>
        <td class="text-right">
            <span class="cart_due_amount text-danger">0</span>
        </td>
    </tr>

    <tr>
        <td colspan="4" style="border-bottom-style: hidden; border-left-style: hidden"></td>
        <td colspan="2" class="text-right">

                <div class="form-group d-flex justify-content-center">
                    <div class="pay">
                        <label for=""><?php echo e(__('Select Payment Gateway')); ?></label>
                        <select name="payment_gateway" class="form-control payment_gateway_list_pos" style="width: 100%; display: inherit">
                            <option value="cash_on_delivery"><?php echo e(__('Cash on delivery')); ?></option>
                            <option value="manual_bank_payment"><?php echo e(__('Bank Transfer')); ?></option>
                            <option value="mollie"><?php echo e(__('Mollie')); ?></option>
                            <option value="paytm"><?php echo e(__('Paytm')); ?></option>
                            <option value="stripe"><?php echo e(__('Stripe')); ?></option>
                            <option value="cashfree"><?php echo e(__('Cashfree')); ?></option>
                            <option value="midtrans"><?php echo e(__('Midtrans')); ?></option>
                            <option value="ssl_commerz"><?php echo e(__('SSLCommerz')); ?></option>
                            <option value="cheque"><?php echo e(__('Cheque')); ?></option>

                        </select>
                    </div>
                </div>

            <div class="form-group manual_payment_parent d-none">
                <h6 class="text-center"><?php echo e(__('Attach Bank Paid Document')); ?></h6>
                <input type="file" name="manual_payment_attachment" class=" form-control manual_payment_attachment text-center" style="width: 250px">
            </div>


             <div class="d-none cheque_payment_parent">
                <h6 class="text-center"><?php echo e(__('Cheque Number')); ?></h6>
                <input type="text" name="cheque_number" class="form-control" style="width: 250px">

                <h6 class="text-center mt-3"><?php echo e(__('Payment Note')); ?></h6>
                 <input type="text" name="cheque_payment_note" class="form-control mb-3" style="width: 250px">
            </div>


            <button type="submit" class="btn btn-primary btn-block"><?php echo e(__('Place Order')); ?></button>
        </td>
    </tr>
    </tfoot><?php /**PATH H:\xampp\htdocs\inventory-crm\@core\resources\views/backend/pos/partials/pos-cart-footer.blade.php ENDPATH**/ ?>