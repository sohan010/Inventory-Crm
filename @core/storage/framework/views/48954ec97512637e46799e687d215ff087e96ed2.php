<?php if($status === 'draft'): ?>
    <span class="p-2 badge badge-warning px-2 py-1" ><?php echo e(__('Draft')); ?></span>
<?php elseif($status === 'archive'): ?>
    <span class="p-2 badge badge-warning" ><?php echo e(__('Archive')); ?></span>
<?php elseif($status === 'banned'): ?>
    <span class="p-2 badge badge-danger" ><?php echo e(__('Banned')); ?></span>
<?php elseif($status === 'pending'): ?>
    <span class="p-2 badge badge-warning" ><?php echo e(__('Pending')); ?></span>
<?php elseif($status === 'complete'): ?>
    <span class="p-2 badge badge-primary" ><?php echo e(__('Complete')); ?></span>
<?php elseif($status === 'close'): ?>
    <span class="p-2 badge badge-danger" ><?php echo e(__('Close')); ?></span>
<?php elseif($status === 'in_progress'): ?>
    <span class="p-2 badge badge-info" ><?php echo e(__('In Progress')); ?></span>
<?php elseif($status === 'publish'): ?>
    <span class="p-2 badge badge-primary px-2 py-1" ><?php echo e(__('Published')); ?></span>
<?php elseif($status === 'approved'): ?>
    <span class="p-2 badge badge-success" ><?php echo e(__('Approved')); ?></span>
<?php elseif($status === 'confirm'): ?>
    <span class="p-2 badge badge-success" ><?php echo e(__('Confirm')); ?></span>
<?php elseif($status === 'yes'): ?>
    <span class="p-2 badge badge-success" ><?php echo e(__('Yes')); ?></span>
<?php elseif($status === 'no'): ?>
    <span class="p-2 badge badge-danger" ><?php echo e(__('No')); ?></span>
<?php elseif($status === 'cancel'): ?>
    <span class="p-2 badge badge-danger" ><?php echo e(__('Cancel')); ?></span>
<?php elseif($status === 'due'): ?>
    <span class="p-2 badge badge-danger" ><?php echo e(__('Due')); ?></span>
<?php elseif($status === 'pending'): ?>
    <span class="p-2 badge badge-warning" ><?php echo e(__('Pending')); ?></span>
<?php elseif($status == 1): ?>
    <span class="p-2 badge badge-info" ><?php echo e(__('Active')); ?></span>
<?php elseif($status == 0): ?>
    <span class="p-2 badge badge-danger" ><?php echo e(__('Inactive')); ?></span>
<?php endif; ?><?php /**PATH H:\xampp\htdocs\inventory-crm\@core\resources\views/components/status-span.blade.php ENDPATH**/ ?>