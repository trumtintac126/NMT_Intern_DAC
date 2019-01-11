<?php

require('../model/connect.php');
require('../model/category_db.php');

if (isset($_POST["action"])) {
    $action = $_POST['action'];
} else if (isset($_GET['action'])) {
    $action = $_GET['action'];
} else {
    $action = 'showproduct';
}

switch ($action) {
     case 'category_list':
        $categories = getAllCategory();
        include '../view/category-management.php';
        break;
    case 'add':
    	$name = $_POST["name"];
    	addCategory($name);
    	phpAlert("Bạn đã thêm thành công");
    	$categories = getAllCategory();
        include '../view/category-management.php';
    	break;
    case 'update':
    	$id = $_POST["id"];
    	$name = $_POST["name"];
    	$status = $_POST["stauts"];
    	updateCategory($id,$name,$status);
    	$categories = getAllCategory();
        include '../view/category-management.php';
    	break;
}
?>