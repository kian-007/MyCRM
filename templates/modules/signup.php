<?php


function get_title(){
    echo 'ثبت نام';
}


function get_content(){ ?>


  <!-- Columns start at 50% wide on mobile and bump up to 33.3% wide on desktop -->
  <div class="row">
    <div class="col-2 col-md-3"></div>
    
    
    
    <div class="col-8 col-md-6">
        <div class="card text-white bg-secondary mb-3" style="margin-top: 60px">
          <div class="card-header">MyCRM</div>
          <div class="card-body">
            <h5 class="card-title">ثبت نام</h5>
            <p class="card-text">فیلد هایی که با  * مشخص شده اند پر کردنشان اجباری است.</p>
            
            
            <form method="post">
                  <div class="mb-3">
                      
                        * <label for="username" class="form-label">نام کاربری جدید خود را وارد کنید:</label>
                        <input class="form-control" id="username" name="username" placeholder="Username">
                        
                        <br>
                        * <label for="exampleInputEmail1" class="form-label">ایمیل خود را وارد کنید:</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Email" aria-describedby="emailHelp">
                        <div id="emailHelp" class="form-text text-info">We'll never share your email with anyone else.</div>
                        
                        <br>
                        <label for="phone_number" class="form-label">شماره همراه خود را وارد کنید:</label>
                        <input class="form-control" id="phone_number" name="phone_number" placeholder="Phone Number">
                        
                  </div>
                  <div class="mb-3">
                        * <label for="password" class="form-label">رمز عبور جدید خود را وارد کنید:</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                  </div>
                  <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                        <label class="form-check-label" for="exampleCheck1">Check me out</label>
                  </div>
                <button type="submit" name="signup" class="btn btn-primary">ذخیره و ثبت نام</button>
            </form>
            
            
          </div>
        </div>
    </div>
    
    
    
    <div class="col-2 col-md-3"></div>
  </div>
    
<?php }


function process_inputs(){
    
//    if(is_user_logged_in()){
//        redirect_to(home_url());
//    }
    
    if(!isset($_POST['signup'])){
        return;
    }
    
    if(isset($_POST['username'])){
        $username = strtolower($_POST['username']);
    }
    
    if(isset($_POST['password'])){
        $password = $_POST['password'];
    }
    
    if(isset($_POST['email'])){
        $email = $_POST['email'];
    }
    
    if(isset($_POST['phone_number'])){
        $phone_number = $_POST['phone_number'];
    }
    
    if(isset($_POST['first_name'])){
        $first_name = $_POST['first_name'];
    } else {
        $first_name = '';
        $_POST['first_name'] = $first_name;
    }
    
    if(isset($_POST['last_name'])){
        $last_name = $_POST['last_name'];
    } else {
        $last_name = '';
        $_POST['last_name'] = $last_name;
    }
    
    if(empty($username)){
        add_message('نام کاربری نمیتواند خالی باشد!', 'error');
        return;
    }
    if(empty($password)){
        add_message('رمز عبور نمیتواند خالی باشد!', 'error');
        return;
    }
    
    if(empty($email)){
        add_message('فیلد ایمیل نمیتواند خالی باشد!', 'error');
        return;
    }
    
//    var_dump($_POST);
    
    add_user($_POST);
    user_login($username, $password);
    
    if(!is_user_logged_in()){
        add_message('لطفا همه فیلد های * دار را پر کنید', 'danger');
    } else {
        add_message('ثبت نام شما موفقیت آمیز بود', 'success');
        sleep(3);
        redirect_to(home_url());
    }
    
}