<?php

function getTotalRecord(){
    global $db;
    $sql = 'SELECT count(p.Id) as total from products as p join users as u on u.Id = p.User_id 
    join categories as c on c.Id = p.Category_id
    join groups as g on g.Id = p.Group_id
    ORDER BY p.Id DESC';
    $query = $db->query($sql);
    $result = $query->fetch();

    $total_records = $result['total'];

    $limit = 5;

    $total_page = ceil($total_records / $limit);
    
    return $total_page;
}

function getPage(){

    global $db;
    $sql = 'SELECT count(p.Id) as total from products as p join users as u on u.Id = p.User_id 
    join categories as c on c.Id = p.Category_id
    join groups as g on g.Id = p.Group_id
    ORDER BY p.Id DESC';
    $query = $db->query($sql);
    $result = $query->fetch();

    $total_records = $result['total'];

    $limit = 5;

    $total_page = ceil($total_records / $limit);

    $current_page = isset($_GET['page']) ? $_GET['page'] : 1;

    if ($current_page > $total_page){
        $current_page = $total_page;
    }
    else if ($current_page < 1){
        $current_page = 1;
    }

    $start = ($current_page - 1) * $limit;

    return $start;
}

function getAll(){

    global $db;
    $sql = 'SELECT count(p.Id) as total from products as p join users as u on u.Id = p.User_id 
    join categories as c on c.Id = p.Category_id
    join groups as g on g.Id = p.Group_id
    ORDER BY p.Id DESC';
    $query = $db->query($sql);
    $result = $query->fetch();

    $total_records = $result['total'];
   
    $limit = 5;

    $total_page = ceil($total_records / $limit);

    $current_page = isset($_GET['page']) ? $_GET['page'] : 1;

    if ($current_page > $total_page){
        $current_page = $total_page;
    }
    else if ($current_page < 1){
        $current_page = 1;
    }

    $start = ($current_page - 1) * $limit;

    $sql = "SELECT p.*,u.FullName,c.Name as CategoryName,g.Name as GroupName FROM products as p join users as u on u.Id = p.User_id 
    join categories as c on c.Id = p.Category_id
    join groups as g on g.Id = p.Group_id  
    LIMIT $start, $limit ";

    $result = $db->query($sql);
    return $result;

}

function getProductById($id){
    global $db;
    $sql ="SELECT * FROM products WHERE Id ='$id'";
    $query = $db->query($sql);
    $result = $query->fetch();
    return $result;
}

function updateProductInfo($id,$categoryId,$name,$description,$status,$price,$quantity,$image){
    global $db;
    $query = "UPDATE products SET
              Category_id ='$categoryId', 
              Name ='$name',
              Description ='$description',	
              Status ='$status',
              Price ='$price',
              Quantity ='$quantity',
              Image = '$image'
            WHERE Id='$id'";
    $db->exec($query);
}

function ativeProduct($id) {
    global $db;
    $query = "UPDATE products SET Status = 0 WHERE Id ='$id'";
    $db->exec($query);
}
function nonAtiveProduct($id) {
    global $db;
    $query = "UPDATE products SET Status = 1 WHERE Id ='$id'";
    $db->exec($query);
}

function addProduct($categoryId,$name,$description,$price,$quantity,$image, $status,$user_id,$group_id){
    global $db;
    try {
        $query = "INSERT INTO products(Category_id,Name,Description,Price,Quantity,Image,Status,User_Id,Group_id)
                VALUES (:categoryId, :name, :description, :price, :quantity, :image, :status, :user_id, :group_id)";
        $stmt = $db->prepare($query);
        $stmt->bindParam(':categoryId', $categoryId);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':price', $price);
        $stmt->bindParam(':quantity', $quantity);
        $stmt->bindParam(':image', $image);
        $stmt->bindParam(':status', $status);
        $stmt->bindParam(':user_id', $user_id);
        $stmt->bindParam(':group_id', $group_id);
        return $stmt->execute();

    } catch (\Exception $e) {
        throw $e;
    }
}
?>
