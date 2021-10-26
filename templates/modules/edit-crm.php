<?php



function authentication_required(){
    return true;
}

function get_title(){
    echo 'ویرایش مشتری';
}

function get_content(){ ?>
<?php
$customer = get_customer_by_id($_GET['id']); 
if(!$customer){
    echo 'لینک نادرست است.';
    return;
}
?>
    
<form method="post">
    <div class="row" style="background-color: gray">

        <div class="col-4 col-md-4">
            
                <div class="form-floating">
                    <input id="first_name" name="first_name" type="text" aria-label="first_name" class="form-control" placeholder="first_name" value="<?php echo $customer['first_name']; ?>">
                  <label for="first_name">نام</label>
                </div>
            
        </div>

        <div class="col-4 col-md-4">
            
                <div class="form-floating">
                  <input id="last_name" name="last_name" type="text" aria-label="last_name" class="form-control" placeholder="last_name" value="<?php echo $customer['last_name']; ?>">
                  <label for="last_name"> نام خانوادگی</label>
                </div>
            
        </div>
        
        <div class="col-4 col-md-4">
            
                <div class="form-floating">
                  <input id="acc_username" name="acc_username" type="text" aria-label="acc_username" class="form-control" placeholder="acc_username" value="<?php echo $customer['acc_username']; ?>">
                  <label for="acc_username">نام کاربری مشتری</label>
                </div>
            
        </div>
    </div>
    
    <br>
    <div class="row" style="background-color: gray; min-height: 100px">
        <div class="col-4 col-md-4">
            
                <div class="form-floating">
                  <input id="city" name="city" type="text" aria-label="city" class="form-control" placeholder="city" value="<?php echo $customer['city']; ?>">
                  <label for="city">شهر</label>
                </div>
            
        </div>

        <div class="col-4 col-md-4">
            
                <div class="form-floating">
                    <textarea id="address" name="address" aria-label="address" class="form-control" placeholder="address"><?php echo $customer['address']; ?></textarea>
                  <label for="address">آدرس</label>
                </div>
            
        </div>

        <div class="col-4 col-md-4">
            
                <div class="form-floating">
                  <input id="post_code" name="post_code" type="text" aria-label="post_code" class="form-control" placeholder="post_code" value="<?php echo $customer['post_code']; ?>">
                  <label for="post_code">کدپستی</label>
                </div>
            
        </div>
    </div>

    <br>
    <div class="row" style="background-color: gray">
        <div class="col-4 col-md-4">
            
                <div class="form-floating">
                  <input id="phone_number" name="phone_number" type="text" aria-label="phone_number" class="form-control" placeholder="phone_number" value="<?php echo $customer['phone_number']; ?>">
                  <label for="phone_number">شماره تلفن</label>
                </div>
            
        </div>

        <div class="col-4 col-md-4">
            
                <div class="form-floating">
                  <input id="email" name="email" type="text" aria-label="email" class="form-control" placeholder="email" value="<?php echo $customer['email']; ?>">
                  <label for="email">ایمیل</label>
                </div>
            
        </div>

        <div class="col-4 col-md-4">
            
                <div class="form-floating">
                  <input id="website" name="website" type="text" aria-label="website" class="form-control" placeholder="website" value="<?php echo $customer['website']; ?>">
                  <label for="website">وبسایت</label>
                </div>
            
        </div>
    </div>
    
    <br>
    <div class="row" style="background-color: gray; min-height: 100px">
        <div class="col-4 col-md-4">
            
                <div class="form-floating">
                  <input id="gender" name="gender" type="text" aria-label="gender" class="form-control" placeholder="gender" value="<?php echo $customer['gender']; ?>">
                  <label for="gender">جنسیت</label>
                </div>
            
        </div>

        <div class="col-4 col-md-4">
            
                <div class="form-floating">
                    <textarea id="comment" name="comment" aria-label="comment" class="form-control" placeholder="comment" ><?php echo $customer['comment']; ?></textarea>
                  <label for="comment">نظرات</label>
                </div>
            
        </div>

        <div class="col-4 col-md-4">
                <br>
                <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" role="switch" id="hidden" name="hidden" <?php echo $customer['hidden'] ? 'checked' : ''; ?>>
                  <label class="form-check-label" for="hidden">مخفی</label>
                </div>
            
        </div>
    </div>
    <br>
    <button type="submit" class="btn btn-primary">ذخیره کردن</button>
</form>

<?php }


function process_inputs(){
    if(empty($_POST)){
    return;
  }
   
  $customer = $_POST;
  $customer['id'] = $_GET['id'];
  
  if(isset($customer['hidden']) && $customer['hidden'] == 'on'){
      $customer['hidden'] = 1;
  }else {
      $customer['hidden'] = 0;
  }

  add_customer($customer);
//  add_message('تغییرات با موفقیت ذخیره شد', 'success');
  redirect_to(home_url('crm'));
  
}

function get_style(){ ?>
    <style>
        #comment {height: 100px;}
        #address {height: 100px;}
    </style>
<?php }

function get_script(){
    
}