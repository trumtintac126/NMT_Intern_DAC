<?php

require('../model/connect.php');
require('../model/user_db.php');
require('../model/role_db.php');
require('../model/group_db.php');

if (isset($_POST["action"])) {
    $action = $_POST['action'];
} else if (isset($_GET['action'])) {
    $action = $_GET['action'];
} else {
    $action = 'showproduct';
}
 
switch ($action) {
    case 'check_login':
        $email = $_POST["email"];
        $password = $_POST["password"];
        $result = getUser($email, $password);
        if (!empty($result)) {

            session_start();
            $_SESSION['email'] = $email;
            $_SESSION["loggedin"] = true;
            header("location: ../view/home.php");
        } else {
            phpAlert('Sai Tên Đăng Nhập hoặc Mật Khẩu');
            include '../view/login.php';
        }
        break;
    case 'logout':
        session_start();
        session_destroy();
        include '../view/login.php';
        phpAlert('Bạn đã đăng xuất thành công');
        break;
     case 'user_list':
        $users = getAllUser();
        include '../view/user-management.php';
        break;
    case 'user_info':
        $id = $_GET["id"];
        $user = getUserById($id);
        include '../view/user-info.php';
        break;
    case 'update_info':
        $id = $_POST["id"];
        $email = $_POST["email"];
        // $role = $_POST["role_id"];
        $fullname = $_POST["fullname"];
        $status = $_POST["status"];

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
            $avatar = $timestamp . $user_file;
            } else {
                $avatar = '94621052018.jpg';
            }
        $modified = date("Y") . date("m") . date("d");

        updateUser($id,$fullname,$modified,$status,$avatar);
        $user = getUserById($id);
        phpAlert("Bạn đã cập nhật thành công");
        header("location:" ."../controller/index_user.php?action=user_list");
        break;       
    case 'creationForm':
        $roles = getAllRole();
        $groups = getAllGroup(); 
        include '../view/user-creation-form.php';
        break;
    case 'add_new_user':
        if(empty(getEmailByUser($_POST["email"]))){
            $email = $_POST["email"];
            $password = $_POST["password"];
            // $role = $_POST["role_id"];
            $fullname = $_POST["fullname"];
            $status = 1;

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
                $avatar = $timestamp . $user_file;
            } else {
                $avatar = '94621052018.jpg';
            }
            $created = date("Y") . date("m") . date("d");
            addUser($email,$password,$created,$avatar,$status,$fullname);
            phpAlert("Bạn đã thêm thành công");
            $users = getAllUser();
            include '../view/user-management.php';        
        }else{
            phpAlert("Email đã tồn tại");
            include '../view/user-creation-form.php';
        }               
        break;
}
?>