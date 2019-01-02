<?php
	function getUser($email,$pass){
	    global $db;
	    $sql = "SELECT * FROM users WHERE Email ='$email' AND Password ='$pass'";
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
?>

