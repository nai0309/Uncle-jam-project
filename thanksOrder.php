<!DOCTYPE html>
<html lang="zh-tw">

<head>
  <?php
  include("header.php");

  if (isset($_SESSION['login'])) {
    $member = $_SESSION['login'];
  } else {
    header("location:index.php");
  }

  if (isset($_SESSION["order_info"])) {
    $order_info = $_SESSION["order_info"];
  }

  ?>
  <title>Uncle醬-感謝您的訂購</title>

</head>

<body>
  <!-- 導覽列 start -->
  <?php include("navbar.php") ?>
  <!-- 導覽列 end -->

  <!-- banner start -->
  <section id="productBanner">
    <div class="banImg">
      <div class="banText container-fluid d-flex flex-column justify-content-center align-items-center">
      </div>
      <img calss="img-fluid" src="img/banner_thanksorder.jpg" alt="感謝訂購banner" title="感謝訂購banner">
    </div>
  </section>
  <!-- banner end -->

  <!-- thanks order start -->
  <section id="thanksOrder" class="m-5 h-50">
    <div class="container h-100 d-flex flex-column justify-content-center">
      <div class="row align-items-center">
        <div class="d-none d-sm-block col-md-6">
          <img class="img-fluid" src="img/thanksorder.png" alt="thanksorder">
        </div>
        <div class="col-12 col-md-6" style="line-height: 1.8rem;color:rgb(110, 110, 110)">
          <h2 class="border-bottom">感謝您的訂購</h2>
          <b>訂單編號：<?=$order_info["order_num"]?></b>
          <p>
            付款資訊如下：<br>
            匯款銀行名稱：xxxxxx銀行<br>
            匯款銀行代號：000<br>
            帳號：000-00-000000<br>
            戶名：王鵬志<br>
            <i style="color: red">ATM轉帳付款完成後，請提供帳號後五碼</i><br>
            聯絡電話：02-29811111
          </p>
        </div>
      </div>
      <div class="text-center">
        <button class="btn btn-outline-uncle my-3"><a href="index.php">回首頁</a></button>
      </div>
    </div>
  </section>
  <!-- thanks order end -->

  <!-- footer start -->
  <?php include("footer.php") ?>
  <!-- footer end -->

  <!-- jquery -->
  <script src="js/jquery-3.4.1.min.js"></script>

</body>

</html>