<?php

function authentication_required(){
    return true;
}

function get_title(){
    echo 'صفحه مشتریان';
}

function get_content(){ ?>
    
    <button id="add" name="add" class="btn btn-success float_left" style="padding-right: 30px">افزودن</button>
    <img class="float_left" style="position: relative; right:25px; top:10px"   src="<?php echo home_url('include/image/diff-added.svg'); ?>"	alt="add"/>
    <br>
    <br>
    <table class="table table-bordered table-hover">
        <tr class="table-dark border-5" style="text-align: center">
            <th style="">ردیف</th>
            <th style="">نام کاربری مشتری</th>
            <th style="">نام و نام خانوادگی مشتری</th>
            <th style="">شهر</th>
            <th style="">آدرس</th>
            <th style="">کد پستی</th>
            <th style="">شماره تلفن</th>
            <th style="">ایمیل</th>
            <th style="">وبسایت</th>
            <th style="">جنسیت</th>
            <th style="">نظرات</th>
        </tr>
        <?php $customers = get_all_customers(true);
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
                    <span style="color: #0a53be"><?php echo $email; ?></span>
                </td>
                <td>
                    <span style="color: #0a53be"><?php echo $website; ?></span>
                </td>
                <td>
                    <span style="color: orange"><?php echo $gender; ?></span>
                </td>
                <td>
                    <span><?php echo $comment; ?></span>
                </td>
            </tr>
        
        <?php } ?>
    </table>
    

<?php }