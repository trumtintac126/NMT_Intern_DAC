<?php
    session_start();
    if(!isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] !== true){
        header("location: login.php");
    }
    require_once "config.php";

    if(isset($_GET["id"]) && !empty(trim($_GET["id"]))){

                
        $sql = "SELECT * FROM customers WHERE id = ?";
        
        if($stmt = $conn->prepare($sql)){

            $stmt ->bind_param("i",$param_id);
            
            $param_id = trim($_GET["id"]);
            
            if($stmt->execute()){

                $result = $stmt ->get_result();
                
                if($result ->num_rows ==1){
                  
                    $row = $result ->fetch_array(MYSQLI_ASSOC);
                    
                    $email = $row["email"];
                    $first_name = $row["first_name"];
                    $last_name = $row["last_name"];
                    $gender = $row["gender"];
                    $address = $row["address"];
                } else{
                    header("location: error.php");
                    exit();
                }
                
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
        
        $stmt ->close();
        
        $conn->close();
    } else{
        header("location: error.php");
        exit();
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>View Customer</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <link href="./css/style.css" rel="stylesheet" media="screen">
</head>
<body>
    <div class="wrapper-add">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <h1>View Customer ID = <?php echo trim($_GET["id"]); ?></h1>
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <p class="form-control-static"><?php echo $row["email"]; ?></p>
                    </div>
                    <div class="form-group">
                        <label>First_name</label>
                        <p class="form-control-static"><?php echo $row["first_name"]; ?></p>
                    </div>
                    <div class="form-group">
                        <label>Last_Name</label>
                        <p class="form-control-static"><?php echo $row["last_name"]; ?></p>
                    </div>
                    <div class="form-group">
                        <label>Gender</label>
                        <p class="form-control-static"><?php echo $row["gender"]; ?></p>
                    </div>
                    <div class="form-group">
                        <label>Address</label>
                        <p class="form-control-static"><?php echo $row["address"]; ?></p>
                    </div>
                    <p><a href="index.php" class="btn btn-primary">Back</a></p>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>