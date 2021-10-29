<?php

function get_all_customers($include_hidden = false){
    global $pdo;
    if($include_hidden){
        $result = $pdo->query("
            SELECT *
            FROM customers
        ");   
    } else{
            $result = $pdo->query("
            SELECT *
            FROM customers
            WHERE hidden = 0
        ");
    }
    
    $customers = array();
    while($row = $result->fetch(PDO::FETCH_ASSOC)){
        $customers[] = $row;
    }
    
    return $customers;
}

function get_customer_by_phone_number($phone_number){
	if(!$phone_number){
		return null;
	}
	global $pdo;
	$result = $pdo->query("
		SELECT *
		FROM customers
		WHERE phone_number = '$phone_number'
	");
	$row = $result->fetch(PDO::FETCH_ASSOC);
	return $row;
}

function get_customer_by_id($id){
	if(!$id){
		return null;
	}
	global $pdo;
	$result = $pdo->query("
		SELECT *
		FROM customers
		WHERE id = '$id'
	");
	$row = $result->fetch(PDO::FETCH_ASSOC);
	return $row;
}

function customer_exists($id){
	if(!$id){
        return false;
    }
    $customer = get_customer_by_id($id);
    return isset($customer['id']);
}

function customer_count($include_hidden = false){
	global $pdo;
        if($include_hidden){
	$result = $pdo->query("
		SELECT *
		FROM customers
            ");
        }else {
            $result = $pdo->query("
		SELECT *
		FROM customers
                WHERE hidden=0
            ");
        }
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

function add_customer($customerdata){
	$id = $customerdata['id'];
	if(!$id){
            $id = 0;
	}
        $phone_number = $customerdata['phone_number'];
        $acc_username = $customerdata['acc_username'];
        $first_name = $customerdata['first_name'];
        $last_name = $customerdata['last_name'];
        $city = $customerdata['city'];
        $post_code = $customerdata['post_code'];
        $address = $customerdata['address'];
        $email = $customerdata['email'];
        $website = $customerdata['website'];
        $gender = $customerdata['gender'];
        $comment = $customerdata['comment'];
        $hidden = $customerdata['hidden'];
        $type = $customerdata['type'];
        if($hidden == 0){
            $hidden = 0;
        }else{
            $hidden = 1;
        }
	
	global $pdo;
	if(!customer_exists($id)){
		$pdo->query("
			INSERT INTO customers (phone_number, acc_username, first_name, last_name, city, address, post_code, email, website, gender, comment, hidden, type) VALUES
			('$phone_number', '$acc_username', '$first_name', '$last_name', '$city', '$address', '$post_code', '$email', '$website', '$gender', '$comment', '$hidden', '$type');
		");
                $id = $pdo->lastInsertId();
	}else{
            $pdo->query("
            UPDATE customers
            SET phone_number='$phone_number', acc_username= '$acc_username', first_name='$first_name', last_name='$last_name', city='$city', address='$address', post_code='$post_code', email='$email', website='$website', gender='$gender', comment='$comment', hidden='$hidden', type='$type' 
            WHERE id ='$id';
        ");
	}
        return $id;
}

function update_customer($customerdata){
    add_customer($customerdata);
}

function delete_customer($id){
	if(!customer_exists($id)){
		return;
	}
	global $pdo;
	$pdo->query("
		DELETE FROM customers
		WHERE id = '$id';
	");
}

function get_customer_edit_url($id){
    return home_url("edit-crm?id=$id");
}

function get_customer_hide_url($id){
    return home_url("crm?action=hide&id=$id");
}

function get_customer_unhide_url($id){
    return home_url("crm?action=unhide&id=$id");
}

function get_customer_delete_url($id){
    return home_url("crm?action=delete&id=$id");
}

function hide_customer($id){
    $customer = get_customer_by_id($id);
    if(!$customer){
        return;
    }
    $customer['hidden'] = 1;
    update_customer($customer);
}

function unhide_customer($id){
    $customer = get_customer_by_id($id);
    if(!$customer){
        return;
    }
    $customer['hidden'] = 0;
    update_customer($customer);
}

function search_customers($search, $include_hidden = false){
    global $pdo;
    if($include_hidden){
    $result = $pdo->query("
            SELECT * FROM customers
            WHERE first_name LIKE '%$search%'
        ");
    $customers = array();
    while($row = $result->fetch(PDO::FETCH_ASSOC)){
        $customers[] = $row;
    }
    
    return $customers;
    } else {
        $result = $pdo->query("
            SELECT * FROM customers
            WHERE first_name LIKE '%$search%' and hidden=0
        ");
    $customers = array();
    while($row = $result->fetch(PDO::FETCH_ASSOC)){
        $customers[] = $row;
    }
    
    return $customers;
    }
}