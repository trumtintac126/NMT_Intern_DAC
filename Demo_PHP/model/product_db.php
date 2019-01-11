<?php

function getAllProduct(){
    global $db;
    $sql = "SELECT p.*,u.FullName,c.Name as CategoryName,g.Name as GroupName FROM products as p join users as u on u.Id = p.User_id 
            join categories as c on c.Id = p.Category_id
            join groups as g on g.Id = p.Group_id          
            ORDER BY g.Id DESC";
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
