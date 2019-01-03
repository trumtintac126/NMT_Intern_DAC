<?php 
function getAllRole(){
    global $db;
    $sql = 'SELECT * FROM roles ORDER BY Id DESC';
    $result = $db->query($sql);
    return $result;
}
?>