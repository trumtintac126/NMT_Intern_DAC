<?php
    if(isset($_POST["id"]) && !empty($_POST["id"])){


        require_once "config.php";
        
        $sql = "DELETE FROM customers WHERE id = ?";
        
        if($stmt = $conn->prepare($sql)){

            $stmt ->bind_param("i", $param_id);
            
            $param_id = trim($_POST["id"]);
            
            if($stmt ->execute()){
                header("location: index.php");
                exit();
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
            
        }
        
        $stmt ->close();

        $conn ->close();
    } else{
        if(empty(trim($_GET["id"]))){
            header("location: error.php");
            exit();
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Delete customer </title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <link href="./css/style.css" rel="stylesheet" media="screen">
</head>
<body>
    <div class="wrapper-add">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <h1>Delete Customer</h1>
                    </div>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="alert alert-danger fade in">
                            <input type="hidden" name="id" value="<?php echo trim($_GET["id"]); ?>"/>
                            <p>Are you sure you want to delete this record?</p><br>
                            <p>
                                <input type="submit" value="Yes" class="btn btn-danger">
                                <a href="index.php" class="btn btn-default">No</a>
                            </p>
                        </div>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>