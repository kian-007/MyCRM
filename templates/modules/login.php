<?php


function get_title(){
    echo 'ورود به برنامه';
}


function get_content(){ ?>


  <!-- Columns start at 50% wide on mobile and bump up to 33.3% wide on desktop -->
  <div class="row">
    <div class="col-2 col-md-3"></div>
    
    
    
    <div class="col-8 col-md-6">
        <div class="card text-white bg-secondary mb-3" style="margin-top: 60px">
          <div class="card-header">MyCRM</div>
          <div class="card-body">
            <h5 class="card-title">ورود به سیستم</h5>
            <p class="card-text">برای ورود به نرم افزار نام کاربری و رمز عبور خود را وارد کنید.</p>
            
            
            <form method="post">
                  <div class="mb-3">
                      <?php 
                        $username = '';
                        if(isset($_POST['username'])){
                            $username = $_POST['username'];
                        }
                      ?>
                        <label for="username" class="form-label">نام کاربری</label>
                        <input class="form-control" id="username" name="username" placeholder="Username" aria-describedby="emailHelp" value="<?php echo $username; ?>">
                        <div id="emailHelp" class="form-text text-info">We'll never share your email with anyone else.</div>
                  </div>
                  <div class="mb-3">
                        <label for="password" class="form-label">رمز عبور</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                  </div>
                  <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                        <label class="form-check-label" for="exampleCheck1">Check me out</label>
                  </div>
                <button type="submit" name="login" class="btn btn-primary">ورود</button>
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
    
    if(!isset($_POST['login'])){
        return;
    }
    
    if(isset($_POST['username'])){
        $username = $_POST['username'];
    }
    
    if(isset($_POST['password'])){
        $password = $_POST['password'];
    }
    
    if(empty($username)){
        add_message('نام کاربری نمیتواند خالی باشد!', 'error');
        return;
    }
    if(empty($password)){
        add_message('رمز عبور نمیتواند خالی باشد!', 'error');
        return;
    }
    
    user_login($username, $password);
    
    if(!is_user_logged_in()){
        add_message('نام کاربری و یا رمز عبور اشتباه است!', 'danger');
    } else {
        redirect_to(home_url());
    }
}