<?php
// session_start();
$db = new PDO("mysql:host=127.0.0.1;dbname=s1080412;charset=utf8", "root", "");
// $db = new PDO("mysql:host=localhost;dbname=s1080412;charset=utf8", "s1080412", "s1080412");
date_default_timezone_set('Asia/Taipei');
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 

//select SQL 陣列
// select(要查的資料表名稱,要查的資料表欄位,要查的條件)
function select($tablename, $field, $select_data)
{ // 每個function是獨立的世界
    global $db; //透過 global把 $db宣告進此 function的世界
    $column_text = '';
    foreach ($field as $data) {
        $column_text .= ' AND ' . $data . ' =:' . $data;
    }

    $list = $db->prepare("SELECT * FROM " . $tablename . " WHERE 1 " . $column_text);
    $list->execute($select_data);
    return $list->fetchAll();
};

function selectsingle($tablename, $field, $select_data)
{ // 每個function是獨立的世界
    global $db; //透過 global把 $db宣告進此 function的世界
    $column_text = '';
    foreach ($field as $data) {
        $column_text .= ' AND ' . $data . ' =:' . $data;
    }

    $list = $db->prepare("SELECT * FROM " . $tablename . " WHERE 1 " . $column_text);
    $list->execute($select_data);
    return $list->fetch();
};

//insert SQL
function insert($tablename, $field, $insert_data)
{
    global $db; //透過 global把 $db宣告進此 function的世界
    $column_text = '';
    $insert_text = '';
    foreach ($field as $data) {
        $column_text .= '`' . $data . '`,';
        $insert_text .= ':' . $data . ',';
    }

    $column_text = substr($column_text, 0, -1);
    $insert_text = substr($insert_text, 0, -1);
     $sql = "INSERT INTO " . $tablename . " (" . $column_text . ") VALUES (" . $insert_text . ");";
    // $sql = "INSERT INTO ".$tableNam." (id,a,b,c) VALUES (null,1,2,3)";
    $sth = $db->prepare($sql);
    
    // echo "<hr>";
    // return;
    // return $insert_data;
    try{
        $sth->execute($insert_data);
    }catch( PDOException $e){
        return $e->getMessage();
    }
   
}

// delete SQL
function del($tablename, $field, $delete_data)
{ // 每個function是獨立的世界
    global $db; //透過 global把 $db宣告進此 function的世界
    $column_text = '';
    foreach ($field as $data) {
        $column_text .= $data . ' =:' . $data;
    }

    $list = $db->prepare("DELETE FROM " . $tablename . " WHERE " . $column_text);
    $list->execute($delete_data);
    return;
};

// update SQL
function update($tablename, $field, $update_data, $id)
{
    global $db; //透過 global把 $db宣告進此 function的世界
    $column_text = '';
    foreach ($field as $data) {
        $column_text .= '`'.$data . '` =:' . $data.',';
    }
    $column_text = substr($column_text, 0, -1);
    $sql = "UPDATE ".$tablename." SET ".$column_text." WHERE id=".$id;
    $list = $db->prepare($sql);
    $list->execute($update_data);
    return;
}

function addfile($file)
{
    $newname = time() . "_" . $file['name'];
    copy($file['tmp_name'], "upload/" . $newname);
    return $newname;
}
