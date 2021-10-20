
        <header class="p-3 bg-dark text-white">
            <div class="container">
                <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
                  <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
                    <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap"><use xlink:href="#bootstrap"></use></svg>
                  </a>

                  <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                    <li style="border-left: 1px solid gray;"><a class="navbar-brand text-white" href="#"><?php echo APP_TITLE; ?></a></li>
                    <li><a href="<?php echo home_url('home'); ?>" class="nav-link px-2 text-info">خانه</a></li>
                    <?php display_pages_list(false); ?>
                    <li>
                        <?php if(is_user_logged_in()): $current_user = get_current_user_data(); ?>
                        <a href="<?php echo home_url('dashboard'); ?>" style="text-decoration: none" class="nav-link px-2 text-secondary">< <?php echo $current_user['username']; ?> ></a>
                        <?php endif; ?> 
                    </li>
                  </ul>
                  <!--
                  <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3">
                    <input type="search" class="form-control form-control-dark" placeholder="Search..." aria-label="Search">
                  </form>
                  -->
                  <div class="text-end">
                    <?php if(is_user_logged_in()): ?>
                    <button onclick="location.href='<?php echo home_url('new'); ?>'" type="button" class="btn btn-outline-light me-2">یادداشت جدید</button>
                    <button onclick="location.href='<?php echo home_url('edit-pages'); ?>'" type="button" class="btn btn-outline-light me-2">ویرایش یادداشت</button>
                    <button onclick="location.href='<?php echo home_url('dashboard'); ?>'" type="button" class="btn btn-outline-light me-2">حساب کاربری</button>
                    <button onclick="location.href='<?php echo home_url('logout'); ?>'" type="button" class="btn btn-outline-light me-2">خروج</button>
                    <?php else: ?>
                    <button onclick="location.href='<?php echo home_url('login'); ?>'" type="button" class="btn btn-outline-light me-2">ورود</button>
                    <button onclick="location.href='<?php echo home_url('signup'); ?>'" type="button" class="btn btn-warning">ثبت نام</button>
                    <?php endif; ?>
                  </div>
                </div>
            </div>
        </header>
        <br>