<?php

	function getAllCategory(){
	    global $db;
	    $sql = 'SELECT * FROM categories ORDER BY Id DESC';
	    $result = $db->query($sql);
	    return $result;
	}

	// function getCategoryById($id){
	// 	global $db;
	// 	$sql ="SELECT * FROM categories WHERE Id ='$id'";
	// 	$query = $db->query($sql);
	//     $result = $query->fetch();
	//     return $result;
	// }

	// /*Lấy tên nsp và sắp xếp với tên sắp xếp đầu tiên là tên mong muốn */
	// function getAllCategory_1($id){
    // 	global $db;
    // 	$query = "SELECT * FROM categories 
   	// 		ORDER BY
    //         (CASE Id WHEN '$id'  THEN 1 ELSE 100 END) ASC, id DESC";
    // 	$result = $db->query($query);
    // 	return $result;
	// }

	function addCategory($name){
		global $db;
    	$query = "INSERT INTO categories(Name,Status) VALUE('$name',1)";
    	$db->exec($query);
	}

	function updateCategory($id,$name,$stauts){
		global $db;
    	$query = "UPDATE categories SET
              	Name ='$name',
              	Status = '$stauts'
            	WHERE Id='$id'";
    	$db->exec($query);
	}

?>

