<?php

require('../model/connect.php');
require('../model/user_db.php');

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
}
?>