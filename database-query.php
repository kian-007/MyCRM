<?php

require 'config.php';


$query = array(
   'id' => 2,
    'first_name' => 'کیان',
    'last_name' => 'سلیمانی',
    'acc_username' => 'kian_se',
    'city' => 'تهران',
    'email' => 'king.kian007@gmail.com',
    'phone_number' => '09198361951',
    'address' => 'خ سپاه - پل چوبی - خ حقوقی - کوچه غزوی',
    'comment' => 'he is kian, a perfect man and a beautiful boy maybe the most beautiful man in the world',
    'hidden' => 0,
    'gender' => 'مرد',
    'post_code' => '54چ89312',
    'website' => 'https://kikiq.herokuapp.com'
);

try{
    add_customer($query);
    echo 'successful';
} catch (Exception $e){
    echo 'Caught exception: ',  $e->getMessage(), "\n";
}
//update_customer($query);

//try{
//    global $pdo;
//    $pdo->query("
//            INSERT INTO customers(id, acc_username, first_name, last_name, city, address, post_code, phone_number, email, website, gender, comment, hidden)
//            VALUES (1, 'kia_hm', 'کیانا', 'احمدیان', 'تهران', 'خ سپاه - پل چوبی - خ حقوقی - کوچه غزوی', '54چ89312', '09901366974', 'kiannaahmadian@gmail.com', 'https://kikiq.herokuapp.com', 'زن', 'She is kiana, a perfect woman and a beautiful girl maybe the most beautiful firl in the world', 0);
//        ");
//    echo 'successful query';
//} catch (Exception $e) {
//        echo 'error';
//    }