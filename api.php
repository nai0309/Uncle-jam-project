<?php
session_start();
require_once("sqlcode.php");
$pre_url = explode("?", $_SERVER["HTTP_REFERER"]);

if (count($pre_url) == 1) {
    $url_arr = explode("/", $pre_url[0]);
    $pre_url = "http://";
    for ($i = 2; $i < count($url_arr); $i++) {
        if ($url_arr[$i] != "") {
            $pre_url .= $url_arr[$i] . "/";
        }
    }
    $pre_url = substr($pre_url, 0, -1);
} else {
    $pre_url = $pre_url[0];
}

$insert_data = [];
$delete_data = [];
$update_data = [];
// 判斷$_GET["do"]執行的動作 start
if (isset($_GET["do"])) {
    $data_check = false;
    switch ($_GET["do"]) {
        case "productMdy":
            if (isset($_POST["product_num"])) {
                $update_data["product_num"] = $_POST["product_num"];
            } else {
                $data_check = true;
            }
            if (isset($_POST["type"])) {
                $update_data["type"] = $_POST["type"];
            } else {
                $data_check = true;
            }
            if (isset($_POST["name_zh"])) {
                $update_data["name_zh"] = $_POST["name_zh"];
            } else {
                $data_check = true;
            }
            if (isset($_POST["name_en"])) {
                $update_data["name_en"] = $_POST["name_en"];
            } else {
                $update_data["name_en"] = "";
            }
            if (isset($_POST["price"])) {
                $update_data["price"] = $_POST["price"];
            } else {
                $data_check = true;
            }
            if (isset($_POST["description"])) {
                $update_data["description"] = $_POST["description"];
            } else {
                $update_data["description"] = "";
            }
            if ($data_check) {
                header("location:" . $pre_url . "?info_code=productMdy_error");
                return;
            }
            $tablename = "product";
            $field = ["product_num", "type", "name_zh", "name_en", "price", "description"];
            $id = $_POST["id"];
            update($tablename, $field, $update_data, $id);
            $_SESSION['update_type'] = 1;
            header("location:" . $pre_url);
            return;
            break;
        case "productDel":
            if (isset($_GET["delId"])) {
                $delete_data["id"] = $_GET["delId"];
            } else {
                $data_check = true;
            }
            if ($data_check) {
                header("location:" . $pre_url . "?info_code=productDel_error");
                return;
            }
            $tablename = "product";
            $field = ["id"];
            del($tablename, $field, $delete_data);
            header("location:" . $pre_url . "?info_code=productDel_success");
            return;
            break;
        case "productAdd":
            if (isset($_POST["addType"])) {
                $insert_data["type"] = $_POST["addType"];
            } else {
                $data_check = true;
            }
            if (isset($_POST["addProductNum"])) {
                $insert_data["product_num"] = $_POST["addProductNum"];
            } else {
                $data_check = true;
            }
            if (isset($_POST["addPrice"])) {
                $insert_data["price"] = $_POST["addPrice"];
            } else {
                $data_check = true;
            }
            if (isset($_POST["addNameZh"])) {
                $insert_data["name_zh"] = $_POST["addNameZh"];
            } else {
                $data_check = true;
            }
            if (isset($_POST["addNameEn"])) {
                $insert_data["name_en"] = $_POST["addNameEn"];
            } else {
                $insert_data["name_en"] = "";
            }
            if (isset($_POST["addDescription"])) {
                $insert_data["description"] = $_POST["addDescription"];
            } else {
                $insert_data["description"] = "";
            }
            if (isset($_POST["addImg"])) {
                $insert_data["img"] = $_POST["addImg"];
            } else {
                $insert_data["img"] = "";
            }

            if ($data_check) {
                header("location:" . $pre_url . "?info_code=productAdd_error");
                return;
            }

            $tablename = "product";
            $field = ["product_num", "type", "name_zh", "name_en", "price", "description", "img"];
            insert($tablename, $field, $insert_data);
            header("location:" . $pre_url . "?info_code=productAdd_success");
            return;
            break;
        case "memberMdy":
            if(isset($_POST["password"])){
                $update_data['password']=$_POST["password"];
            }else{
                $data_check=true;
            }
            if(isset($_POST["phone"])){
                $update_data['phone']=$_POST["phone"];
            }else{
                $data_check=true;
            }
            if(isset($_POST["email"])){
                $update_data['email']=$_POST["email"];
            }else{
                $data_check=true;
            }
            if(isset($_POST["address"])){
                $update_data['address']=$_POST["address"];
            }else{
                $data_check=true;
            }
            if ($data_check) {
                header("location:" . $pre_url . "?info_code=memberMdy_error");
                return;
            }
            $tablename="member";
            $field=["password","phone","email","address"];
            $id=$_POST["id"];
            update($tablename, $field, $update_data, $id);
            $field = ["id"];
            $select_data = [
                'id' => $id
            ];
            $login = selectsingle($tablename, $field, $select_data);
            $_SESSION['login'] = $login;
            header("location:" . $pre_url . "?info_code=memberMdy_success");
            break;
        case "orderAdd":
            print_r($_POST);
            // if ($data_check) {
            //     header("location:" . $pre_url . "?info_code=_error");
            //     return;
            // }
            // header("location:" . $pre_url . "?info_code=_success");
            return;
            break;

    }
}
// 判斷$_GET["do"]執行的動作 end
