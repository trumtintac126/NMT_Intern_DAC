<?php

require('../model/connect.php');
require('../model/group_db.php');

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
        include '../view/group-management.php';
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
    	include '../view/group-info.php';
        break;
}
?>