<?php $__env->startSection('content'); ?>

    <section id="wrapper">
        <div class="login-register" style="background-image:url('<?php echo e(asset('assets/backend/assets/images/background/login-register.jpg')); ?>');">
            <div class="login-box card">

                <div class="card-body">
                    <h2 class="card-title text-center text-uppercase text-primary mb-4"> <strong><?php echo e(get_static_option('site_title')); ?></strong> </h2>
                    <form method="POST" action="<?php echo e(route('admin.login')); ?>"  id="loginform">
                        <?php echo csrf_field(); ?>
                        <h3 class="box-title m-b-20">Sign In</h3>
                        <div class="error-message"></div>
                        <div class="form-group">
                            <div class="col-xs-12">
                                <input class="form-control" id="username" name="username" type="text" required="" placeholder="Username"> </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-12">
                                <input class="form-control" id="password" name="password" type="password" required="" placeholder="Password"> </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12 font-14">
                                <div class="checkbox checkbox-primary pull-left p-t-0">
                                    <input id="checkbox-signup" type="checkbox">
                                    <label for="checkbox-signup"> Remember me </label>
                                </div> <a href="<?php echo e(route('admin.forget.password')); ?>" id="to-recover" class="text-dark pull-right"><!-- <i class="fa fa-lock m-r-5"></i> --> Forgot pwd?</a> </div>
                        </div>
                        <div class="form-group text-center m-t-20">
                            <div class="col-xs-12">
                                <button id="form_submit" class="btn btn-info btn-lg btn-block text-uppercase waves-effect waves-light" type="submit">Log In</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>



<?php $__env->stopSection(); ?>


<?php $__env->startSection('scripts'); ?>
    <script>
        (function($){
        "use strict";

            $(document).ready(function ($){

                $(document).on('click','#form_submit',function (e){
                    e.preventDefault();
                    var el = $(this);
                    var erContainer = $(".error-message");
                    erContainer.html('');
                    el.text('<?php echo e(__('Please Wait..')); ?>');
                    $.ajax({
                        url: "<?php echo e(route('admin.login')); ?>",
                        type: "POST",
                        data: {
                            _token : "<?php echo e(csrf_token()); ?>",
                            username : $('#username').val(),
                            password : $('#password').val(),
                            remember : $('#remember').val(),
                        },
                        error:function(data){
                            var errors = data.responseJSON;
                            erContainer.html('<div class="alert alert-danger"></div>');
                            $.each(errors.errors, function(index,value){
                                erContainer.find('.alert.alert-danger').append('<p>'+value+'</p>');
                            });
                            el.text('<?php echo e(__('Login')); ?>');
                        },
                        success:function (data){
                            $('.alert.alert-danger').remove();
                            if (data.status == 'ok'){
                                el.text('<?php echo e(__('Redirecting')); ?>..');
                                erContainer.html('<div class="alert alert-'+data.type+'">'+data.msg+'</div>');
                                location.reload();
                            }else{
                                erContainer.html('<div class="alert alert-'+data.type+'">'+data.msg+'</div>');
                                el.text('<?php echo e(__('Login')); ?>');
                            }
                        }
                    });
                });

            });
        })(jQuery);
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.login-screens', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH H:\xampp\htdocs\inventory-crm\@core\resources\views/auth/admin/login.blade.php ENDPATH**/ ?>