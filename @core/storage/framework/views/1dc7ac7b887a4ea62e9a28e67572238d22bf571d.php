<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('product-brand-edit')): ?>
    <div class="modal fade" id="product_brand_item_edit_modal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><?php echo e(__('Edit Brand Item')); ?></h5>
                    <button type="button" class="close" data-dismiss="modal"><span>×</span></button>
                </div>
                <form action="#" id="product_brand_edit_modal_form" method="post"
                      enctype="multipart/form-data">
                    <div class="modal-body">
                        <?php echo csrf_field(); ?>
                        <input type="hidden" name="id" id="product_brand_id" value="">

                       <label for="edit_name"><?php echo e(__('Name')); ?></label>
                        <div class="input-group">
                            <div class="input-group-addon"><i class="ti-user"></i></div>
                            <input type="text" class="form-control" id="edit_name" name="name" placeholder="<?php echo e(__('Name')); ?>">
                        </div>

                        <div class="form-group mt-3">
                            <label for="edit_status"><?php echo e(__('Status')); ?></label>
                            <select name="status" class="form-control" id="edit_status">
                                <option value="publish"><?php echo e(__('Publish')); ?></option>
                                <option value="draft"><?php echo e(__('Draft')); ?></option>
                            </select>
                        </div>

                        <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.form-fields.form-image','data' => ['label' => ''.e(__('Image')).'','name' => 'image','value' => '']]); ?>
<?php $component->withName('form-fields.form-image'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['label' => ''.e(__('Image')).'','name' => 'image','value' => '']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary"
                                data-dismiss="modal"><?php echo e(__('Close')); ?></button>
                        <button id="update" type="submit" class="btn btn-primary"><?php echo e(__('Save Changes')); ?></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php endif; ?><?php /**PATH H:\xampp\htdocs\inventory-crm\@core\resources\views/backend/popup-modals/product/brand/edit.blade.php ENDPATH**/ ?>