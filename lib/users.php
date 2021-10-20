<?php


function get_user($username){
	if(!$username){
		return null;
	}
	global $db;
	$result = $db->query("
		SELECT *
		FROM users
		WHERE username = '$username'
	");
	$row = $result->fetch_assoc();
	return $row;
}

function user_exists($username){
	$user = get_user($username);
	return isset($user['id']);
}

function user_count(){
	global $db;
	$result = $db->query("
		SELECT *
		FROM users
	");
	
	return $result->num_rows;
}

/*
function initialize_users(){
	if(user_count() == 0){
		global $db;
		$default_pw_hash = sha1('admin007');
		$db->query("
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
	$new_username = $userdata['new_username']; //برای تغییر نام کاربری و پسورد

	global $db;
	if(!user_exists($username)){
		$db->query("
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

		$db->query("
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
	global $db;
	$db->query("
		DELETE FROM users
		WHERE username = '$username';
	");
}