<?php 

function add_option($option_name, $option_value = null){
	if(!$option_name){
		return;
	}
	
	if(!$option_value){
		$option_value = '0';
	}
	
	if(!option_exists($option_name)){
		global $pdo;
		$pdo->query("
			INSERT INTO options (option_name, option_value) VALUES
			('$option_name', '$option_value');
		");
	}else{
		$pdo->query("
			UPDATE options
			SET option_value = '$option_value'
			WHERE option_name = '$option_name'
		");
	}
}

function option_exists($option_name){
	$row = get_option($option_name, true);
	return isset($row['id']);
}

function get_option($option_name, $full_row = false){
	if(!$option_name){
		return null;
	}
	global $pdo;
	$result = $pdo->query("
		SELECT *
		FROM options
		WHERE option_name = '$option_name'
	");
	
	$row = $result->fetch(PDO::FETCH_ASSOC);
	if($row){
		if($full_row){
			return $row;
		}else{
			return $row['option_value'];
		}
	}else{
		return null;
	}
}

function update_option($option_name, $option_value){
	add_option($option_name, $option_value);
}

function delete_option($option_name){
	global $pdo;
	$pdo->query("
		DELETE FROM options
		WHERE option_name = '$option_name'
	");
}