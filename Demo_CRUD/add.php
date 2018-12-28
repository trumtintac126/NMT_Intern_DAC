<?php
  
    require_once "config.php";

    $emailErr = $passwordErr = $genderErr = $first_nameErr = $last_nameErr = $addressErr = "";
    $email = $password = $first_name = $last_name = $gender = $address ="";
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        
        if (empty($_POST["password"])) {
            $passwordErr = "You must enter Password";
        } else {
            $password = test_input($_POST["password"]);
        }
        
        if (empty($_POST["email"])) {
            $emailErr = "Email must enter";
        } else {
            $sql = "SELECT id from customers where email =?";

            if($stmt = $conn->prepare($sql)){

                $stmt ->bind_param("s",$param_email);

                $param_email = test_input($_POST["email"]);

                if($stmt ->execute()){

                    $stmt->store_result();

                    if($stmt->num_rows == 1){

                        $emailErr = "This username is already taken.";
                    }else{

                        $email = test_input($_POST["email"]);
                        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                            $emailErr = "Invalid email format"; 
                            }
                    }
                }else{
                    echo "Oops! Something went wrong. Please try again later.";
                }
            }
            $stmt ->close();           
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
    }
        
    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }



    if(!empty($email) && !empty($password)){

        $sql = "INSERT INTO customers (email, password, first_name, last_name, gender, address) VALUES (?, ?, ?, ?, ?, ?)";
        
        if($stmt = $conn ->prepare($sql)){
            $stmt ->bind_param("ssssss",$param_email, $param_password, $param_firstname, $param_lastname, $param_gender, $param_address);

            $param_email = $email;
            $param_password = $password;
            $param_firstname = $first_name;
            $param_lastname = $last_name;
            $param_gender = $gender;
            $param_address = $address;

            if($stmt->execute()){
                header("location:" ."index.php");
                exit();
            }else{
                echo "Something went wrong. Please try again later.";
            }
        }
        $stmt ->close();
    }
    $conn->close();
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add customers</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <script>
      function callback(){
          history.back();
      }
  </script>
</head>
<body>
    <div class="wrapper-add">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-offset-2 col-md-8">
                    <div class="page-header">
                        <h2>Add record</h2>
                    </div>
                    <p>Please fill this form and submit to add customer record to the database.</p>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
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
                        <input type="submit" class="btn btn-primary" value="Submit">
                        <button type="button" class="btn btn-danger" onclick="callback()">Cancel</button>                       
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>