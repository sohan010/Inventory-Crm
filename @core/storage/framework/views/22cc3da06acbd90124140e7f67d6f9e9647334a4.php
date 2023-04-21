<?php
    $multiple = isset($multiple) ? 'multiple' : '';
?>

<div class="form-group col-lg-<?php echo e($col ?? '4'); ?> <?php echo e($marginTop ?? 'mt-3'); ?> <?php echo e($groupClass ?? ''); ?>">
    <label for="role"><?php echo e($label ?? ''); ?></label>
    <select name="<?php echo e($name); ?>" class="form-control <?php echo e($customClass ?? ''); ?>" <?php echo e($multiple); ?> >
         <?php echo e($slot ?? ''); ?>

    </select>
</div>
<?php /**PATH H:\xampp\htdocs\inventory-crm\@core\resources\views/components/form-fields/select.blade.php ENDPATH**/ ?>