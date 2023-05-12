<?php $__env->startSection('site-title'); ?>
    <?php echo e(__('Company Settings')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Company Settings')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="col-lg-12 col-ml-12 padding-bottom-30">
        <div class="row">
            <div class="col-12 mt-5">
                <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.msg.success','data' => []]); ?>
<?php $component->withName('msg.success'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.msg.error','data' => []]); ?>
<?php $component->withName('msg.error'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                <div class="card">
                    <div class="card-header">
                        <h4 class="header-title"><?php echo e(__("Company Settings")); ?></h4>
                    </div>
                    <div class="card-body">

                        <form action="<?php echo e(route('admin.general.company.settings')); ?>" method="POST" enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>


                            <div class="form-group">
                                <label for="site_meta_tags"><?php echo e(__('Company Name')); ?></label>
                                <input type="text" name="company_name"  class="form-control" value="<?php echo e(get_static_option('company_name')); ?>">
                            </div>

                            <div class="form-group">
                                <label for="site_meta_tags"><?php echo e(__('Company Address')); ?></label>
                                <input type="text" name="company_address"  class="form-control" value="<?php echo e(get_static_option('company_address')); ?>" id="site_meta_tags">
                            </div>

                            <div class="form-group">
                                <label for="site_meta_tags"><?php echo e(__('Company Email')); ?></label>
                                <input type="text" name="company_email"  class="form-control" value="<?php echo e(get_static_option('company_email')); ?>" id="site_meta_tags">
                            </div>

                            <div class="form-group">
                                <label for="site_meta_tags"><?php echo e(__('Company Phone')); ?></label>
                                <input type="text" name="company_phone"  class="form-control" value="<?php echo e(get_static_option('company_phone')); ?>" id="site_meta_tags">
                            </div>



                            <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4"><?php echo e(__('Update Changes')); ?></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('backend.admin-master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH H:\xampp\htdocs\inventory-crm\@core\resources\views/backend/general-settings/company.blade.php ENDPATH**/ ?>