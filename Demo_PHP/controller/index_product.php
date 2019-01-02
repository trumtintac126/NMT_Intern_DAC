<?php

require('../model/connect.php');
require('../model/product_db.php');
require('../model/category_db.php');

if (isset($_POST["action"])) {
    $action = $_POST['action'];
} else if (isset($_GET['action'])) {
    $action = $_GET['action'];
} else {
    $action = 'showproduct';
}
switch ($action) {
     case 'product_list':
        $products = getAllProduct();
        $categories = getAllCategory();
        include '../view/product-management.php';
        break;
    case 'product_info':
    	$id = $_GET['id'];
    	$product = getProductById($id);
        $categories = getAllCategory_1($product['Category_id']);
    	include '../view/product-info.php';
        break;
    case 'update_info':
        $id = $_POST["id"];
        $categoryId = $_POST["category_id"];
        $name = $_POST["name"];
        $description = $_POST["description"];
        $status = $_POST["status"];
        $price = $_POST["price"];
        $quantity = $_POST["quantity"];
        
        if (!empty($_FILES['file1']['tmp_name'])) {
            $tmp_name = $_FILES['file1']['tmp_name'];
            $path = "../view/images";
            $user_file = $_FILES['file1']['name'];
            $timestamp = date("Y") . date("m") . date("d") . date("h") . date("i") . date("s");
            $name1 = $path . DIRECTORY_SEPARATOR .
                    $timestamp . $user_file;
            $success = move_uploaded_file($tmp_name, $name1);
            if ($success) {
                $image_info = getimagesize($name1); 
            }
            $image = $timestamp . $user_file;
        } else {
            $product = getProductById($id);
            $image = $product['Image'];
        }
        updateProductInfo($id,$categoryId,$name,$description,$status,$price,$quantity,$image);
        $product = getProductById($id);
        $categories = getAllCategory_1($product['Category_id']);
        phpAlert("Bạn đã cập nhật thành công");
        header("location:" ."../controller/index_product.php?action=product_list");
        break;
    case 'delete':
        $id = $_GET["id"];
        deleteProduct($id);
        phpAlert("Bạn đã xóa thành công");
        $products = getAllProduct();
        include '../view/product-management.php';
        break;
    case 'creationForm':
        $categories = getAllCategory();
        include '../view/product-creation-form.php';
        break;
    case 'add_new_product':
        $categoryId = $_POST["category_id"];
        $name = $_POST["name"];
        $description = $_POST["description"];
        $price = $_POST["price"];
        $quantity = $_POST["quantity"];
        $status = 1;
        //upload image
        if (!empty($_FILES['file1']['tmp_name'])) {
            $tmp_name = $_FILES['file1']['tmp_name'];
            $path = "../view/images";
            $user_file = $_FILES['file1']['name'];
            $timestamp = date("Y") . date("m") . date("d") . date("h") . date("i") . date("s");
            $name1 = $path . DIRECTORY_SEPARATOR .
                    $timestamp . $user_file;
            $success = move_uploaded_file($tmp_name, $name1);
            if ($success) {
                $image_info = getimagesize($name1);//get info image
            }
            $image = $timestamp . $user_file;
        } else {
            $image = '94621052018.jpg';
        }

        addProduct($categoryId,$name,$description,$price,$quantity,$image,$status);
        phpAlert("Thêm thành công");
        $products = getAllProduct();
        include '../view/product-management.php';
        break;
    case 'active':
        break;
    case 'search':
        break;
}
?>