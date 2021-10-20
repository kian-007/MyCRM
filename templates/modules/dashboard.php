<?php


function get_title(){
    echo 'پروفایل';
}


function authentication_required(){
    return true;
}

function get_content(){ ?>

<?php $current_user = get_current_user_data(); ?>

<!-- Columns start at 50% wide on mobile and bump up to 33.3% wide on desktop -->
<div class="row">
  <div class="col-2 col-md-3"></div>
  
  
  
  <div class="col-8 col-md-6">
      <div class="card text-white bg-secondary mb-3" style="margin-top: 60px">
        <div class="card-header"><?php echo $current_user['username']; ?></div>
        <div class="card-body">
          <h5 class="card-title">ویرایش پروفایل</h5>
          <p class="card-text"> در صورت نیاز میتوانید از این قسمت نام کاربری و رمز عبور خود را تغییر دهید</p>
          
          
          <form method="post">
                <div class="mb-3">
                      <label for="new_username" class="form-label"> نام کاربری جدید:</label>
                      <input class="form-control" id="new_username" name="new_username" placeholder="new_username">
                      
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">رمز عبور جدید:</label>
                    <input class="form-control" id="password" name="password" placeholder="Password" >
                </div>
              <button type="submit" name="save" class="btn btn-primary">ذخیره</button>
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
        
        if(!isset($_POST['save'])){
            return;
        }
        
        $current_user = get_current_user_data();
        $username = $current_user['username'];
        $_POST['username'] = $username;
        
        if(isset($_POST['password'])){
            $password = $_POST['password'];
        }

        if(isset($_POST['new_username'])){
            $new_username = $_POST['new_username'];
        }
        

        if(empty($new_username)){
            add_message('نام کاربری جدید نمیتواند خالی باشد', 'error');
            return;
        }

        if(empty($password)){
            add_message('رمز عبور نمیتواند خالی باشد!', 'error');
            return;
        }
        
        if(user_exists($new_username)){
            add_message('این نام کاربری قبلا انتخاب شده است!', 'warning');
            return;
        }

        update_user($_POST);
        
        $user = get_user($new_username);
        if($user){
            add_message('تغیرات جدید با موفقیت ذخیره شد', 'info');
            user_login($new_username, $password);
        } else {
            add_message('خطا!', 'error');
        }

        
    }

