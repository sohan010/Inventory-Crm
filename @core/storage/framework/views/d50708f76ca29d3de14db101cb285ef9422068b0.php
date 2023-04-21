<?php $__currentLoopData = $all_products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <tr>
        <td class="text-center">
            <div class="action_button_container">
                <form action="" class="add_to_cart_pos_form" type="post">
                    <button type="submit" class="btn btn-primary btn-sm btn-circle add_to_cart_btn"
                            data-product_id="<?php echo e($data->id); ?>"
                            data-toggle="tooltip"
                            data-title="Add to Bill"
                    ><i class="fa fa-plus"></i>
                    </button>
                </form>
            </div>
        </td>

        <td class="text-info">
            <?php echo render_attachment_preview_for_admin($data->image); ?>

            <?php echo e($data->product_name); ?>

        </td>

        <td>
            <ul>
                <li><?php echo e(__('Product Code')); ?> : <strong class="text-info"><?php echo e($data->product_code); ?></strong></li>
                <li><?php echo e(__('Available Quantity')); ?> : <strong class="text-info"><?php echo e($data->quantity); ?></strong></li>
                <li><?php echo e(__('Category')); ?> : <strong class="text-info"><?php echo e($data->category?->name); ?></strong></li>
                <li><?php echo e(__('Subcategory')); ?> : <strong class="text-info"><?php echo e($data->subcategory?->name); ?></strong></li>
                <li><?php echo e(__('Brand')); ?> : <strong class="text-info"><?php echo e($data->brand?->name); ?></strong></li>
                <li><?php echo e(__('Price')); ?> : <strong class="text-info"><?php echo e(amount_with_currency_symbol($data->sale_price)); ?></strong></li>
                <li><?php echo e(__('Sold Count')); ?> : <strong class="text-info"><?php echo e($data->sold_count); ?></strong></li>
            </ul>
        </td>
    </tr>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php /**PATH H:\xampp\htdocs\inventory-crm\@core\resources\views/backend/pos/render-js-string-blade/misc-products.blade.php ENDPATH**/ ?>