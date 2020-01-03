<!DOCTYPE html>
<html lang="zh-tw">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <title>Uncle醬-Home</title>

  <!-- FontAwesome -->
  <link rel="stylesheet" href="css/fontawesome.css">
  <!-- slide from codepen -->
  <link rel="stylesheet" href="css/productSlide.css">
  <!-- bootstrap -->
  <link rel="stylesheet" href="css/bootstrap.css" />
  <!-- google font -->
  <link href="https://fonts.googleapis.com/css?family=Inria+Serif|Noto+Sans+TC&display=swap" rel="stylesheet">
  <!-- custom css -->
  <link rel="stylesheet" href="css/styleHome.css" />

</head>

<body>
  <!-- 導覽列 start -->
  <nav class="navbar navbar-expand-lg navbar-color navbar-bg fixed-top">
    <a class="navbar-brand d-lg-none d-sm-block" href="#">LOGO</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar"><span class="navbar-toggler-icon"></span></button>
    <div class="collapse navbar-collapse" id="navbar">

      <ul class="navbar-nav m-auto">
        <li id="home" class="nav-item"><a class="nav-link mr-4" href="#">首頁</a></li>
        <li class="nav-item dropdown">
          <a id="dropdown-about" class="nav-link mr-4 dropdown-toggle" href="#" data-toggle="dropdown">關於我們</a>
          <div class="dropdown-menu">
            <a class="dropdown-item font-weight-normal" href="#brandStory">品牌故事</a>
            <a class="dropdown-item font-weight-normal" href="#contactUs">聯絡我們</a>
          </div>
        </li>
        <!-- logo start -->
        <li class="nav-brand">
          <a class="nav-link d-none d-lg-block mr-4" href="#">Uncle醬</a>
        </li>
        <!-- logo end -->
        <li class="nav-item dropdown">
          <a id="dropdown-product" class="nav-link mr-4 dropdown-toggle" href="#" data-toggle="dropdown">商品列表</a>
          <div class="dropdown-menu">
            <a class="dropdown-item font-weight-normal" href="product.php">所有商品</a>
            <a class="dropdown-item font-weight-normal" href="#">腰果醬</a>
            <a class="dropdown-item font-weight-normal" href="#">蛋糕系列</a>
            <a class="dropdown-item font-weight-normal" href="#">派系列</a>
            <a class="dropdown-item font-weight-normal" href="#">歐蕾卷</a>
            <a class="dropdown-item font-weight-normal" href="#">燕麥蛋糕</a>
            <a class="dropdown-item font-weight-normal" href="#">手工餅乾</a>
            <a class="dropdown-item font-weight-normal" href="#">牛軋糖</a>
          </div>
        </li>
        <li id="home" class="nav-item"><a class="nav-link mr-4" href="member.php">會員專區</a></li>
      </ul>
      <ul id="join" class="navbar-nav login">
        <li class="nav-item">
          <a class="nav-link" href="#signin" data-toggle="modal">登入</a>
        </li>
        <span class="text-white font-weight-bolder" style="line-height: 40px;">｜</span>
        <li class="nav-item">
          <a class="nav-link" href="#signup" data-toggle="modal">註冊</a>
        </li>
      </ul>
    </div>
  </nav>
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

  <!-- 關於我們start -->
  <section id="brandStory" class="h-100 px-5 d-flex flex-column align-items-center justify-content-center">
    <div class="container h-75 d-flex flex-column justify-content-center align-items-center">
      <div class="row h-100 align-items-center">
        <h1 class="col-12 text-center">品牌故事</h1>
        <div class="col-12 col-lg-6 h-75 ">
          <img class="img" src="img/product/pie-lemon-one.jpg" alt="" title="">
        </div>
        <div class="bg-main col-12 col-lg-6 h-75 d-flex align-items-center flex-column justify-content-center navbar-bg">
          <div class="text-center">
            <img src="img/doubleQuotes.png" alt="" style="width: 15%">
            <p class="align-self-center p-3">憑著著對美食與烘焙的熱情與堅持，秉持著少糖、少油、健康的理念，研發出不膩口奶油蛋糕及招牌腰果醬。</p>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- 關於我們end -->

  <!-- 全部產品start -->
  <!-- <h1 class="text-center my-4">所有商品</h1> -->
  <div id="productSlide" class="h-100">

  </div>
  <!-- 全部產品end -->

  <!-- 聯絡我們start -->
  <section id="contactUs" class="h-100 px-5 d-flex flex-column align-items-center justify-content-center">
    <div class="container h-75 d-flex flex-column justify-content-center align-items-center">
      <div class="row h-100 align-items-center">
        <h1 class="col-12 text-center">聯絡資訊</h1>
        <div class="col-12 col-lg-6 h-75 d-flex flex-column justify-content-center navbar-bg">
          <div class="p-3">
            <ul>
              <li>店家名稱：Uncle醬</li>
              <li>聯絡電話：02-29811111</li>
              <li>電子信箱：<a href="mailto:uncle_cashew@gmail.com">uncle_cashew@gmail.com</a></li>
              <li>服務時間：週一～週六 10:00~18:00</li>
            </ul>
          </div>
        </div>
        <div class="col-12 col-lg-6 h-75">
          <img class="img" src="img/product/pie-taro.jpg" alt="" title="">
        </div>
      </div>
    </div>
  </section>
  <!-- 聯絡我們end -->

  <!-- footer start -->
  <footer id="footerZone" class="p-2 uncle-bg-dark">
    <div class="text-uncle-light d-flex flex-column align-items-center justify-content-between">
      <h3><a class="h3" href="index.php">Uncle醬</a></h3>
      <div id=footerList>
        <span class="mr-1"><a href="#brandStory">品牌故事</a>｜</span>
        <span class="mr-1"><a href="member.php">會員專區</a>｜</span>
        <span class="mr-1"><a href="">購物須知</a>｜</span>
        <span class="mr-1"><a href="#contactUs">聯絡我們</a>｜</span>
      </div>
      <span class="copyright">copyright©Nai Hui</span>
    </div>
    <!-- footer end -->


    <!-- Jqery -->
    <script src="js/jquery-3.4.1.min.js"></script>


    <!--slide from codepen partial -->
    <script src='https://cdnjs.cloudflare.com/ajax/libs/react/16.8.6/umd/react.production.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/react-dom/16.8.6/umd/react-dom.production.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/react-transition-group/4.2.1/react-transition-group.min.js'></script>
    <!-- slide from codepen -->
    <script src="js/productSlide.js"></script>
    <!-- bootstrap -->
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>


</body>

</html>