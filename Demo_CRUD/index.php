<?php
    session_start();
    require_once "config.php";
    $sql = "SELECT * FROM customers";
    if($result = $conn->query($sql)){

    }
    $conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Index</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.js"></script>
    <link href="./css/style.css" rel="stylesheet" media="screen">
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-offset-2 col-md-8">
                    <div class="page-header clearfix">
                        <h2>Hello <?php echo $_SESSION["email"]; ?> </h2>
                        <h2 class="pull-left">Employees Details</h2> <span></span>
                        <a href="add.php" class="btn btn-success pull-right">Add New Employee</a>
                    </div>
                        <table class='table table-bordered table-striped'>
                                <?php if($result ->num_rows >0 ) { ?>
                                <thead>
                                   <tr>
                                       <th>ID</th>
                                        <th>Email</th>
                                        <th>First_name</th>
                                        <th>Last_Name</th>
                                        <th>Gender</th>
                                        <th>Addess</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <?php }else { ?>
                                <?php 
                                    echo "<h2>No record in table</h2>";
                                } ?>
                                <tbody>
                                <?php while($row = mysqli_fetch_array($result)){ ?>
                                   <tr>

                                        <td> <?php echo $row["id"]; ?> </td>
                                        <td> <?php echo $row["email"]; ?> </td>
                                        <td> <?php echo $row["first_name"]; ?></td>
                                        <td> <?php echo $row["last_name"]; ?></td>
                                        <td> <?php echo $row["gender"]; ?></td>
                                        <td> <?php echo $row["address"]; ?></td>
                                        <td>
                                            <?php echo "<a href='view.php?id=". $row['id'] ."' title='View Record' data-toggle='tooltip'><span class='glyphicon glyphicon-eye-open'></span></a>"; ?>
                                            <?php echo "<a href='update.php?id=". $row['id'] ."' title='Update Record' data-toggle='tooltip'><span class='glyphicon glyphicon-pencil'></span></a>"; ?>
                                            <?php echo "<a href='delete.php?id=". $row['id'] ."' title='Delete Record' data-toggle='tooltip'><span class='glyphicon glyphicon-trash'></span></a>"; ?>
                                        </td>
                                    </tr>
                                <?php } ?>
                                
                                </tbody>                            
                        </table>                      
                </div>
                <?php $result->close(); ?>  
            </div>        
        </div>
    </div>
</body>
</html>