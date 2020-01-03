<!DOCTYPE html>
<html lang="zh-tw">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <title>Uncle醬-所有商品</title>

  <!-- FontAwesome -->
  <link rel="stylesheet" href="css/fontawesome.css">
  <!-- bootstrap -->
  <link rel="stylesheet" href="css/bootstrap.css" />
  <!-- google font -->
  <link href="https://fonts.googleapis.com/css?family=Inria+Serif|Noto+Sans+TC&display=swap" rel="stylesheet">
  <!-- custom css -->
  <link rel="stylesheet" href="css/styleHome.css" />
  <link rel="stylesheet" href="css/styleProduct.css" />

</head>

<body>
  <?php
  $db = new PDO("mysql:host=127.0.0.1;dbname=s1080412;charset=utf8", "root", "");
  $sql = "SELECT * FROM product WHERE 1";
  $products = $db->query($sql)->fetchAll();
  ?>

  <!-- 導覽列 start -->
  <header>
    <nav class="navbar navbar-expand-lg navbar-color navbar-bg fixed-top">
      <a class="navbar-brand d-lg-none d-sm-block" href="index.php">LOGO</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar"><span class="navbar-toggler-icon"></span></button>
      <div class="collapse navbar-collapse" id="navbar">

        <ul class="navbar-nav m-auto">
          <li id="home" class="nav-item"><a class="nav-link mr-4" href="index.php">首頁</a></li>
          <li class="nav-item dropdown">
            <a id="dropdown-about" class="nav-link mr-4 dropdown-toggle" href="#" data-toggle="dropdown">關於我們</a>
            <div class="dropdown-menu">
              <a class="dropdown-item font-weight-normal" href="index.php#brandStory">品牌故事</a>
              <a class="dropdown-item font-weight-normal" href="index.php#contactUs">聯絡我們</a>
            </div>
          </li>
          <!-- logo start -->
          <li class="nav-brand">
            <a class="nav-link d-none d-lg-block mr-4" href="index.php">Uncle醬</a>
          </li>
          <!-- logo end -->
          <li class="nav-item dropdown">
            <a id="dropdown-product" class="nav-link mr-4 dropdown-toggle" href="#" data-toggle="dropdown">全部商品</a>
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
        <div id="join">
          <a class="navbar-item" href="#">登入/註冊</a>
        </div>
      </div>
    </nav>
  </header>
  <!-- 導覽列 end -->

  <!-- banner start -->
  <section id="productBanner">
    <img src="img/product/cake-tiramisu.jpg" alt="">
  </section>
  <!-- banner end -->

  <!-- 產品列表 start -->
  <section id="productList" class="d-flex align-items-center justify-content-center ">
    <div class="btnlist d-none d-sm-block">
      <button class="btn btn-outline-uncle mx-3"><a href="">蛋糕系列</a></button>
      <button class="btn btn-outline-uncle mx-3"><a href="">腰果醬</a></button>
      <button class="btn btn-outline-uncle mx-3"><a href="">派系列</a></button>
      <button class="btn btn-outline-uncle mx-3"><a href="">歐蕾卷</a></button>
      <button class="btn btn-outline-uncle mx-3"><a href="">燕麥蛋糕</a></button>
      <button class="btn btn-outline-uncle mx-3"><a href="">手工餅乾</a></button>
      <button class="btn btn-outline-uncle mx-3"><a href="">牛軋糖</a></button>
    </div>
  </section>
  <!-- 產品列表 end -->

  <!-- 產品陳列 start -->
  <section id="productDisplay" class="mb-auto mb-md-5">
    <div class="container">
      <div class="row flex-wrap">

        <?php
        foreach ($products as $product) {
        ?>
          <div class="col-6 col-md-4 text-center">
            <div class="pro_img">
              <div class="pro_more">
                <a href="#">
                <img class="img-fluid" src="img/more.png" alt="more">
                </a>
              </div>
              <img class="img-fluid" src="<?=($product['img']!=null)?$product['img'] :'img/product/cake-chcolate.jpg' ;?>" alt="巧克力蛋糕">
            </div>
            <div class="pro_info">
              <a href="/1_www_practice/Git/webtraining_PHP/Uncle-jam-project/product_detail.php?p_id=<?=$product['product_num']?>">
                <div class="pro_name"><?=$product['name_zh']?></div>
                <div class="pro_name_en"><?=$product['name_en']?></div>
                <div class="pro_price">$ <?=$product['price']?></div>
              </a>
            </div>
            <div class="btn btn-outline-uncle addToCar" onmouseover="this.innerHTML = '加入購物車'" onmouseout="this.innerHTML = '+'">+
            </div>
          </div>
        <?php
        }
        ?>
  </section>
  <!-- 產品陳列 end -->


  <!-- footer start -->
  <footer id="footerZone" class="p-2 uncle-bg-dark">
    <div class="text-uncle-light d-flex flex-column align-items-center justify-content-between">
      <h3><a class="h3" href="index.php">Uncle醬</a></h3>
      <div id=footerList>
        <span class="mr-1"><a href="index.php#brandStory">品牌故事</a>｜</span>
        <span class="mr-1"><a href="member.php">會員專區</a>｜</span>
        <span class="mr-1"><a href="">購物須知</a>｜</span>
        <span class="mr-1"><a href="index.php#contactUs">聯絡我們</a>｜</span>
      </div>
      <span class="copyright">copyright©Nai Hui</span>
    </div>
    <!-- footer end -->

    <!-- bootstrap -->
    <script src="js/jquery-3.4.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <!-- slick -->
    <script src="js/slick.js"></script>

</body>

</html>