<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('product-category-create')): ?>
    <div class="modal fade" id="new_product_category" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><?php echo e(__('New Category Item')); ?></h5>
                    <button type="button" class="close" data-dismiss="modal"><span>×</span></button>
                </div>
                <form action="<?php echo e(route('admin.product.subcategory')); ?>" method="post" enctype="multipart/form-data">
                    <div class="modal-body">
                        <?php echo csrf_field(); ?>

                        <label for="edit_name"><?php echo e(__('Name')); ?></label>
                        <div class="input-group">
                            <div class="input-group-addon"><i class="ti-user"></i></div>
                            <input type="text" class="form-control" name="name" placeholder="<?php echo e(__('Name')); ?>">
                        </div>

                        <div class="form-group mt-3">
                            <label for="edit_status"><?php echo e(__('Category')); ?></label>
                            <select name="product_category_id" class="form-control" id="edit_status">
                                <?php $__currentLoopData = $all_categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($category->id); ?>"><?php echo e($category->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>

                        <div class="form-group mt-3">
                       <label for="edit_status"><?php echo e(__('Status')); ?></label>
                            <select name="status" class="form-control">
                                <option value="publish"><?php echo e(__('Publish')); ?></option>
                                <option value="draft"><?php echo e(__('Draft')); ?></option>
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
<?php endif; ?><?php /**PATH H:\xampp\htdocs\inventory-crm\@core\resources\views/backend/popup-modals/product/subcategory/add.blade.php ENDPATH**/ ?>