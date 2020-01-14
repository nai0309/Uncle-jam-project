<?php
session_start();
require_once("sqlcode.php");
$pre_url = explode('?', $_SERVER['HTTP_REFERER']);

if (count($pre_url) == 1) {
    $url_arr = explode('/', $pre_url[0]);
    $pre_url = 'http://';
    for ($i = 2; $i < count($url_arr); $i++) {
        if ($url_arr[$i] != '') {
            $pre_url .= $url_arr[$i] . '/';
        }
    }
    $pre_url = substr($pre_url, 0, -1);
} else {
    $pre_url = $pre_url[0];
}
switch ($_GET['do']) {
    case 'sigleProduct':
        // 快速加入購物車
        if (isset($_GET["productToCart"])) {
            if (isset($_SESSION["shoppingcart"][$_GET["productToCart"]])) {
                $_SESSION["shoppingcart"][$_GET["productToCart"]] = (int) $_SESSION["shoppingcart"][$_GET["productToCart"]] + 1;
                $_SESSION["single_note"][$_GET["productToCart"]] = $_SESSION["single_note"][$_GET["productToCart"]];
            } else {
                $_SESSION["shoppingcart"][$_GET["productToCart"]] = 1;
                $_SESSION["single_note"][$_GET["productToCart"]] = "";
            }
            
            header("location:shoppingCart.php");
        }
        break;
    case 'multipleProduct':
        // 商品詳情頁加入購物車
        if (isset($_GET["productToCart"])) {
            if (isset($_SESSION["shoppingcart"][$_GET["productToCart"]])) {
                $_SESSION["shoppingcart"][$_GET["productToCart"]] = (int) $_SESSION["shoppingcart"][$_GET["productToCart"]] + $_POST["addQty"];
                $_SESSION["single_note"][$_GET["productToCart"]] = $_SESSION["single_note"][$_GET["productToCart"]];
            } else {
                $_SESSION["shoppingcart"][$_GET["productToCart"]] = $_POST["addQty"];
                $_SESSION["single_note"][$_GET["productToCart"]] = "";
            }
            header("location:shoppingCart.php");
        }
        break;
    case "shopping_cart":
        // 購物車event

        // return;
        // 訂購商品內容修改 event 1
        if (isset($_POST['update'])) {
            $updates = $_SESSION["shoppingcart"];
            foreach ($updates as $key => $value) {
                for ($i = 0; $i < count($_POST["product_id"]); $i++) {
                    if ($key == $_POST["product_id"][$i]) {
                        $_SESSION["shoppingcart"][$key] = $_POST["qty"][$i];
                        $_SESSION["single_note"][$key] = $_POST["single_note"][$i];
                    }
                }
            }
            header("location:shoppingCart.php");
        }

        // 訂單商品刪除event 2
        if (isset($_POST['deleted'])) {
            $proID = $_POST["deleted"];
            unset($_SESSION["shoppingcart"][$proID]);
            unset($_SESSION["single_note"][$proID]);
            header("location:shoppingCart.php");
        }

        // 訂單確認event 3
        if (isset($_POST['order_confirm'])) {
            $data_check = false;
            // enent 3-1 新增 order_detail
            $insert_data_detail = [];
            $field_detail = ["table_name", "order_num", "product_num", "count", "ordernote"];
            for ($i = 0; $i < count($_POST['product_num']); $i++) {
                $insert_data_detail = [
                    'table_name' => 'order_detail',
                    'order_num' => $_POST['order_num'],
                    'product_num' => $_POST['product_num'][$i],
                    'count' => (int) $_POST['qty'][$i],
                    'ordernote' => $_POST['single_note'][$i],
                ];

                $insert_id = insert("order_detail", $field_detail, $insert_data_detail);
            }

            // enent 3-2 新增 order_info
            $insert_data = [];
            $select_data = [];
            // order_num
            if (isset($_POST['order_num'])) {
                $insert_data["order_num"] = $_POST['order_num'];
                $select_data["order_num"] = $_POST['order_num'];
            } else {
                $data_check = true;
            }
            // member_id
            if (isset($_POST['member_id'])) {
                $insert_data["member_id"] = $_POST['member_id'];
            } else {
                $data_check = true;
            }
            // order_name
            if (isset($_POST['orderName'])) {
                $insert_data["order_name"] = $_POST['orderName'];
            } else {
                $data_check = true;
            }
            // email
            if (isset($_POST['orderEmail'])) {
                $insert_data["email"] = $_POST['orderEmail'];
            } else {
                $data_check = true;
            }
            // phone
            if (isset($_POST['orderPhone'])) {
                $insert_data["phone"] = $_POST['orderPhone'];
            } else {
                $data_check = true;
            }
            // address
            if (isset($_POST['orderAddress'])) {
                $insert_data["address"] = $_POST['orderAddress'];
            } else {
                $data_check = true;
            }
            // total_amount
            if (isset($_POST['total'])) {
                $insert_data["total_amount"] = $_POST['total'];
            } else {
                $data_check = true;
            }
            // 訂單確認note
            if (isset($_POST['orderNote'])) {
                $insert_data["note"] = $_POST['orderNote'];
            } else {
                $insert_data["note"] = "";
            }

            if ($data_check) {
                $_SESSION['confirm_type'] = "error";
                header("location:shoppingCart.php");
            }

            // order_info訂單新增
            $tablename1 = "order_info";
            $field1 = ["order_num", "member_id", "order_name", "email", "phone", "address", "total_amount", "note"];
            insert($tablename1, $field1, $insert_data);

            // 感謝訂購頁訂單編號select
            $field2 = ["order_num"];
            $order_info = selectsingle("order_info", $field2, $select_data);
            $_SESSION["order_info"] = $order_info;
            unset($_SESSION["shoppingcart"]);
            unset($_SESSION["single_note"]);
            header("location:thanksOrder.php");
        }
        break;
}
