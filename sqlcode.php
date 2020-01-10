<?php
// session_start();
$db = new PDO("mysql:host=127.0.0.1;dbname=s1080412;charset=utf8", "root", "");
date_default_timezone_set("Asia/Taipei");

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
    $sql = "INSERT INTO " . $tablename . " (" . $column_text . ") VALUES (" . $insert_text . ")";
    // $sql = "INSERT INTO ".$tableNam." (id,a,b,c) VALUES (null,1,2,3)";
    $sth = $db->prepare($sql);
    $sth->execute($insert_data);
    return $db->lastInsertId();
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
    return $list->fetchAll();
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

//update SQL
// function update($ary, $tableName)
// {
//     global $db;
//     foreach ($ary as $do => $data) {
//         switch ($do) {
//             default:
//                 foreach ($data as $key => $value) { // $data=陣列內容，結構為['id']=修改新值
//                     $sql = "UPDATE " . $tableName . " SET " . $do . "='" . $value . "' WHERE id=" . $key;
//                     // echo "<br>";
//                     $db->query($sql);
//                 }
//                 break;
//         }
//     }
// }

// delete SQL
// function delete($ary, $tableName)
// {
//     global $db;
//     foreach ($ary as $do => $data) {
//         switch ($do) {
//             case 'del':
//                 foreach ($data as $value) {
//                     $sql = "DELETE FROM " . $tableName . " WHERE id=" . $value;
//                     $db->query($sql);
//                 }
//                 break;
//             case 'delat':
//                 $sql = "DELETE FROM " . $tableName . " WHERE " . $data;
//                 $db->query($sql);
//                 break;
//         }
//     }
// }

// php轉址
// function plo($link)
// {
//     return header("location:" . $link);
// }

// // js轉址
// function jlo($link)
// {
//     return "location.href='" . $link . "'";
// }


//分頁導覽 pageNav 提供資料表名稱、條件、一頁要幾個、目前在哪頁
// function navpage($tabelName, $where, $range, $nowpage)
// {
//     $result = select($tabelName, $where);
//     $total = count($result);
//     $many = ceil($total / $range);

//     $pg['<'] = ($nowpage == 1) ? 1 : $nowpage - 1;
//     for ($i = 1; $i <= $many; $i++) $pg[$i] = $i;
//     $pg['>'] = ($nowpage == $many) ?
//         $many : $nowpage + 1;
//     return $pg;
// }
