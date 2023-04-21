
    <div class="modal fade" id="cart_coupon_modal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-info">
                    <h5 class="modal-title text-white"><?php echo e(__('Coupon Section')); ?></h5>
                    <a href="#" type="button" class="close text-white" data-dismiss="modal"><span>×</span></a>
                </div>
                <form action="<?php echo e(route('admin.cart.pos.coupon.discount.store')); ?>" method="post" enctype="multipart/form-data" class="cart_coupon_form">
                    <div class="modal-body">
                        <?php echo csrf_field(); ?>
                        <input type="hidden" name="subtotal_amount" class="subtotal_amount" value="">

                        <div class="error-container"></div>

                        <div class="row">

                            <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.form-fields.text','data' => ['label' => 'Code','name' => 'code','innerClass' => 'coupon_code','icon' => 'money','col' => '12']]); ?>
<?php $component->withName('form-fields.text'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['label' => 'Code','name' => 'code','innerClass' => 'coupon_code','icon' => 'money','col' => '12']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>

                            <?php
                                $all_coupons = \App\Coupon::select('id','discount_amount','discount_type','code')->get();
                                $colors = ['info','primary','dark'];
                            ?>
                            <div class="form-group my-3 col-lg-12 available_coupon_group">
                                <?php $__currentLoopData = $all_coupons; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $coupon): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <a class="badge badge-<?php echo e($colors[$loop->index % count($colors)]); ?> py-2 px-2" href=""
                                       data-toggle="tooltip" title="<?php echo e(__('Click to Add ')); ?>" data-coupon_code="<?php echo e($coupon->code); ?>"><?php echo e($coupon->code); ?>

                                    </a>

                                     <?php if($loop->last): ?>
                                        <a class="badge badge-danger ml-2 py-2 px-2 text-white" href=""
                                           data-toggle="tooltip" title="<?php echo e(__('Click to Add ')); ?>" data-coupon_code="none"><?php echo e(__('None')); ?>

                                        </a>
                                    <?php endif; ?>


                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </div>


                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary cart_coupon_submit_cancel_btn" data-dismiss="modal"><?php echo e(__('Close')); ?></button>
                            <button id="submit" type="submit" class="btn btn-info cart_coupon_submit_btn"><?php echo e(__('Submit')); ?></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php /**PATH H:\xampp\htdocs\inventory-crm\@core\resources\views/backend/popup-modals/pos/coupon.blade.php ENDPATH**/ ?>