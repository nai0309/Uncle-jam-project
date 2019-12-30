<?php
session_start();
$db=new PDO("mysql:host=127.0.0.1;dbname=uncle_jam;charset=utf8","root","");
$sql="SELECT * FROM product WHERE 1";
$rows = $db->query($sql)->fetchAll();
foreach($rows as $row){
    echo json_encode($row);
}

?>