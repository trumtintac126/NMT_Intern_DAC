<?php
    $dsn = 'mysql:host=localhost;dbname=php_demo';
    $username = 'root';
    $password = '';
    try {
        $options = array(
            PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        );
        $db = new PDO($dsn, $username, $password, $options);
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        include('database_error.php');
        exit();
    }
    function phpAlert($msg)	{
        echo '<script type="text/javascript">alert("' . $msg . '")</script>';
    }
?>