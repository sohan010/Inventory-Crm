<?php $__env->startSection('site-title'); ?>
    <?php echo e(__('Order Details')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Order Details')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('style'); ?>
    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.media.css','data' => []]); ?>
<?php $component->withName('media.css'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
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
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between">
                            <div class="left">
                                <h3 class="card-title"><?php echo e(__('Orders Details')); ?></h3>
                            </div>
                            <div class="righ">
                                <a href="<?php echo e(route('admin.order')); ?>" class="btn btn-info text-white"><?php echo e(__('All Orders')); ?></a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="table-responsive product_list_table">
                                    <h2 class="card-title text-center mb-3"><?php echo e(__('Basic Order Details')); ?></h2>
                                    <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                        <tr>
                                            <th><?php echo e(__('ID')); ?></th>
                                            <th><?php echo e(__('Customer Name')); ?></th>
                                            <th><?php echo e(__('Payment Gateway')); ?></th>
                                            <th><?php echo e(__('Order Status')); ?></th>
                                            <th><?php echo e(__('Payment Status')); ?></th>
                                            <th><?php echo e(__('Order Date')); ?></th>
                                            <?php if(!empty($order->manual_payment_attachment)): ?>
                                             <th><?php echo e(__('Bank Document')); ?></th>
                                             <?php endif; ?>
                                            <?php if(!empty($order->cheque_number)): ?>
                                                <th><?php echo e(__('Cheque Number')); ?></th>
                                            <?php endif; ?>
                                        </tr>
                                        </thead>

                                        <tbody>

                                            <tr>
                                                <td><?php echo e($order->id); ?></td>
                                                <td><?php echo e($order->customer?->name); ?></td>
                                                <td><?php echo e(str_replace('_',' ',ucfirst($order->payment_gateway))); ?></td>

                                                <td><?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.status-span','data' => ['status' => ''.e($order->status).'']]); ?>
<?php $component->withName('status-span'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['status' => ''.e($order->status).'']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?></td>
                                                <td><?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.status-span','data' => ['status' => ''.e($order->payment_status).'']]); ?>
<?php $component->withName('status-span'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['status' => ''.e($order->payment_status).'']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?></td>
                                                <td><?php echo e(date('d-m-Y',strtotime($order->created_at))); ?></td>

                                                <?php if(!empty($order->manual_payment_attachment)): ?>
                                                <td>
                                                    <a class="btn btn-info btn-xs" href="<?php echo e(url('assets/uploads/custom-files/'.$order->manual_payment_attachment)); ?>" target="_blank"><?php echo e(__('View Document')); ?></a>
                                                </td>
                                                <?php endif; ?>

                                                <?php if(!empty($order->cheque_number)): ?>
                                                    <td>
                                                       <span class="text-info"> <?php echo e($order->cheque_number); ?></span>
                                                        <br>
                                                        <?php echo e(__('Note')); ?> : <?php echo e($order->cheque_payment_note); ?>

                                                    </td>
                                                <?php endif; ?>

                                            </tr>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="col-lg-12 mt-5">
                                   <div class="table-responsive product_list_table">
                                    <h2 class="card-title text-info text-center mb-3" style="color: #625a91"><?php echo e(__('Product Details')); ?></h2>
                                    <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                        <thead class="bg-info">
                                        <tr>
                                            <th><?php echo e(__('SL#')); ?></th>
                                            <th><?php echo e(__('Product Name')); ?></th>
                                            <th class="text-center"><?php echo e(__('Price')); ?></th>
                                            <th class="text-center"><?php echo e(__('Order Qty')); ?></th>
                                            <th class="text-center"><?php echo e(__('Amount')); ?></th>
                                        </tr>
                                        </thead>

                                        <tbody>


                                    <?php $__currentLoopData = $details; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=> $detail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e($key+1); ?></td>
                                            <td><?php echo e($detail->product?->product_name); ?></td>
                                            <td class="text-center"><?php echo e(amount_with_currency_symbol($detail->product?->sale_price)); ?></td>
                                            <td class="text-center"><?php echo e($detail->single_quantity); ?></td>
                                            <td class="text-center"><?php echo e(amount_with_currency_symbol($detail->product?->sale_price * $detail->single_quantity)); ?></td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                        </tbody>

                                        <tfoot>
                                        <tr>
                                            <td style="border-bottom-style: hidden; border-left-style: hidden; border-right-style: hidden" colspan="5"></td>
                                        </tr>
                                            <tr>
                                                <td colspan="4" class="text-right" style="border-bottom-style: hidden; border-left-style: hidden"><strong><?php echo e(__('Subtotal Amount')); ?> : </strong></td>
                                                <td colspan="" class="text-center bg-primary text-light"> <strong><?php echo e(amount_with_currency_symbol($detail->subtotal)); ?></strong></td>
                                            </tr>
                                        <tr>

                                            <td colspan="4" class="text-right" style="border-bottom-style: hidden; border-left-style: hidden"><strong><?php echo e(__('Discount Amount ')); ?> <?php echo e($detail->discount_type == 'percentage' ? amount_with_percentage($detail->discount_percentage) : ''); ?> : </strong></td>
                                            <td colspan="" class="text-center bg-info text-light">
                                                <strong><?php echo e(amount_with_currency_symbol($detail->discount_amount)); ?></strong>
                                            </td>
                                        </tr>

                                            <tr>
                                                <td colspan="4" class="text-right" style="border-bottom-style: hidden; border-left-style: hidden"><strong><?php echo e(__('Coupon Discount')); ?> <?php echo e($detail->coupon_discount_type == 'percentage' ? amount_with_percentage($detail->coupon_percentage) : ''); ?> : </strong></td>
                                                <td colspan="" class="text-center bg-info text-light">
                                                    <strong><?php echo e(amount_with_currency_symbol($detail->coupon_discount)); ?></strong>
                                                </td>
                                            </tr>

                                            <tr>

                                                <td colspan="4" class="text-right" style="border-bottom-style: hidden; border-left-style: hidden"><strong><?php echo e(__('Tax Amount')); ?> <?php echo e(amount_with_percentage($detail->vat_percentage)); ?> : </strong></td>
                                                <td colspan="" class="text-center bg-info text-light">
                                                    <strong><?php echo e(amount_with_currency_symbol($detail->vat_amount)); ?></strong>
                                                </td>
                                            </tr>

                                            <tr>

                                                <td colspan="4" class="text-right" style="border-bottom-style: hidden; border-left-style: hidden"><strong><?php echo e(__('Shipping Amount')); ?> : </strong></td>
                                                <td colspan="" class="text-center bg-info text-light">
                                                    <strong><?php echo e(amount_with_currency_symbol($detail->shipping_amount)); ?></strong>
                                                </td>
                                            </tr>

                                            <tr>

                                                <td colspan="4" class="text-right" style="border-bottom-style: hidden; border-left-style: hidden"><h4 class="text-dark"><?php echo e(__('Grand Total')); ?> : </h4></td>
                                                <td colspan="" class="text-center bg-primary">
                                                   <h4 class="text-light"><?php echo e(amount_with_currency_symbol($detail->total_amount)); ?></h4>
                                                </td>
                                            </tr>

                                        <tr>
                                            <td colspan="4" class="text-right" style="border-bottom-style: hidden; border-left-style: hidden"><h5 class="text-primary"><?php echo e(__('Paid Amount')); ?> : </h5></td>
                                            <td colspan="" class="text-center bg-primary">
                                                <h4 class="text-light"><?php echo e(amount_with_currency_symbol($detail->payable_amount)); ?></h4>
                                            </td>
                                        </tr>

                                        <tr>

                                            <td colspan="4" class="text-right" style="border-bottom-style: hidden; border-left-style: hidden"><h5 class="text-danger"><?php echo e(__('Due Amount')); ?> : </h5></td>
                                            <td colspan="" class="text-center bg-primary">
                                                <h4 class="text-light"><?php echo e(amount_with_currency_symbol($detail->due_amount)); ?></h4>
                                            </td>
                                        </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.admin-master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH H:\xampp\htdocs\inventory-crm\@core\resources\views/backend/order/view-details.blade.php ENDPATH**/ ?>