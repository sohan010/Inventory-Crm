<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('product-category-create')): ?>
    <div class="modal fade" id="new_size_modal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><?php echo e(__('New Unit Item')); ?></h5>
                    <button type="button" class="close" data-dismiss="modal"><span>×</span></button>
                </div>
                <form action="<?php echo e(route('admin.unit')); ?>" method="post" enctype="multipart/form-data">
                    <div class="modal-body">
                        <?php echo csrf_field(); ?>


                        <label for="edit_name"><?php echo e(__('Name')); ?></label>
                        <div class="input-group">
                            <div class="input-group-addon"><i class="ti-user"></i></div>
                            <input type="text" class="form-control" name="name" placeholder="<?php echo e(__('Name')); ?>">
                        </div>


                        <div class="form-group mt-3">
                            <label for="edit_status"><?php echo e(__('Status')); ?></label>
                            <select name="status" class="form-control">
                                <option value="1"><?php echo e(__('Publish')); ?></option>
                                <option value="0"><?php echo e(__('Draft')); ?></option>
                            </select>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary"
                                    data-dismiss="modal"><?php echo e(__('Close')); ?></button>
                            <button id="submit" type="submit" class="btn btn-primary"><?php echo e(__('Submit')); ?></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php endif; ?><?php /**PATH H:\xampp\htdocs\inventory-crm\@core\resources\views/backend/popup-modals/unit/add.blade.php ENDPATH**/ ?>