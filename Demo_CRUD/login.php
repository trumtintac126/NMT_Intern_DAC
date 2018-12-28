<?php
    
    session_start();

    if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
        header("location: index.php");
        exit;
    }


    require_once "config.php";
    
    $email = $password = "";
    $emailErr = $passwordErr = "";
    
    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    if($_SERVER["REQUEST_METHOD"] == "POST"){
    
        if (empty($_POST["password"])) {
            $passwordErr = "You must enter Password";
        } else {
            $password = test_input($_POST["password"]);
        }
        
        if (empty($_POST["email"])) {
            $emailErr = "Email must enter";
        } else {
            $email = test_input($_POST["email"]);
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid email format"; 
            }
        }

        if(!empty($email) && !empty($password)){

            $sql = "SELECT id, email, password FROM customers WHERE email = ?";
            
            if($stmt = $conn->prepare($sql)){

                $stmt ->bind_param("s",$param_email);

                $param_email = $email;
                
                if($stmt->execute()){

                    $stmt->store_result();

                    if($stmt->num_rows == 1){ 
                        
                        echo "Login success";

                        $stmt->bind_result($id, $email, $password);

                        session_start();
                            
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["email"] = $email;  

                        header("location:" ."index.php");

                    } else{
                        $emailErr = "No account found with that username.";
                    }
                } else{
                    echo "Oops! Something went wrong. Please try again later.";
                }
            }
            
            $stmt->close();
        }
        
        $conn ->close();
    }
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <link href="./css/style.css" rel="stylesheet" media="screen">
</head>
<body>
    <div class="wrapper-add">
        <div class ="row">
            <div class = "col-md-offset-2 col-md-8">
                <h2>Login</h2>
                <p>Please fill in your credentials to login.</p>
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                    <div class="form-group">
                        <label>Email</label>
                        <input type="text" name="email" class="form-control" value="<?php echo $email; ?>">
                        <span class="help-block"><?php echo $emailErr; ?></span>
                    </div>    
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="password" class="form-control">
                        <span class="help-block"><?php echo $passwordErr; ?></span>
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" value="Login">
                    </div>
                    <p>Don't have an account? <a href="add.php">Sign up now</a>.</p>
                </form>
            </div>
        </div>
    </div>    
</body>
</html>