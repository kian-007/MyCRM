<?php


function get_customer($phone_number){
	if(!$phone_number){
		return null;
	}
	global $pdo;
	$result = $pdo->query("
		SELECT *
		FROM users
		WHERE phone_number = '$phone_number'
	");
	$row = $result->fetch(PDO::FETCH_ASSOC);
	return $row;
}

function customer_exists($phone_number){
	$customer = get_user($phone_number);
	return isset($customer['id']);
}

function customer_count(){
	global $pdo;
	$result = $pdo->query("
		SELECT *
		FROM customers
	");
	$counter = 0;
	while($row = $result->fetch(PDO::FETCH_ASSOC)){
		$counter++;
	}
	return $counter;
}

/*
function initialize_users(){
	if(user_count() == 0){
		global $pdo;
		$default_pw_hash = sha1('admin007');
		$pdo->query("
			INSERT INTO users (username, password, first_name, last_name, phone_number, email) VALUES
			('admin', '$default_pw_hash', '', '', '', '');
		");
	}
}
 */

function add_customer($userdata){
	$phone_number = $userdata['phone_number'];
	if(!$phone_number){
		return;
	}
        
	if(isset($userdata['acc_username'])){
		$acc_username = $userdata['acc_username'];
	}
//	$password = sha1($userdata['password']);
	if(isset($userdata['first_name'])){
		$first_name = $userdata['first_name'];
	}
	if(isset($userdata['last_name'])){
		$last_name = $userdata['last_name'];
	}
        if(isset($userdata['city'])){
		$city = $userdata['city'];
	}
        if(isset($userdata['address'])){
		$address = $userdata['address'];
	}
        if(isset($userdata['post_code'])){
		$post_code = $userdata['post_code'];
	}
	if(isset($userdata['email'])){
		$email = $userdata['email'];
	}
        if(isset($userdata['website'])){
		$website = $userdata['website'];
	}
        if(isset($userdata['gender'])){
		$gender = $userdata['gender'];
	}if(isset($userdata['comment'])){
		$comment = $userdata['comment'];
	}
        if(isset($userdata['hidden'])){
		$hidden = $userdata['hidden'];
	}
//        if(isset($userdata['new_username'])){
//		$new_username = $userdata['new_username']; //برای تغییر نام کاربری و پسورد
//	}
        
	

	global $pdo;
	if(!customer_exists($phone_number)){
		$pdo->query("
			INSERT INTO customers (phone_number, acc_username, first_name, last_name, city, address, post_code, email, website, gender, comment, hidden) VALUES
			('$phone_number', '$acc_username', '$first_name', '$last_name', '$city', '$address', '$post_code', '$email', '$website', '$gender', '$comment', '$hidden');
		");
	}else{
		$customer = get_customer($phone_number);
		$id = $customer['id'];
                
                if(isset($userdata['acc_username'])){
                        $acc_username = $userdata['acc_username'];
                }else{$acc_username = $customer['acc_username'];}
                
		if(isset($userdata['first_name'])){
			$first_name = $userdata['first_name'];
		}else{$first_name = $customer['first_name'];}

		if(isset($userdata['last_name'])){
			$last_name = $userdata['last_name'];
		}else{$last_name = $customer['last_name'];}

		if(isset($userdata['phone_number'])){
			$phone_number = $userdata['phone_number'];
		}else{$phone_number = $customer['phone_number'];}

		if(isset($userdata['email'])){
			$email = $userdata['email'];
		}else{$email = $customer['email'];}
                
                if(isset($userdata['website'])){
                    $website = $userdata['website'];
                }else{$website = $customer['website'];}
                
                if(isset($userdata['gender'])){
                        $gender = $userdata['gender'];
                }else{$gender = $customer['gender'];}
                
                if(isset($userdata['comment'])){
                        $comment = $userdata['comment'];
                }else{$comment = $customer['comment'];}
                
                if(isset($userdata['hidden'])){
                        $hidden = $userdata['hidden'];
                }else{$hidden = $customer['hidden'];}

		$pdo->query("
            UPDATE customers
            SET phone_number='$phone_number', acc_username= '$acc_username', first_name='$first_name', last_name='$last_name', city='$city', address='$address', post_code='$post_code', email='$email', website='$website', gender='$gender', comment='$comment', hidden='$hidden' 
            WHERE id ='$id';
        ");
	}
}

function update_customer($userdata){
    add_customer($userdata);
}

function delete_customer($phone_number){
	if(!customer_exists($phone_number)){
		return;
	}
	global $pdo;
	$pdo->query("
		DELETE FROM customers
		WHERE phone_number = '$phone_number';
	");
}