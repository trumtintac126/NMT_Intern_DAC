<?php

    session_start();
    if(!isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] !== true){
        header("location: login.php");
    }
    
    require_once "config.php";
    
    $emailErr = $passwordErr = $genderErr = $first_nameErr = $last_nameErr = $addressErr = "";
    $email = $password = $first_name = $last_name = $gender = $address ="";
    
    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    if(isset($_POST["id"]) && !empty($_POST["id"])){
        
        $id = $_POST["id"];
        
        
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

        if (empty($_POST["first_name"])) {
            $first_name = "";
        } else {
            $first_name = test_input($_POST["first_name"]);
            if (!preg_match("/^[a-zA-Z ]*$/",$first_name)) {
                $first_nameErr = "Only letters and white space allowed"; 
                }
        }
            
        if (empty($_POST["last_name"])) {
            $last_name = "";
        } else {
            $last_name = test_input($_POST["last_name"]);
            if (!preg_match("/^[a-zA-Z ]*$/",$last_name)) {
                $last_nameErr = "Only letters and white space allowed"; 
                }
            
        }

        if (empty($_POST["gender"])) {
            $genderErr = "Gender must check";
        } else {
            $gender = test_input($_POST["gender"]);
        }
        if (empty($_POST["address"])) {
            $address = "";
        } else {
            $address = test_input($_POST["address"]);
        }
               
        if(empty($emailErr) && empty($passwordErr) && empty($genderErr)){
            
            $sql = "UPDATE customers SET email=?, password=?, first_name=?, last_name=?, gender=?, address=? WHERE id=?";
            
            if($stmt = $conn ->prepare($sql)){
                                
                $stmt ->bind_param("ssssssi",$param_email, $param_password, $param_firstname, $param_lastname, $param_gender, $param_address, $param_id);
                
                $param_email = $email;
                $param_password = $password;
                $param_firstname = $first_name;
                $param_lastname = $last_name;
                $param_gender = $gender;
                $param_address = $address;
                $param_id = $id;
                
                if($stmt ->execute()){
                    header("location: index.php");
                    exit();
                } else{
                    echo "Something went wrong. Please try again later.";
                }
            }
            
            $stmt ->close();
        }
        
        $conn ->close();
    } else{
        if(isset($_GET["id"]) && !empty(trim($_GET["id"]))){

            $id =  trim($_GET["id"]);
            
            $sql = "SELECT * FROM customers WHERE id = ?";
            if($stmt = $conn->prepare($sql)){

                $stmt ->bind_param("i",$param_id);
                
                $param_id = $id;
                
                if($stmt ->execute()){

                    $result = $stmt ->get_result();
        
                    if($result ->num_rows ==1){

                        $row = $result ->fetch_array(MYSQLI_ASSOC);
                        
                        $email = $row["email"];
                        $password = $row["password"];
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
            
            $conn ->close();
        }  else{
            header("location: error.php");
            exit();
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update Record</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <link href="./css/style.css" rel="stylesheet" media="screen">
</head>
<body>
    <div class="wrapper-add">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-offset-2 col-md-8">
                    <div class="page-header">
                        <h2>Update Record</h2>
                    </div>
                    <p>Please edit the input values and submit to update the record.</p>
                    <form action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>" method="post">
                    <div class="form-group <?php echo (!empty($emailErr)) ? 'has-error' : ''; ?>">
                            <label>Email</label>
                            <input type="text" name="email" class="form-control" value="<?php echo $email; ?>">
                            <span class="help-block"><?php echo $emailErr;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($passwordErr)) ? 'has-error' : ''; ?>">
                            <label>Password</label>
                            <input type="password" name="password" class="form-control" value="<?php echo $password; ?>">
                            <span class="help-block"><?php echo $passwordErr;?></span>
                        </div>
                        <div class="form-group">
                            <label>First Name</label>
                            <input type="text" name="first_name" class="form-control" value="<?php echo $first_name; ?>">
                        </div>
                        <div class="form-group">
                            <label>Last Name</label>
                            <input type="text" name="last_name" class="form-control" value="<?php echo $last_name; ?>">
                        </div>
                        <div class="form-group">
                            <label>Gender</label>
                            <input type="radio" name="gender" <?php if (isset($gender) && $gender=="female") echo "checked";?> value="female"> Female 
                            <input type="radio" name="gender" <?php if (isset($gender) && $gender=="male") echo "checked";?> value="male"> Male 
                            <input type="radio" name="gender" <?php if (isset($gender) && $gender=="other") echo "checked";?> value="other"> Other
                        </div>
                        <div class="form-group">
                            <label>Address</label>
                            <input type="text" name="address" class="form-control" value="<?php echo $address; ?>">
                        </div>
                        <input type="hidden" name="id" value="<?php echo $id; ?>"/>
                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="index.php" class="btn btn-default">Cancel</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>
</html>