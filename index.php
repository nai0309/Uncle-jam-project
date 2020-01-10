<!DOCTYPE html>
<html lang="zh-tw">

<head>
<?php
include("header.php");
?>
 <link rel="stylesheet" href="css/productSlide.css" />
  <title>Uncle醬-首頁</title>

</head>

<body>
  <!-- 導覽列 start -->
  <?php include("navbar.php") ?>
  <!-- 導覽列 end -->

  <!-- 首頁幻燈片start -->
  <section id="slideZone">
    <div id="slide" class="carousel slide carousel-fade" data-ride="carousel">
      <ol class="carousel-indicators">
        <li data-target="#slide" data-slide-to="0" class="active"></li>
        <li data-target="#slide" data-slide-to="1"></li>
        <li data-target="#slide" data-slide-to="2"></li>
      </ol>
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img class="" src="img/product/cake-carrot-slide.jpg" alt="紅蘿蔔蛋糕" title="紅蘿蔔蛋糕">
        </div>
        <div class="carousel-item">
          <img class="" src="img/product/pie-lemon-slide.jpg" alt="檸檬派" title="檸檬派">
        </div>
        <div class="carousel-item">
          <img class="" src="img/product/pie-taro-slide.jpg" alt="芋泥派" title="芋泥派">
        </div>
      </div>
      <a href="#slide" class="carousel-control-prev" data-slide="prev">
        <span class="carousel-control-prev-icon"></span>
      </a>
      <a href="#slide" class="carousel-control-next" data-slide="next">
        <span class="carousel-control-next-icon"></span>
      </a>
    </div>
  </section>
  <!-- 首頁幻燈片end -->

  <!-- 全部產品start -->
  <div id="productSlide" class="mb-2">

  </div>
  <!-- 全部產品end -->

  <!-- 關於我們start -->
  <section id="brandStory" class="mb-2 px-5 d-flex flex-column align-items-center justify-content-center">
    <div class="d-flex flex-column justify-content-center align-items-center">
      <div class="row align-items-center">
        <h1 class="col-12 text-center text-uncle-title">品牌故事</h1>
        <div class="d-none d-sm-block col-12 col-sm-6 h-75">
          <img class="img-fluid" src="img/product/pie-lemon-one.jpg" alt="" title="">
        </div>
        <div class="bg-main col-12 col-sm-6 h-75 d-flex align-items-center flex-column justify-content-center text-uncle-dark">
          <div class="text-center">
            <p class="align-self-center text-uncle-dark">憑著著對美食與烘焙的熱情與堅持，秉持著少糖、少油、健康的理念，研發出不膩口奶油蛋糕及招牌腰果醬。</p>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- 關於我們end -->

  <!-- 購物須知start -->
  <section id="orderNote" class="mb-2 px-5 d-flex flex-column align-items-center justify-content-center">
    <div class="h-100 d-flex flex-column justify-content-center align-items-center">
      <div class="row h-75 align-items-center">
        <h1 class="col-12 text-center text-uncle-title">購物須知</h1>
        <div class="col-12 col-lg-6 h-75 d-flex flex-column justify-content-center navbar-bg align-items-center text-uncle-dark">
          <div>
            <b class="text-dark">宅配貨到付款：</b><br>
            需加收$30手續費，金額超過一萬元(含)以上不適用<br>
            <b class="text-dark">ATM轉帳資訊：</b><br>
            匯款銀行名稱：第二銀你好分行<br>
            匯款銀行代號：000<br>
            帳號：000-00-0000000<br>
            戶名：方芳芳<br>
            付款完成後，請提供帳號後五碼<br>
            <b class="text-dark">運費：</b><br>
            未滿2500元須加收$150低溫宅配運費。<br>
            滿2500元以上(免運費)，外島暫不配送<br>
            <b class="text-dark">退換貨：</b><br>
            基於食品衛生安全考量，商品購買後一旦離櫃恕不接受退換貨(商品如有瑕疵，則不在此限)。
            </ul>
          </div>
        </div>
        <div class="d-none d-sm-block col-12 col-lg-6 h-75">
          <img class="img" src="img/product/cake-carrot-slide.jpg" alt="" title="">
        </div>
      </div>
    </div>
  </section>
  <!-- 購物須知end -->

  <!-- footer start -->
  <?php include("footer.php") ?>
  <!-- footer end -->


  <!-- Jqery -->
  <script src="js/jquery-3.4.1.min.js"></script>
  <!--slide from codepen partial -->
  <script src='https://cdnjs.cloudflare.com/ajax/libs/react/16.8.6/umd/react.production.min.js'></script>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/react-dom/16.8.6/umd/react-dom.production.min.js'></script>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/react-transition-group/4.2.1/react-transition-group.min.js'></script>
  <!-- slide from codepen -->
  <script src="js/productSlide.js"></script>

  <script>
    // 表單驗證js
    (function() {
      'use strict';
      window.addEventListener('load', function() {
        var forms = document.getElementsByClassName('needs-validation');
        var validation = Array.prototype.filter.call(forms, function(form) {
          form.addEventListener('submit', function(event) {
            if (form.checkValidity() === false) {
              event.preventDefault();
              event.stopPropagation();
            }
            form.classList.add('was-validated');
          }, false);
        });
      }, false);
    })();
  </script>


</body>

</html>