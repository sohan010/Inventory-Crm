
    <div class="modal fade" id="product_coupon_edit_modal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-info">
                    <h4 class="modal-title text-white"><?php echo e(__('Edit Category Item')); ?></h4>
                    <button type="button" class="close text-white" data-dismiss="modal"><span>×</span></button>
                </div>

                <form action="#" id="coupon_edit_modal_form" method="post" enctype="multipart/form-data">
                    <div class="modal-body">
                        <?php echo csrf_field(); ?>

                        <input type="hidden" name="id" class="coupon_id" value="">

                        <label for="edit_name"><?php echo e(__('Title')); ?></label>
                        <div class="input-group">
                            <div class="input-group-addon"><i class="ti-file"></i></div>
                            <input type="text" class="form-control edit_title" name="title" placeholder="<?php echo e(__('Title')); ?>">
                        </div>

                        <div class="main my-3">
                            <label for="edit_name"><?php echo e(__('Code')); ?></label>
                            <div class="input-group">
                                <div class="input-group-addon"><i class="ti-settings"></i></div>
                                <input type="text" class="form-control edit_code" name="code" placeholder="<?php echo e(__('Code')); ?>">
                            </div>
                        </div>

                        <label for="edit_name"><?php echo e(__('Discount Amount')); ?></label>
                        <div class="input-group">
                            <div class="input-group-addon"><i class="ti-money"></i></div>
                            <input type="number" min="1" class="form-control edit_discount_amount" name="discount_amount" placeholder="<?php echo e(__('Discount Amount')); ?>">
                        </div>

                        <div class="form-group my-3">
                            <label for="edit_status"><?php echo e(__('Discount Type')); ?></label>
                            <select name="discount_type" class="form-control edit_discount_type">
                                <option value="flat"><?php echo e(__('Flat')); ?></option>
                                <option value="percentage"><?php echo e(__('Percentage')); ?></option>
                            </select>
                        </div>

                        <label for="edit_name"><?php echo e(__('Maximum Use Quantity')); ?></label>
                        <div class="input-group">
                            <div class="input-group-addon"><i class="ti-shield"></i></div>
                            <input type="number" min="1" class="form-control edit_max_use_qty" name="max_use_qty" placeholder="<?php echo e(__('Maximum Use Quantity')); ?>">
                        </div>

                        <div class="main my-3">
                            <label for="edit_name"><?php echo e(__('Expire Date')); ?></label>
                            <div class="input-group">
                                <div class="input-group-addon"><i class="ti-alarm-clock"></i></div>
                                <input type="date" class="form-control edit_expire_date expire_date" name="expire_date" placeholder="<?php echo e(__('Expire Date')); ?>">
                            </div>
                        </div>

                        <div class="form-group my-3">
                            <label for="edit_status"><?php echo e(__('Status')); ?></label>
                            <select name="status" class="form-control edit_status">
                                <option value="1"><?php echo e(__('Publish')); ?></option>
                                <option value="0"><?php echo e(__('Draft')); ?></option>
                            </select>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo e(__('Close')); ?></button>
                        <button id="update" type="submit" class="btn btn-info"><?php echo e(__('Save Changes')); ?></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php /**PATH H:\xampp\htdocs\inventory-crm\@core\resources\views/backend/popup-modals/product/coupon/edit.blade.php ENDPATH**/ ?>