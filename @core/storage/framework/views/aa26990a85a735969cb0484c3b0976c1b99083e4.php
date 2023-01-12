<div class="col-lg-<?php echo e($col ?? '12'); ?> <?php echo e($class ?? ''); ?>">
    <div class="form-group">
        <label><?php echo e($label); ?></label>
        <textarea name="<?php echo e($name); ?>" class="form-control <?php echo e($innerClass ?? ''); ?>" rows="5" cols="5" placeholder="<?php echo e($label); ?>" style="height:<?php echo e($height ?? '100px'); ?>"><?php echo e($value ?? ''); ?></textarea>
        <?php if(isset($info)): ?>
            <small class="info-text d-block mt-2"><?php echo $info; ?></small>
        <?php endif; ?>
    </div>
</div>
<?php /**PATH H:\xampp\htdocs\inventory-crm\@core\resources\views/components/form-fields/text-area.blade.php ENDPATH**/ ?>