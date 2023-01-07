<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('product-color-edit')): ?>
    <div class="modal fade" id="color_item_edit_modal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><?php echo e(__('Edit Color Item')); ?></h5>
                    <button type="button" class="close" data-dismiss="modal"><span>×</span></button>
                </div>

                <form action="#" id="color_edit_modal_form" method="post"
                      enctype="multipart/form-data">
                    <div class="modal-body">
                        <?php echo csrf_field(); ?>

                        <input type="hidden" name="id" id="color_id" value="">

                        <label for="edit_name"><?php echo e(__('Name')); ?></label>
                        <div class="input-group">
                            <div class="input-group-addon"><i class="ti-user"></i></div>
                            <input type="text" class="form-control" id="edit_name" name="name" placeholder="<?php echo e(__('Name')); ?>">
                        </div>


                        <div class="parent my-3">
                            <label for="edit_name mt-3"><?php echo e(__('Color Code')); ?></label>
                            <div class="input-group">
                                <div class="input-group-addon"><i class="ti-settings"></i></div>
                                <input type="text" name="color_code" class="form-control" value="" id="edit_color_code">
                            </div>
                        </div>


                        <div class="form-group mt-3">
                            <label for="edit_status"><?php echo e(__('Status')); ?></label>
                            <select name="status" class="form-control" id="edit_status">
                                <option value="1"><?php echo e(__('Publish')); ?></option>
                                <option value="0"><?php echo e(__('Draft')); ?></option>
                            </select>
                        </div>

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
<?php endif; ?><?php /**PATH H:\xampp\htdocs\inventory-crm\@core\resources\views/backend/popup-modals/color/edit.blade.php ENDPATH**/ ?>