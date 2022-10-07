
<div class="col-lg-<?php echo e($col ?? '4'); ?> <?php echo e($marginTop ?? ''); ?>">
    <label for="name"><?php echo e($label); ?></label>
    <div class="input-group">
        <div class="input-group-addon"><i class="ti-<?php echo e($icon ?? 'user'); ?>"></i></div>
        <input type="email" class="form-control <?php echo e($class ?? ''); ?>" value="<?php echo e($value ?? ''); ?>" name="<?php echo e($name); ?>" placeholder="<?php echo e($placeholder ?? 'Enter Value'); ?>">
    </div>
</div><?php /**PATH H:\xampp\htdocs\inventory-crm\@core\resources\views/components/form-fields/email.blade.php ENDPATH**/ ?>