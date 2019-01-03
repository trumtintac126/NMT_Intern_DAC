<?php 
function getAllGroup(){
    global $db;
    $sql = 'SELECT * FROM groups ORDER BY Id DESC';
    $result = $db->query($sql);
    return $result;
}
?>