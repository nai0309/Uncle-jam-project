<?php
session_start();
require_once("sqlcode.php");
//先把get參數切開
$pre_url = explode('?',$_SERVER['HTTP_REFERER']);

if(count($pre_url)==1){
    $url_arr = explode('/',$pre_url[0]);
    $pre_url = 'http://';
    for($i=2;$i<count($url_arr);$i++){
        if($url_arr[$i] !=''){
            $pre_url .= $url_arr[$i].'/';
        }
    }
    $pre_url = substr($pre_url,0,-1);
}else{
    $pre_url = $pre_url[0];
}
// print $pre_url;
// return;
$insert_data = [];
$select_data = [];
// 判斷註冊或登入
if (isset($_POST["type"])) {
    // 註冊
    $sql_type = $_POST["type"];
} else {
    // 登入
    $sql_type = "login";
}

if ($sql_type == "signup") {

    $checkType = false;
    // 姓名驗證
    if (isset($_POST["member_name"])) {
        $insert_data["member_name"] = $_POST["member_name"];
    } else {
        $insert_data["member_name"] = "";
        $checkType = true;
    }

    // 性別驗證
    if (isset($_POST["gender"])) {
        $insert_data["gender"] = $_POST["gender"];
    } else {
        $insert_data["gender"] = "";
        $checkType = true;
    }

    // 生日驗證
    if (isset($_POST["birthday"])) {
        $insert_data["birthday"] = $_POST["birthday"];
    } else {
        $insert_data["birthday"] = "";
        $checkType = true;
    }

    // 電子信箱驗證
    if (isset($_POST["email"])) {
        $insert_data["email"] = $_POST["email"];
        $tablename = "member";
        $field = ["email"];
        $select_data['email'] =  $_POST["email"];
        $email_check = select($tablename, $field, $select_data);
        if (count($email_check) > 0) {
            header('location:' . $pre_url . '?info_code=emailExist');
            return;
        }
    } else {
        $insert_data["email"] = "";
        $checkType = true;
    }

    // 密碼驗證
    if (isset($_POST["password"])) {
        $insert_data["password"] = $_POST["password"];
    } else {
        $insert_data["password"] = "";
        $checkType = true;
    }

    // 電話驗證
    if (isset($_POST["phone"])) {
        $insert_data["phone"] = $_POST["phone"];
    } else {
        $insert_data["phone"] = "";
        $checkType = true;
    }

    // 地址驗證
    if (isset($_POST["address"])) {
        $insert_data["address"] = $_POST["address"];
    } else {
        $insert_data['address'] = "";
        $checkType = true;
    }

    if ($checkType) {
        header('location:' . $pre_url . '?info_code=required');
        return;
    }

    $tablename = "member";
    $field = ["member_name", "gender", "birthday", "email", "password", "phone", "address"];
    insert($tablename, $field, $insert_data);
    header('location:' . $pre_url. '?info_code=signupSuccess');
    return;
} else {
   
    $select_check = false;
    if (isset($_POST["loginEmail"])) {
        $select_data['email'] = $_POST["loginEmail"];
    } else {
        $select_check = true;
    }
    if (isset($_POST["loginPassword"])) {
        $select_data['password'] = $_POST["loginPassword"];
    } else {
        $select_check = true;
    }

    if ($select_check) {
        header('location:' . $pre_url . '?info_code=required');
        return;
    }
    $tablename = "member";
    $field = ["email", "password"];
    $login = selectsingle($tablename, $field, $select_data);
    // print_r($login);
    //     echo "<hr>";
    if (count($login) == 0) {
        header('location:' . $pre_url . '?info_code=loginError');
        return;
    } else {
        $_SESSION['login'] = $login;
        // print_r($login);
        // echo "<hr>";
        // print_r($_SESSION['login']);
        header('location:' . $pre_url);
        return;
    }
}
