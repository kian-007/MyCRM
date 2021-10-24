
        <header class="p-3 bg-dark text-white">
            <div class="container">
                <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
                  <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
                    <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap"><use xlink:href="#bootstrap"></use></svg>
                  </a>

                  <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                    <li style="border-left: 1px solid gray;"><a class="navbar-brand text-white" href="#"><?php echo APP_TITLE; ?></a></li>
                    <li><a href="<?php echo home_url('home'); ?>" class="nav-link px-2 text-info">خانه</a></li>
                    <?php if(is_user_logged_in()): ?>
                    <li><a href="<?php echo home_url('only-chat'); ?>" class="nav-link px-2 text-info">پیام ها</a></li>
                    <?php endif; ?>
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
                    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                      <div class="container-fluid">
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDarkDropdown" aria-controls="navbarNavDarkDropdown" aria-expanded="false" aria-label="Toggle navigation">
                          <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarNavDarkDropdown">
                          <ul class="navbar-nav">
                            <li class="nav-item dropdown">
                              <a class="nav-link dropdown-toggle" href="#" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                دفترچه یادداشت ها
                              </a>
                              <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDarkDropdownMenuLink">
                               <!-- <li><a class="dropdown-item" href="#">Action</a></li> -->
                                <?php display_pages_list(false); ?>
                              </ul>
                            </li>
                          </ul>
                        </div>
                      </div>
                    </nav>
                  
                  
                  
                    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                      <div class="container-fluid">
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDarkDropdown" aria-controls="navbarNavDarkDropdown" aria-expanded="false" aria-label="Toggle navigation">
                          <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarNavDarkDropdown">
                          <ul class="navbar-nav">
                            <li class="nav-item dropdown">
                              <a class="nav-link dropdown-toggle" href="#" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                مدیریت ارتباط با مشتریان
                              </a>
                              <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDarkDropdownMenuLink">
                                <li><a class="dropdown-item" href="#">مشتری</a></li>
                                <li><a class="dropdown-item" href="#">Another action</a></li>
                                <li><a class="dropdown-item" href="#">Something else here</a></li>
                              </ul>
                            </li>
                          </ul>
                        </div>
                      </div>
                    </nav>
                  
                  
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
        
        
        
<script src="<?php echo SITE_URL; ?>include/js/bootstrap.bundle.min.js">
    var dropdownElementList = [].slice.call(document.querySelectorAll('.dropdown-toggle'))
    var dropdownList = dropdownElementList.map(function (dropdownToggleEl) {
      return new bootstrap.Dropdown(dropdownToggleEl)
    })
</script>
            