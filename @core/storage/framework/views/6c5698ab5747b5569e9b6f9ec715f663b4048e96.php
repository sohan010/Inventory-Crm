
    <div class="card">
        <div class="card-header">
            <div class="d-flex justify-content-between">
                <div class="left">
                    <h3 class="card-title"><?php echo e(__('Product Section')); ?></h3>
                </div>

                <div class="right">
                    <a class="btn btn-outline-primary btn-sm top_right_all_product_btn" href=""><?php echo e(__('All Product')); ?> </a>
                    <a class="btn btn-outline-info btn-sm top_right_content_btn" data-content="category" href=""><?php echo e(__('Categories')); ?> </a>
                    <a class="btn btn-outline-primary btn-sm top_right_content_btn" data-content="subcategory" href=""><?php echo e(__('Subcategories')); ?></a>
                    <a class="btn btn-outline-dark btn-sm top_right_content_btn" data-content="brand" href=""><?php echo e(__('Brands')); ?></a>
                </div>

            </div>
        </div>
        <div class="card-body">

            <div class="inner_items_from_top_right_container"></div>

            <div class="table-responsive product_list_table">
                <table id="example23" class="display nowrap table table-hover table-bordered">
                    <thead>
                    <tr>
                        <th><?php echo e(__('Action')); ?></th>
                        <th><?php echo e(__('Image')); ?></th>
                        <th><?php echo e(__('Information')); ?></th>
                    </tr>
                    </thead>

                    <tbody class="pos_table_body">
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
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
<?php /**PATH H:\xampp\htdocs\inventory-crm\@core\resources\views/backend/pos/partials/pos-right-section.blade.php ENDPATH**/ ?>