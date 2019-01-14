<?php

require('../model/connect.php');
require('../model/group_db.php');
require('../model/user_db.php');
require('../model/group-users_db.php');

if (isset($_POST["action"])) {
    $action = $_POST['action'];
} else if (isset($_GET['action'])) {
    $action = $_GET['action'];
} else {
    $action = 'showproduct';
}

switch ($action) {
     case 'group_list':
        $groups = getAllGroup();
        include '../view/group-management.php';
        break;
    case 'add':
    	$name = $_POST["name"];
    	addGroup($name);
    	phpAlert("Bạn đã thêm thành công");
    	$categories = getAllGroup();
        header("location:" ."../controller/index_group.php?action=group_list");
    	break;
    case 'update':
    	$id = $_POST["id"];
    	$name = $_POST["name"];
    	$status = $_POST["stauts"];
    	updateGroup($id,$name,$status);
    	phpAlert("Bạn đã chỉnh sửa thành công");
        $categories = getAllGroup();
        header("location:" ."../controller/index_group.php?action=group_list");
        break;
    case 'group_info':
    	$id = $_GET['id'];
        $group = getGroupById($id);
        $userInfoByGroup = getUserByGroup($id);
        $usernogroup = getAllUserGroupNull();      
    	include '../view/group-info.php';
        break;
    case 'update_group_info':

        if(isset($_POST['useringroup']))
        {
            foreach($_POST['useringroup'] as $value){

                $id = $value;
                $group_id = $_POST["id"];
                updateGroupUsers($id,$group_id);
            }
        }
        header("location:" ."../controller/index_group.php?action=group_list");
        break;
}
?>