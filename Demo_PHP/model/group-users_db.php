<?php 
    function addGroupUsers($user_Id,$group_Id,$role_Id){
        global $db;
        $query = "INSERT INTO group_users (User_Id,Group_Id,Role_Id) VALUE('$user_Id','$group_Id','$role_Id')";
        $db->exec($query);
    }
?>