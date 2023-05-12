
    <div class="modal fade" id="order_status_modal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-info ">
                    <h5 class="modal-title text-light"><?php echo e(__('Change Status')); ?></h5>
                    <a href="" class="close text-light" data-dismiss="modal"><span>×</span></a>
                </div>
                <form action="<?php echo e(route('admin.order.change.status')); ?>" method="post" enctype="multipart/form-data" class="order_status_form">
                    <div class="modal-body">
                        <?php echo csrf_field(); ?>

                        <input type="hidden" name="order_id" class="order_id">

                        <div class="form-group mt-3">
                       <label for="edit_status"><?php echo e(__('Order Status')); ?></label>
                            <select name="status" class="form-control status">
                                <option value="pending"><?php echo e(__('Pending')); ?></option>
                                <option value="complete"><?php echo e(__('Complete')); ?></option>
                                <option value="draft"><?php echo e(__('Draft')); ?></option>
                            </select>
                        </div>

                        <div class="form-group mt-3">
                            <label for="edit_status"><?php echo e(__('Payment Status')); ?></label>
                            <select name="payment_status" class="form-control payment_status">
                                <option value="pending"><?php echo e(__('Pending')); ?></option>
                                <option value="complete"><?php echo e(__('Complete')); ?></option>
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
<?php /**PATH H:\xampp\htdocs\inventory-crm\@core\resources\views/backend/popup-modals/others/order-status.blade.php ENDPATH**/ ?>