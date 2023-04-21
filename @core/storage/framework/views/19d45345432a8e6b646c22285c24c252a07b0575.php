<?php $__currentLoopData = $all_cart_products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cart): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <tr>
        <td> <?php echo e($loop->iteration); ?></td>
        <td><?php echo e($cart->product_name); ?></td>
        <td class="text-center"><?php echo e(amount_with_currency_symbol($cart->unit_price)); ?></td>
        <td class="text-center">

            <a href="" class="badge badge-danger btn-sm cart_product_minus"
               data-id="<?php echo e($cart->id); ?>"
               data-product_id="<?php echo e($cart->product_id); ?>">
                -
            </a>

            <span class="mx-2 cart_table_middle_qty"><?php echo e($cart->quantity); ?></span>

            <a href="" class="badge badge-info btn-sm cart_product_plus"
               data-id="<?php echo e($cart->id); ?>"
               data-product_id="<?php echo e($cart->product_id); ?>">
                +
            </a>

        </td>
        <input type="hidden" class="cart_table_total" value="<?php echo e($cart->total_price); ?>">
        <td class="text-center"><?php echo e(amount_with_currency_symbol($cart->total_price)); ?></td>
        <td class="text-center">
            <a href="" data-id="<?php echo e($cart->id); ?>" class="badge badge-danger btn-sm pos_cart_item_delete_btn">X</a>
        </td>
    </tr>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php /**PATH H:\xampp\htdocs\inventory-crm\@core\resources\views/backend/pos/partials/js-string-blade/cart-data.blade.php ENDPATH**/ ?>