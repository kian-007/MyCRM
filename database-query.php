<?php

require 'config.php';

try{
    global $pdo;
    $pdo->query("
            INSERT INTO customers(id, acc_username, first_name, last_name, city, address, post_code, phone_number, email, website, gender, comment, hidden)
            VALUES (2, 'mamad_mali', 'کیانا', 'احمدیان', 'تهران', 'خ سپاه - پل چوبی - خ حقوقی - کوچه غزوی', '54چ89312', '09901377974', 'kiannaahmrdian@gmail.com', 'https://kikiq.herokuapp.com', 'مرد', 'She is kiana, a perfect woman and a beautiful girl maybe the most beautiful firl in the world', 0);
        ");
    echo 'successful query';
} catch (Exception $e) {
        echo 'error';
    }