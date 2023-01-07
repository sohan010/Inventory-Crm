








































































































































































































































<aside class="left-sidebar">
    <div class="scroll-sidebar">
        <div class="user-profile">
            <?php
                $profile_img = get_attachment_image_by_id(auth()->user()->image,null,true);
            ?>
            <div class="profile-img">
                <img src="<?php echo e($profile_img['img_url']); ?>" alt="user" />
                <div class="notify setpos"> <span class="heartbit"></span> <span class="point"></span> </div>
            </div>

            <div class="profile-text">
                <h5><?php echo e(auth()->user()->name); ?></h5>
                <a href="<?php echo e(route('admin.profile.update')); ?>" class="dropdown-toggle u-dropdown" data-toggle="tooltip" title="Edit Profile" aria-haspopup="true" aria-expanded="true">
                    <i class="mdi mdi-settings"></i></a>
                <a href="<?php echo e(route('admin.password.change')); ?>" class="" data-toggle="tooltip" title="Change Password"><i class="mdi mdi-lock"></i></a>
                <a href="<?php echo e(route('admin.logout')); ?>" class="" data-toggle="tooltip" title="Logout"><i class="mdi mdi-power"></i></a>
            </div>
        </div>


        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                <li class="nav-devider"></li>

                <li class="<?php echo e(active_menu('admin-home')); ?>">
                    <a class="waves-effect waves-dark" href="<?php echo e(route('admin.home')); ?>" aria-expanded="false">
                        <i class="mdi mdi-home"></i>
                        <span class="hide-menu"><?php echo e(__('Dashboard')); ?></span>
                    </a>
                </li>

                <li class="<?php echo e(active_menu('admin-home')); ?>">
                    <a class="waves-effect waves-dark" href="<?php echo e(route('admin.home')); ?>" aria-expanded="false">
                        <i class="mdi mdi-home"></i>
                        <span class="hide-menu"><?php echo e(__('POS')); ?></span>
                    </a>
                </li>

                <li class="nav-small-cap"><?php echo e(__('Admin & People')); ?></li>
                <?php if(auth()->guard('admin')->user()->hasRole('Super Admin')): ?>
                    <li><a class="has-arrow waves-effect waves-dark" href="#!" aria-expanded="false">
                            <i class="mdi mdi-account-multiple"></i><span class="hide-menu"><?php echo e(__('Admin Manage')); ?></span></a>
                        <ul aria-expanded="false" class="collapse">
                            <li><a href="<?php echo e(route('admin.all.user')); ?>"><?php echo e(__('All Admin')); ?> </a></li>
                            <li><a href="<?php echo e(route('admin.new.user')); ?>"><?php echo e(__('Add New Admin')); ?></a></li>
                            <li><a href="<?php echo e(route('admin.all.admin.role')); ?>"><?php echo e(__('All Admin Role')); ?></a></li>
                        </ul>
                    </li>
                <?php endif; ?>

                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['customer-list','customer-create'])): ?>
                    <li> <a class="has-arrow waves-effect waves-dark" href="#!" aria-expanded="false"><i class="mdi mdi-account-multiple-outline">
                            </i><span class="hide-menu"><?php echo e(__('Customer Manage')); ?></span></a>
                        <ul aria-expanded="false" class="collapse">
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('customer-list')): ?>
                                <li><a href="<?php echo e(route('admin.customer')); ?>"><?php echo e(__('All Customer')); ?> </a></li>
                            <?php endif; ?>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('customer-create')): ?>
                                <li><a href="<?php echo e(route('admin.customer.new')); ?>"><?php echo e(__('Add New Customer')); ?></a></li>
                            <?php endif; ?>
                        </ul>
                    </li>
                <?php endif; ?>

                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['supplier-list','supplier-create'])): ?>
                    <li> <a class="has-arrow waves-effect waves-dark" href="#!" aria-expanded="false"><i class="mdi mdi-account-multiple-outline"></i>
                            <span class="hide-menu"><?php echo e(__('Supplier Manage')); ?></span></a>
                        <ul aria-expanded="false" class="collapse">
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('supplier-list')): ?>
                                <li><a href="<?php echo e(route('admin.supplier')); ?>"><?php echo e(__('All Supplier')); ?> </a></li>
                            <?php endif; ?>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('supplier-create')): ?>
                                <li><a href="<?php echo e(route('admin.supplier.new')); ?>"><?php echo e(__('Add New Supplier')); ?></a></li>
                            <?php endif; ?>
                        </ul>
                    </li>
                <?php endif; ?>

                <li class="nav-small-cap"><?php echo e(__('Main Contents')); ?></li>
                <li> <a class="has-arrow waves-effect waves-dark" href="#!" aria-expanded="false"><i class="mdi mdi-database"></i>
                        <span class="hide-menu"><?php echo e(__('Products')); ?></span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="form-layout.html"><?php echo e(__('All Products')); ?></a></li>
                        <li><a href="form-layout.html"><?php echo e(__('Add Product')); ?></a></li>
                        <li><a href="<?php echo e(route('admin.product.category')); ?>"><?php echo e(__('Category')); ?></a></li>
                        <li><a href="<?php echo e(route('admin.product.subcategory')); ?>"><?php echo e(__('Subcategory')); ?></a></li>
                        <li><a href="<?php echo e(route('admin.product.brand')); ?>"><?php echo e(__('Brand')); ?></a></li>
                        <li><a href="<?php echo e(route('admin.color')); ?>"><?php echo e(__('Color')); ?></a></li>
                        <li><a href="<?php echo e(route('admin.size')); ?>"><?php echo e(__('Size')); ?></a></li>
                        <li><a href="<?php echo e(route('admin.unit')); ?>"><?php echo e(__('Unit')); ?></a></li>
                    </ul>
                </li>

                <li class="nav-small-cap"><?php echo e(__('Setting & Others')); ?></li>


                <li>
                    <a class="has-arrow waves-effect waves-dark" href="#!" aria-expanded="false">
                        <i class="mdi mdi-settings"></i>
                        <span class="hide-menu"><?php echo e(__('Misc Settings')); ?></span>
                    </a>

                    <ul aria-expanded="false" class="collapse">
                         <li><a href="<?php echo e(route('admin.country')); ?>"><?php echo e(__('Country Settings')); ?></a></li>
                    </ul>
                </li>




                <li>
                    <a class="has-arrow waves-effect waves-dark" href="#!" aria-expanded="false">
                        <i class="mdi mdi-settings"></i>
                        <span class="hide-menu"><?php echo e(__('General Settings')); ?></span>
                    </a>

                    <ul aria-expanded="false" class="collapse">

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any([
                        'general-settings-site-identity',
                        'general-settings-basic-settings',
                        'general-settings-color-settings',
                        'general-settings-typography',
                        'general-settings-seo-settings',
                        'general-settings-third-party-script',
                        'general-settings-email-template',
                        'general-settings-smtp-settings',
                        'general-settings-page-settings',
                        'general-settings-payment-gateway',
                        'general-settings-cache-settings',
                        'general-settings-sitemap',
                        'general-settings-database-upgrade',

                        ])): ?>

                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('general-settings-site-identity')): ?>
                                <li><a href="<?php echo e(route('admin.general.site.identity')); ?>"><?php echo e(__('Site Identity')); ?></a></li>
                            <?php endif; ?>


                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('general-settings-basic-settings')): ?>
                                <li><a href="<?php echo e(route('admin.general.basic.settings')); ?>"><?php echo e(__('Basic Settings')); ?></a></li>
                            <?php endif; ?>

                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('general-settings-seo-settings')): ?>
                                <li><a href="<?php echo e(route('admin.general.seo.settings')); ?>"><?php echo e(__('SEO Settings')); ?></a></li>
                            <?php endif; ?>





                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('general-settings-smtp-settings')): ?>
                                <li><a href="<?php echo e(route('admin.general.smtp.settings')); ?>"><?php echo e(__('SMTP Settings')); ?></a></li>
                            <?php endif; ?>

                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('general-settings-cache-settings')): ?>
                                <li><a href="<?php echo e(route('admin.general.cache.settings')); ?>"><?php echo e(__('Cache Settings')); ?></a></li>
                            <?php endif; ?>

                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('general-settings-database-upgrade')): ?>
                                <li><a href="<?php echo e(route('admin.general.database.upgrade')); ?>"><?php echo e(__('Database Upgrade')); ?></a></li>
                            <?php endif; ?>
                      <?php endif; ?>

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('language-list')): ?>
                        <li><a href="<?php echo e(route('admin.languages')); ?>"><?php echo e(__('Languages')); ?></a></li>
                        <?php endif; ?>
                    </ul>
                </li>

            </ul>
        </nav>
    </div>
</aside><?php /**PATH H:\xampp\htdocs\inventory-crm\@core\resources\views/backend/partials/sidebar.blade.php ENDPATH**/ ?>