
<div class="modal fade" id="user_change_password_modal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><?php echo e(__('Change Admin Password')); ?></h5>
                <button type="button" class="close" data-dismiss="modal"><span>×</span></button>
            </div>
            <?php echo $__env->make('backend/partials/error', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <form action="<?php echo e(route('admin.user.password.change')); ?>" id="user_password_change_modal_form" method="post" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <div class="modal-body">
                    <input type="hidden" name="ch_user_id" id="ch_user_id">
                    <div class="form-group">
                        <label for="password"><?php echo e(__('Password')); ?></label>
                        <input type="password" class="form-control" name="password" placeholder="<?php echo e(__('Enter Password')); ?>">
                    </div>
                    <div class="form-group">
                        <label for="password_confirmation"><?php echo e(__('Confirm Password')); ?></label>
                        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="<?php echo e(__('Confirm Password')); ?>">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo e(__('Close')); ?></button>
                    <button type="submit" class="btn btn-primary"><?php echo e(__('Change Password')); ?></button>
                </div>
            </form>
        </div>
    </div>
</div><?php /**PATH H:\xampp\htdocs\inventory-crm\@core\resources\views/backend/popup-modals/admin/change-password.blade.php ENDPATH**/ ?>