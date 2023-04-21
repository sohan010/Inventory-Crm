<div class="card">
    <div class="card-header">
        <div class="d-flex justify-content-between">
            <div class="left">
                <h3 class="card-title text-dark"><?php echo e(__('Bill Section')); ?></h3>
            </div>
            <div class="right">
                <a class="btn btn-outline-info btn-sm top_right_all_product_btn"
                   data-toggle="modal"
                   data-target="#add_customer_modal_in_pos"
                >
                    <?php echo e(__('Add New Customer')); ?>

                </a>
            </div>
        </div>
    </div>

    <div class="card-body">
        <form action="">
            <div class="row">
                   <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.form-fields.text','data' => ['label' => ''.e(__('Bill Date')).'','col' => '6','name' => 'bill_date','innerClass' => 'bill_date bill_date','icon' => 'time','placeholder' => 'Click to set date']]); ?>
<?php $component->withName('form-fields.text'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['label' => ''.e(__('Bill Date')).'','col' => '6','name' => 'bill_date','innerClass' => 'bill_date bill_date','icon' => 'time','placeholder' => 'Click to set date']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>

                    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.form-fields.select','data' => ['name' => 'feature','marginTop' => 'mt-0','customClass' => 'select2 pos_customer_selectbox','label' => ''.e(__('Select Customer')).'','col' => '6']]); ?>
<?php $component->withName('form-fields.select'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['name' => 'feature','margin-top' => 'mt-0','customClass' => 'select2 pos_customer_selectbox','label' => ''.e(__('Select Customer')).'','col' => '6']); ?>
                        <?php $__currentLoopData = $all_customers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $customer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($customer->id); ?>"><?php echo e($customer->name); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>


                <div class="col-md-12">
                    <table class="table table-bordered pos_cart_table" style="width: 100%">
                        <thead class="text-white" style="background-color: #625a91">
                        <td class="text-center"><strong><?php echo e(__('SL#')); ?></strong></td>
                        <td class="text-center"><strong><?php echo e(__('Product Name')); ?></strong></td>
                        <td class="text-center"><strong><?php echo e(__('Unit Price')); ?></strong></td>
                        <td class="text-center"><strong><?php echo e(__('Qty')); ?></strong></td>
                        <td class="text-center"><strong><?php echo e(__('Total')); ?></strong></td>
                        <td class="text-center"><strong><?php echo e(__('Action')); ?></strong></td>
                        </thead>
                        <tbody class="pos_cart_body">
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
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                          <?php echo $__env->make('backend.pos.partials.pos-cart-footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </table>
                </div>
            </div>
        </form>
    </div>
</div><?php /**PATH H:\xampp\htdocs\inventory-crm\@core\resources\views/backend/pos/partials/pos-left-section.blade.php ENDPATH**/ ?>