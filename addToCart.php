<?php
session_start();
switch ($_GET['do']) {
    case 'sigleProduct':

        if (isset($_GET["productToCart"])) {
            if (isset($_SESSION["shoppingcart"][$_GET["productToCart"]])) {
                $_SESSION["shoppingcart"][$_GET["productToCart"]] = (int) $_SESSION["shoppingcart"][$_GET["productToCart"]] + 1;
            } else {
                $_SESSION["shoppingcart"][$_GET["productToCart"]] = 1;
            }

            // print_r($_SESSION["shoppingcart"]);
            // print_r($_SESSION["pro_count"]);
            header('location:shoppingCart.php');
        }
        break;
        case 'multipleProduct':
            if (isset($_GET["productToCart"])) {
                if (isset($_SESSION["shoppingcart"][$_GET["productToCart"]])) {
                    $_SESSION["shoppingcart"][$_GET["productToCart"]] = (int) $_SESSION["shoppingcart"][$_GET["productToCart"]] + $_POST["addQty"];
                } else {
                    $_SESSION["shoppingcart"][$_GET["productToCart"]] = $_POST["addQty"];
                }
                header('location:shoppingCart.php');
            }
            break;
}
?>