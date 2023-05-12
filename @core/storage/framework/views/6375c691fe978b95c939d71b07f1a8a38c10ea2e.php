

<?php $__env->startSection('site-title'); ?>
    <?php echo e(__('Invoice')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Invoice')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <div class="row">
        <div class="col-md-12">
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
            <div class="card-header">
                <div class="d-flex justify-content-between">
                    <div class="left">
                        <h3 class="card-title"><?php echo e(__('Invoice')); ?></h3>
                    </div>
                    <div class="righ">
                        <a href="<?php echo e(route('admin.order')); ?>" class="btn btn-info text-white"><?php echo e(__('All Orders')); ?></a>
                    </div>
                </div>
            </div>
            <div class="card card-body printableArea">


                <h3><b><?php echo e(__('INVOICE')); ?></b> <span class="pull-right">#<?php echo e($order->id); ?></span></h3>

                <hr>
                <div class="row">
                    <div class="col-md-12">
                        <div class="pull-left">
                            <address>
                                <h3> &nbsp;<b class="text-danger"><?php echo e(get_static_option('company_name')); ?></b></h3>
                                <p class="text-muted m-l-5"><?php echo e(get_static_option('company_address')); ?></p>
                                <p class="text-muted m-l-5"><?php echo e(get_static_option('company_email')); ?></p>
                                <p class="text-muted m-l-5"><?php echo e(get_static_option('company_phone')); ?></p>
                            </address>
                        </div>


                        <div class="pull-right text-right">

                            <address>
                                <h3>To,</h3>
                                <h4 class="font-bold"><?php echo e($order->customer?->name); ?>,</h4>
                                <p class="text-muted m-l-30"><?php echo e($order->customer?->address); ?></p>
                                <p class="m-t-30"><b><?php echo e(__('Date')); ?> :</b> <?php echo e($order->bill_date); ?></p>
                            </address>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="table-responsive m-t-40" style="clear: both;">
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th class="text-center">#</th>
                                    <th>Description</th>
                                    <th class="text-right">Unit Cost</th>
                                    <th class="text-right">Quantity</th>
                                    <th class="text-right">Total</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $__currentLoopData = $order->order_details ?? []; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $detail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td class="text-center"><?php echo e($loop->iteration); ?></td>
                                        <td><?php echo e($detail->product?->product_name); ?></td>
                                        <td class="text-right"> <?php echo e(amount_with_currency_symbol($detail->product?->sale_price)); ?> </td>
                                        <td class="text-right"><?php echo e($detail->single_quantity); ?> </td>
                                        <td class="text-right"> <?php echo e($detail->product?->sale_price * $detail->single_quantity); ?> </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="pull-right m-t-30 text-right">

                            <p style="font-size: 17px; font-weight: bold"> Subtotal: <?php echo e(amount_with_currency_symbol($detail->subtotal)); ?></p>
                            <p>Discount <?php echo e($detail->discount_type == 'percentage' ? amount_with_percentage($detail->discount_percentage) : ''); ?> : - <?php echo e(amount_with_currency_symbol($detail->discount_amount)); ?> </p>
                            <p>Coupon <?php echo e($detail->coupon_discount_type == 'percentage' ? amount_with_percentage($detail->coupon_percentage) : ''); ?> : - <?php echo e(amount_with_currency_symbol($detail->coupon_discount)); ?> </p>
                            <p>Vat <?php echo e(amount_with_percentage($detail->vat_percentage)); ?> : + <?php echo e(amount_with_currency_symbol($detail->vat_amount)); ?> </p>
                            <p>Shipping  : + <?php echo e(amount_with_currency_symbol($detail->shipping_amount)); ?></p>
                            <hr>
                            <h3><b>Total :</b> <?php echo e(amount_with_currency_symbol($detail->total_amount)); ?></h3>
                            <h4 class="text-primary"><b>Paid :</b> <?php echo e(amount_with_currency_symbol($detail->payable_amount)); ?></h4>
                            <h4 class="text-danger"><b>Due :</b> <?php echo e(amount_with_currency_symbol($detail->due_amount)); ?></h4>
                        </div>
                        <div class="clearfix"></div>

                    </div>
                </div>
            </div>
            <div class="text-right">
                <button id="print" class="btn btn-outline-primary" type="button"> <span><i class="fa fa-print"></i> <?php echo e(__('Print or Save')); ?></span> </button>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <script src="<?php echo e(asset('assets/backend/js/jquery.PrintArea.js')); ?>" type="text/JavaScript"></script>

    <script>
        $(document).ready(function() {

            $('.go_back_btn').removeClass('d-none');

            $("#print").click(function() {

                $('.go_back_btn').addClass('d-none');

                var mode = 'iframe'; //popup
                var close = mode == "popup";
                var options = {
                    mode: mode,
                    popClose: close,
                };

                $("div.printableArea").printArea(options);


            });




        });
    </script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('backend.admin-master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH H:\xampp\htdocs\inventory-crm\@core\resources\views/backend/invoice/order.blade.php ENDPATH**/ ?>