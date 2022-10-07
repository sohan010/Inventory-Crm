
<div class="col-lg-<?php echo e($col ?? '4'); ?>">
    <label for="name"><?php echo e($label); ?></label>
    <div class="input-group">
        <div class="input-group-addon"><i class="ti-<?php echo e($icon ?? 'user'); ?>"></i></div>
        <input type="password" class="form-control <?php echo e($class ?? ''); ?>" name="<?php echo e($name); ?>" placeholder="<?php echo e($placeholder ?? 'Enter Password'); ?>">
    </div>
</div>

<?php /**PATH H:\xampp\htdocs\inventory-crm\@core\resources\views/components/form-fields/password.blade.php ENDPATH**/ ?>