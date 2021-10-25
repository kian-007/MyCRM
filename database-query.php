<?php

require 'config.php';


$query = array(
    'id' => 1,
    'first_name' => 'کیانا',
    'last_name' => 'احمدیان',
    'acc_username' => 'kia_hm',
    'city' => 'تهران',
    'email' => 'kiannaahmadian@gmail.com',
    'phone_number' => '09901366974',
    'address' => 'خ سپاه - پل چوبی - خ حقوقی - کوچه غزوی',
    'comment' => 'She is kiana, a perfect woman and a beautiful girl maybe the most beautiful firl in the world',
    'hidden' => 0,
    'gender' => 'زن',
    'post_code' => '54چ89312',
    'website' => 'https://kikiq.herokuapp.com'
);

try{
    add_customer($query);
    echo 'successful';
} catch (Exception $e){
    echo 'error';
}

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