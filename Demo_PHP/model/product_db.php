<?php

function getAllProduct(){
    global $db;
    $sql = 'SELECT * FROM products ORDER BY Id DESC';
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

function deleteProduct($id) {
global $db;
$query = "UPDATE products SET Status = '0' WHERE Id ='$id'";
$db->exec($query);
}

function addProduct($categoryId,$name,$description,$price,$quantity,$image, $status){
global $db;
$query = "INSERT INTO products(Category_id,Name,Description,Price,Quantity,Image,Status) 
    VALUE('$categoryId','$name','$description','$price','$quantity','$image','$status')";
$db->exec($query);
}

function searchProductAjax($keyword){
global $db;
$sql ="SELECT * FROM products WHERE name like '%".$keyword."%'";
$result = $db->query($sql);
return $result;
}

?>
