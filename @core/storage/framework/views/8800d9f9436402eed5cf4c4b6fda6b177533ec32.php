
<div class="col-lg-<?php echo e($col ?? '4'); ?> <?php echo e($class ?? ''); ?>">
    <label for="name"><?php echo e($label ?? 'Title'); ?></label>
    <div class="input-group">
        <div class="input-group-addon"><i class="ti-<?php echo e($icon ?? 'user'); ?>"></i></div>
        <input type="text" class="form-control" value="<?php echo e($value ?? ''); ?>" name="<?php echo e($name); ?>" placeholder="<?php echo e($placeholder ?? 'Enter Value'); ?>">
    </div>
    <small class="text-info"><?php echo e($notice ?? ''); ?></small>
</div><?php /**PATH H:\xampp\htdocs\inventory-crm\@core\resources\views/components/form-fields/text.blade.php ENDPATH**/ ?>