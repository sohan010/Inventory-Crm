
    <div class="modal fade" id="cart_pos_discount_modal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-info">
                    <h5 class="modal-title text-white"><?php echo e(__('Discount Section')); ?></h5>
                    <a href="#" type="button" class="close text-white" data-dismiss="modal"><span>×</span></a>
                </div>
                <form action="<?php echo e(route('admin.product.cart.pos.discount.store')); ?>" method="post" enctype="multipart/form-data" class="cart_discount_form">
                    <div class="modal-body">
                        <?php echo csrf_field(); ?>
                        <input type="hidden" name="subtotal_amount" class="subtotal_amount" value="">

                        <div class="error-container"></div>

                        <div class="row">
                            <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.form-fields.select','data' => ['name' => 'discount_type','label' => ''.e(__('Discount Type')).'','col' => '12','marginTop' => 'mt-0 mb-3','customClass' => 'discount_type']]); ?>
<?php $component->withName('form-fields.select'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['name' => 'discount_type','label' => ''.e(__('Discount Type')).'','col' => '12','marginTop' => 'mt-0 mb-3','customClass' => 'discount_type']); ?>
                                <option value="none"><?php echo e(__('None')); ?></option>
                                <option value="flat"><?php echo e(__('Flat')); ?></option>
                                <option value="percentage"><?php echo e(__('Percentage')); ?></option>
                             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>

                            <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.form-fields.number','data' => ['label' => 'Amount','name' => 'discount_amount','class' => 'discount_amount','icon' => 'money','col' => '12']]); ?>
<?php $component->withName('form-fields.number'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['label' => 'Amount','name' => 'discount_amount','class' => 'discount_amount','icon' => 'money','col' => '12']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary discount_modal_close_button" data-dismiss="modal"><?php echo e(__('Close')); ?></button>
                            <button id="submit" type="submit" class="btn btn-info cart_discount_form_submit_button"><?php echo e(__('Submit')); ?></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php /**PATH H:\xampp\htdocs\inventory-crm\@core\resources\views/backend/popup-modals/pos/discount.blade.php ENDPATH**/ ?>