<?php 
    function addGroupUsers($user_Id,$group_Id,$role_Id){
        global $db;
        $query = "INSERT INTO group_users (User_Id,Group_Id,Role_Id) VALUE('$user_Id','$group_Id','$role_Id')";
        $db->exec($query);
    }

    function addRoleUser($user_Id,$role_Id){
        global $db;
        $query = "INSERT INTO group_users (User_Id,Role_Id) VALUE('$user_Id','$role_Id')";
        $db->exec($query);
    }

    function updateGroupUsers($user_Id,$group_Id){
		global $db;
    	$query = "UPDATE group_users SET
              	Group_Id = '$group_Id'
                WHERE User_Id = '$user_Id' ";
                
    	$db->exec($query);
	}
?>