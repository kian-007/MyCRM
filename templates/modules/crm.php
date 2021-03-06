<?php

function authentication_required(){
    return true;
}

function get_title(){
    echo 'صفحه مشتریان';
}

function get_content(){ ?>
    
    <?php
    $search = null;
    if(isset($_POST['search'])){$search = $_POST['search'];}
     
    ?>
    <button onclick="location.href='<?php echo home_url('new-crm'); ?>'" id="new" name="new" class="btn btn-success float_left" style="padding-right: 30px">افزودن</button>
    <img class="float_left" style="position: relative; right:25px; top:10px"   src="<?php echo home_url('include/image/diff-added.svg'); ?>"	alt="add"/>
    <br>
    <br>
    <table class="table table-bordered table-hover">
        <tr class="table-dark border-5" style="text-align: center">
            <th style="">ردیف</th>
            <th style="">نام کاربری مشتری</th>
            <th style="">نام مشتری</th>
            <th style="">نوع</th>
            <th style="">شهر</th>
            <th style="">آدرس</th>
            <th style="">کد پستی</th>
            <th style="">شماره تلفن</th>
            <th style="">ایمیل و وبسایت</th>
            <th style="">جنسیت</th>
            <th style="">نظرات</th>
            <th style="width: 160px;">
                <form method="POST" class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3">
                    <input type="search" name="search" class="form-control form-control-dark" placeholder="Search..." aria-label="Search">
                </form>
            </th>
        </tr>
        <?php
        if(!$search){
            $customers = get_all_customers(true);
        }else {
            $customers = search_customers($search, true);
            if(empty($customers)){ echo '<h3> چیزی یافت نشد! <h3>'; }
        }
        $counter = 0;
        foreach ($customers as $customer) {
           $counter++;
           $id = $customer['id'];
           $acc_username = $customer['acc_username'];
           $first_name = $customer['first_name'];
           $last_name = $customer['last_name'];
           $city = $customer['city'];
           $address = $customer['address'];
           $post_code = $customer['post_code'];
           $phone_number = $customer['phone_number'];
           $email = $customer['email'];
           $website = $customer['website'];
           $gender = $customer['gender'];
           $comment = $customer['comment'];
           $hidden = $customer['hidden'];
           $type = $customer['type'];
           ?>
        <tr class="table-active table-info border-secondary">
                <td><?php echo $counter; ?></td>
                <td>
                    <span style="color:green"><?php echo $acc_username; ?></span>
                </td>
                <td>
                    <?php echo "<strong>$first_name $last_name</strong>"; ?>
                    <?php if($hidden): ?>
                    <span style="font-size: small;">[مخفی]</span>
                    <?php endif; ?>
                    <br>    
                </td>
                <td>
                    <span style="<?php if($type == 'حقیقی'){ echo "color: green";}else{ echo "color: red";} ?>"><strong><?php echo $type ?></strong></span>
                </td>
                <td>
                    <span><?php echo $city; ?></span>
                </td>
                <td style="width:150px">
                    <span><?php echo $address; ?></span>
                </td>
                <td>
                    <span><?php echo $post_code; ?></span>
                </td>
                <td>
                    <span style="color: #055160"><?php echo $phone_number; ?></span>
                </td>
                <td>
                    <span style="color: #0a53be">
                        ایمیل: <?php echo $email; ?> <br>
                        وبسایت: <a class="mylink_crm" href="<?php echo $website; ?>" style="color: #0a53be"><?php echo $website; ?></a>
                    </span>
                </td>
                <td>
                    <span style="<?php if($gender == 'مرد'){ echo "color: brown";}else{ echo "color: #b637b0";} ?>"><?php echo $gender; ?></span>
                </td>
                <td>
                    <span><?php echo $comment; ?></span>
                </td>
                <td>
                    <button id="edit" onclick="location.href='<?php echo get_customer_edit_url($id); ?>'" class="btn btn-primary float_left" style="padding-right: 30px">ویرایش</button>
                    <img class="float_left" style="position: relative; right:25px; top:10px"   src="<?php echo home_url('include/image/pencil.svg'); ?>"/>
                    <br>
                    <br>
                    <?php if($hidden): ?>
                    <button id="unhide" onclick="location.href='<?php echo get_customer_unhide_url($id); ?>'" class="btn btn-warning float_left" style="padding-right: 30px">ظاهر</button>
                    <img class="float_left" style="position: relative; right:25px; top:10px"   src="<?php echo home_url('include/image/eye.svg'); ?>"/>
                    <br>
                    <br>
                    <?php else: ?>
                    <button id="hide" onclick="location.href='<?php echo get_customer_hide_url($id); ?>'" class="btn btn-warning float_left" style="padding-right: 30px">مخفی</button>
                    <img class="float_left" style="position: relative; right:25px; top:10px"   src="<?php echo home_url('include/image/eye-closed.svg'); ?>"/>
                    <br>
                    <br>
                    <?php endif; ?>
                    <button id="delete" onclick="location.href='<?php echo get_customer_delete_url($id); ?>'" class="btn btn-danger float_left" style="padding-right: 30px">حذف</button>
                    <img class="float_left" style="position: relative; right:25px; top:10px"   src="<?php echo home_url('include/image/diff-removed.svg'); ?>"/>
                </td>
            </tr>
        
        <?php } ?>
    </table>
    
    
    
<?php }

    



function get_style(){ ?>
    <style>
    
    .mylink_crm {
        text-decoration: none;
    }
    .mylink_crm:hover {
        border-radius: 1em;
        background-color: white;
        text-decoration: underline brown;
    }
    </style>
<?php }



function process_inputs(){
    
    
    if(empty($_GET)){
        return;
    }
    
    $action = strtolower($_GET['action']);
    $id = $_GET['id'];
    switch ($action){
        case 'hide':
            hide_customer($id);
            break;
        
        case 'unhide':
            unhide_customer($id);
            break;
        
        case 'delete':
            delete_customer($id);
            break;
        
    }
    
    redirect_to(home_url('crm'));
}