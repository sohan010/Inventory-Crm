
    <div class="modal fade" id="cart_payable_modal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-info">
                    <h5 class="modal-title text-white"><?php echo e(__('Payable Amount')); ?></h5>
                    <a href="#" type="button" class="close text-white" data-dismiss="modal"><span>×</span></a>
                </div>
                <form action="<?php echo e(route('admin.product.cart.pos.payable.store')); ?>" method="post" enctype="multipart/form-data" class="cart_payable_form">
                    <div class="modal-body">
                        <?php echo csrf_field(); ?>
                        <input type="hidden" name="subtotal_amount" class="subtotal_amount" value="<?php echo e($virtual_cart_toal_amount); ?>">

                        <div class="error-container"></div>

                        <div class="row">
                            <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.form-fields.number','data' => ['label' => 'Amount','name' => 'payable_amount','class' => 'payable_amount','icon' => 'money','col' => '12','placeholder' => ''.e(__('Enter Amount')).'']]); ?>
<?php $component->withName('form-fields.number'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['label' => 'Amount','name' => 'payable_amount','class' => 'payable_amount','icon' => 'money','col' => '12','placeholder' => ''.e(__('Enter Amount')).'']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>

                           <div class="col-lg-12">
                               <a class="btn btn-danger btn-xs my-2 py-2 px-2 text-white payable_none_btn" href=""
                                  data-toggle="tooltip" title="<?php echo e(__('Click to make full due ')); ?>" data-payable_none="0"><?php echo e(__('Full Due')); ?>

                               </a>
                               <a class="btn btn-primary btn-xs my-2 py-2 px-2 text-white payable_full_amount_btn" href=""
                                  data-toggle="tooltip" title="<?php echo e(__('Click to add as grand total ')); ?>"><?php echo e(__('Full Paid')); ?>

                               </a>
                           </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary payable_modal_close_button" data-dismiss="modal"><?php echo e(__('Close')); ?></button>
                            <button id="submit" type="submit" class="btn btn-info cart_shipping_form_submit_button"><?php echo e(__('Submit')); ?></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php /**PATH H:\xampp\htdocs\inventory-crm\@core\resources\views/backend/popup-modals/pos/payable.blade.php ENDPATH**/ ?>