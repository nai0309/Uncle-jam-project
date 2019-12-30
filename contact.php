<!DOCTYPE html>
<html lang="zh-tw">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <title>Uncle醬-聯絡我們</title>

  <!-- FontAwesome -->
  <link rel="stylesheet" href="css/fontawesome.css">
  <!-- bootstrap -->
  <link rel="stylesheet" href="css/bootstrap.css" />
  <!-- google font -->
  <link href="https://fonts.googleapis.com/css?family=Inria+Serif|Noto+Sans+TC&display=swap" rel="stylesheet">
  <!-- custom css -->
  <link rel="stylesheet" href="css/styleHome.css" />
  <link rel="stylesheet" href="css/styleContact.css" />

</head>

<body>

  <!-- 導覽列 start -->
  <header>
    <nav class="navbar navbar-expand-lg navbar-color navbar-bg fixed-top">
      <a class="navbar-brand d-lg-none d-sm-block" href="index.php">LOGO</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar"><span
          class="navbar-toggler-icon"></span></button>
      <div class="collapse navbar-collapse" id="navbar">

        <ul class="navbar-nav m-auto">
          <li id="home" class="nav-item"><a class="nav-link mr-4" href="index.php">首頁</a></li>
          <li class="nav-item dropdown">
            <a id="dropdown-about" class="nav-link mr-4 dropdown-toggle" href="#" data-toggle="dropdown">關於我們</a>
            <div class="dropdown-menu">
              <a class="dropdown-item font-weight-normal" href="brandStory.php">品牌故事</a>
              <a class="dropdown-item font-weight-normal" href="#">聯絡我們</a>
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


  <!-- 品牌故事 start -->
  <section id="brandStory">
    <div class="h-100 container d-flex align-items-center">
      <div class="row">
        <div id="storyImg" class="col-md-6 mt-3">
        <img class="img-fluid" src="img/product/pie-lemon-slide.jpg" alt="">
      </div>
        <div id="storyText" class="col-md-6 my-3 d-flex justify-content-center flex-column">
          <h1 class="h1 text-uncle-title">About Uncle醬</h1>
          <p class="text-uncle-dark">Lorem ipsum dolor sit amet consectetur adipisicing elit. Est magni cupiditate deserunt animi eos, neque rem repellat hic aut beatae aspernatur provident voluptatum vitae voluptas ipsam. Molestias atque porro culpa soluta perferendis nisi consequuntur, minima ea maxime. Quo porro modi voluptas accusantium, quasi, dicta nesciunt repellat quaerat mollitia praesentium vel voluptatibus dolorum corrupti magnam numquam deserunt iusto maiores esse, ratione corporis qui voluptatum! Voluptatibus, ducimus dolorum </p>
        </div>
      </div>
    </div>
  </section>
  <!-- 品牌故事 end-->

  <!-- footer start -->
  <footer id="footerZone" class="p-2 uncle-bg-dark">
    <div class="text-uncle-light d-flex flex-column align-items-center justify-content-between">
      <h3><a class="h3" href="index.php">Uncle醬</a></h3>
      <div id=footerList>
        <span class="mr-1"><a href="brandStory.php">品牌故事</a>｜</span>
        <span class="mr-1"><a href="member.php">會員專區</a>｜</span>
        <span class="mr-1"><a href="">購物須知</a>｜</span>
        <span class="mr-1"><a href="contact.php">聯絡我們</a>｜</span>
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


    </script>
</body>

</html>