<?php
	function getUser($email,$pass){
	    global $db;
	    $sql = "SELECT * FROM users WHERE Email ='$email' AND Password ='$pass'";
	    $query = $db->query($sql);
	    $result = $query->fetch();
	    return $result;
	}

	function getEmailByUser($email){
	    global $db;
	    $sql = "SELECT Id FROM users WHERE Email ='$email'";
	    $query = $db->query($sql);
	    $result = $query->fetch();
	    return $result;
	}

	function getAllUser(){
	    global $db;
	    $sql = 'SELECT * FROM users ORDER BY Id DESC';
	    $result = $db->query($sql);
	    return $result;
	}


	function getIdByEmail($email){
		global $db;
		$sql ="SELECT Id FROM users WHERE Email ='$email'";
		$result = $db->query($sql);
	    return $result;
	}

	function getUserById($id){
		global $db;
		$sql ="SELECT * FROM users WHERE id ='$id'";
		$query = $db->query($sql);
	    $result = $query->fetch();
	    return $result;
	}

	function updateUser($id,$fullname,$modified,$status,$avatar){
		global $db;
    	$query = "UPDATE users SET
              	Fullname ='$fullname', 
              	Modified ='$modified',
            	Status = '$status',
				Avatar = '$avatar'
            	WHERE Id='$id'";
    	$db->exec($query);
	}

	function addUser($email,$password,$created,$avatar,$status,$fullname){
		global $db;
		$query = "INSERT INTO users(Email,Password,Created,Avatar,Status,Fullname) VALUE('$email','$password','$created','$avatar','$status','$fullname')";
		$db->exec($query);
	}

?>

