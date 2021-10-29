<?php



function authentication_required(){
    return true;
}

function get_title(){
    echo 'ویرایش مشتری';
}

function get_content(){ ?>

<div id="content" >
    <form method="post">
        <div class="row" style="">

            <div class="col-4 col-md-4">

                    <div class="form-floating">
                        <input id="first_name" name="first_name" type="text" aria-label="first_name" class="form-control" placeholder="first_name" >
                      <label for="first_name">نام</label>
                    </div>

            </div>

            <div class="col-4 col-md-4">

                    <div class="form-floating">
                      <input id="last_name" name="last_name" type="text" aria-label="last_name" class="form-control" placeholder="last_name" >
                      <label for="last_name"> نام خانوادگی</label>
                    </div>

            </div>

            <div class="col-4 col-md-4">

                    <div class="form-floating">
                      <input id="acc_username" name="acc_username" type="text" aria-label="acc_username" class="form-control" placeholder="acc_username">
                      <label for="acc_username">نام کاربری مشتری</label>
                    </div>

            </div>
        </div>

        <br>
        <div class="row" style="; min-height: 100px">
            <div class="col-4 col-md-4">

                    <div class="form-floating">
                      <input id="city" name="city" type="text" aria-label="city" class="form-control" placeholder="city" >
                      <label for="city">شهر</label>
                    </div>

            </div>

            <div class="col-4 col-md-4">

                    <div class="form-floating">
                        <textarea id="address" name="address" aria-label="address" class="form-control" placeholder="address"></textarea>
                      <label for="address">آدرس</label>
                    </div>

            </div>

            <div class="col-4 col-md-4">

                    <div class="form-floating">
                      <input id="post_code" name="post_code" type="text" aria-label="post_code" class="form-control" placeholder="post_code">
                      <label for="post_code">کدپستی</label>
                    </div>

            </div>
        </div>

        <br>
        <div class="row" style="">
            <div class="col-4 col-md-4">

                    <div class="form-floating">
                      <input id="phone_number" name="phone_number" type="text" aria-label="phone_number" class="form-control" placeholder="phone_number" >
                      <label for="phone_number">شماره تلفن</label>
                    </div>

            </div>

            <div class="col-4 col-md-4">

                    <div class="form-floating">
                      <input id="email" name="email" type="text" aria-label="email" class="form-control" placeholder="email">
                      <label for="email">ایمیل</label>
                    </div>

            </div>

            <div class="col-4 col-md-4">

                    <div class="form-floating">
                      <input id="website" name="website" type="text" aria-label="website" class="form-control" placeholder="website">
                      <label for="website">وبسایت</label>
                    </div>

            </div>
        </div>

        <br>
        <div class="row" style="; min-height: 100px">
            <div class="col-4 col-md-4">

                    <div class="form-floating">
                      <input id="gender" name="gender" type="text" aria-label="gender" class="form-control" placeholder="gender">
                      <label for="gender">جنسیت</label>
                    </div>

            </div>

            <div class="col-4 col-md-4">

                    <div class="form-floating">
                        <textarea id="comment" name="comment" aria-label="comment" class="form-control" placeholder="comment" ></textarea>
                      <label for="comment">نظرات</label>
                    </div>

            </div>
            <div class="col-4 col-md-4">

                    <div class="form-floating">
                      <input id="type" name="type" type="text" aria-label="type" class="form-control" placeholder="type">
                      <label for="gender">نوع</label>
                    </div>

            </div>

        </div>
        <br>
        <div class="row">
            <div class="col-4 col-md-4">
                    <br>
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" role="switch" id="hidden" name="hidden" >
                      <label class="form-check-label" for="hidden">مخفی</label>
                    </div>
            </div>
        </div>
        <br>
        <button type="submit" class="btn btn-primary">ذخیره کردن</button>
    </form>
</div>
<?php }


function process_inputs(){
    if(empty($_POST)){
    return;
  }
   
  $customer = $_POST;
  $customer['id'] = null;
  
  if(isset($customer['hidden']) && $customer['hidden'] == 'on'){
      $customer['hidden'] = 1;
  }else {
      $customer['hidden'] = 0;
  }
  
  $id = add_customer($customer);
  redirect_to(get_customer_edit_url($id));
  
}

function get_style(){ ?>
    <style>
        #content{background-color: brown}
        #comment {height: 100px;}
        #address {height: 100px;}
    </style>
<?php }

function get_script(){
    
}