
    <div class="modal fade" id="cart_vat_tax_modal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-info">
                    <h5 class="modal-title text-white"><?php echo e(__('Vat/Tax Section')); ?></h5>
                    <a href="#" type="button" class="close text-white" data-dismiss="modal"><span>×</span></a>
                </div>
                <form action="<?php echo e(route('admin.product.cart.pos.vat.tax.store')); ?>" method="post" enctype="multipart/form-data" class="vat_tax_form">
                    <div class="modal-body">
                        <?php echo csrf_field(); ?>
                        <input type="hidden" name="subtotal_amount" class="subtotal_amount">

                        <div class="error-container"></div>

                        <div class="row">
                            <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.form-fields.select','data' => ['name' => 'vat_tax','label' => ''.e(__('Select Tax')).'','col' => '12','marginTop' => 'mt-0 mb-3','customClass' => 'vat_tax']]); ?>
<?php $component->withName('form-fields.select'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['name' => 'vat_tax','label' => ''.e(__('Select Tax')).'','col' => '12','marginTop' => 'mt-0 mb-3','customClass' => 'vat_tax']); ?>
                                <option value="0" selected><?php echo e(__('None')); ?></option>
                                <option value="5"><?php echo e(__('Vat 5%')); ?></option>
                                <option value="10"><?php echo e(__('Vat 10%')); ?></option>
                                <option value="15"><?php echo e(__('Vat 15%')); ?></option>
                                <option value="20"><?php echo e(__('Vat 20%')); ?></option>
                             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary vat_tax_modal_close_button" data-dismiss="modal"><?php echo e(__('Close')); ?></button>
                            <button id="submit" type="submit" class="btn btn-info cart_vat_tax_submit_button"><?php echo e(__('Submit')); ?></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php /**PATH H:\xampp\htdocs\inventory-crm\@core\resources\views/backend/popup-modals/pos/vat-tax.blade.php ENDPATH**/ ?>