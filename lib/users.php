<?php


function get_user($username){
	if(!$username){
		return null;
	}
	global $pdo;
	$result = $pdo->query("
		SELECT *
		FROM users
		WHERE username = '$username'
	");
	$row = $result->fetch(PDO::FETCH_ASSOC);
	return $row;
}

function user_exists($username){
	$user = get_user($username);
	return isset($user['id']);
}

function user_count(){
	global $pdo;
	$result = $pdo->query("
		SELECT *
		FROM users
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

function add_user($userdata){
	$username = $userdata['username'];
	if(!$username){
		return;
	}

	$password = sha1($userdata['password']);
	if(isset($userdata['first_name'])){
		$first_name = $userdata['first_name'];
	}
	if(isset($userdata['last_name'])){
		$last_name = $userdata['last_name'];
	}
	if(isset($userdata['phone_number'])){
		$phone_number = $userdata['phone_number'];
	}
	if(isset($userdata['email'])){
		$email = $userdata['email'];
	}
        if(isset($userdata['new_username'])){
		$new_username = $userdata['new_username']; //برای تغییر نام کاربری و پسورد
	}
	

	global $pdo;
	if(!user_exists($username)){
		$pdo->query("
			INSERT INTO users (username, password, first_name, last_name, phone_number, email) VALUES
			('$username', '$password', '$first_name', '$last_name', '$phone_number', '$email');
		");
	}else{
		$user = get_user($username);
		$id = $user['id'];

		if(isset($userdata['first_name'])){
			$first_name = $userdata['first_name'];
		}else{$first_name = $user['first_name'];}

		if(isset($userdata['last_name'])){
			$last_name = $userdata['last_name'];
		}else{$last_name = $user['last_name'];}

		if(isset($userdata['phone_number'])){
			$phone_number = $userdata['phone_number'];
		}else{$phone_number = $user['phone_number'];}

		if(isset($userdata['email'])){
			$email = $userdata['email'];
		}else{$email = $user['email'];}

		$pdo->query("
            UPDATE users
            SET username='$new_username', password='$password', first_name='$first_name', last_name='$last_name', phone_number='$phone_number', email='$email'
            WHERE id ='$id';
        ");
	}
}

function update_user($userdata){
	add_user($userdata);
}

function delete_user($username){
	if(!user_exists($username)){
		return;
	}
	global $pdo;
	$pdo->query("
		DELETE FROM users
		WHERE username = '$username';
	");
}