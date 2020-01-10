<?php
// session_start();
// $db=new PDO("mysql:host=127.0.0.1;dbname=uncle_jam;charset=utf8","root","");
// $sql="SELECT * FROM product WHERE 1";
// $rows = $db->query($sql)->fetchAll();
// foreach($rows as $row){
//     echo json_encode($row);
// }


//sign.php
require_once('sqlcode.php');

if(isset($_POST['type'])){
    $sql_type = $_POST['type'];
}else{
    $sql_type = 'login';
}

if($sql_type =='signup'){
    $CHECK_TYPE = FALSE;
    if(isset($_POST['account'])){
        $insert_data['account'] = $_POST['account'];
    }else{
        $insert_data['account'] = '';
        $CHECK_TYPE = TRUE;
    }


    IF($CHECK_TYPE){
        
    }
    $tablename = 'member';
    $feild = ['account','name'];
    insert($tablename,$field,$insert_data);
}else{
    select($tablename,$field,$insert_data);
}



//sqlcode.php
$column_text = '';
$insert_text = '';
foreach($field as $data){
    $column_text .= '`'.$data.'`,';
    $insert_text .= ':'.$data.',';
}

$column_text = substr($column_text,0,-1);
$insert_text = substr($column_text,0,-1);


$sql = "INSERT INTO ".$tablename." (".$column_text.") VALUES(".$insert_text.")";
$sth = $db->prepare($sql);
$sth->execute($insert_data);
