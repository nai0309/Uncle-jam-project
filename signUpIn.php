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
  <link rel="stylesheet" href="css/stylesSignUp.css" />

</head>

<body>

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


  <!-- 聯絡我們 start -->
  <section id="signUp">
    <div class="container-fluid">

      <div class="row">

        <div class="col-6">
          <img class="img-fluid" src="img/product/pie-taro.jpg" alt="" title="">
        </div>

        <div class="col-6 p-5">
          <h3 class="pb-3">會員註冊</h3>
          <form method="post">
            <div class="form-row">
              <div class="col-12 mb-3">
                <label for="name">姓名</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="請輸入姓名" required>
              </div>
              <div class="col-12 mb-3">
                <legend class="col-form-label">性別</legend>
                <div class="form-row">
                  <div class="form-check mr-3">
                    <input class="form-check-input" type="radio" name="gender" id="male" value="male" checked>
                    <label class="form-check-label" for="male">
                      男
                    </label>
                  </div>
                  <div class="form-check mr-3">
                    <input class="form-check-input" type="radio" name="gender" id="female" value="female">
                    <label class="form-check-label" for="female">
                      女
                    </label>
                  </div>
                  <div class="form-check mr-3">
                    <input class="form-check-input" type="radio" name="gender" id="others" value="others">
                    <label class="form-check-label" for="others">
                      其它
                    </label>
                  </div>
                </div>
              </div>
              <div class="col-12 mb-3">
                <label for="birthday">生日</label>
                <input type="date" class="form-control" id="birthday" name="birthday" required>
              </div>
              <div class="col-12 mb-3">
                <label for="email">電子信箱</label>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroupPrepend3">@</span>
                  </div>
                  <input type="mail" class="form-control" id="email" required>
                </div>
              </div>
              <div class="col-12 mb-3">
                <div class="form-row">
                <div class="col-5">
                <label for="password">密碼</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="請輸入密碼" required>
                </div>
                <div class="col-5">
                <label for="passwordCheck">密碼確認</label>
                <input type="password" class="form-control" id="passwordCheck" name="passwordCheck" placeholder="密碼確認" required>
                </div>
              </div>     
            </div>
            <div class="col-12 mb-3">
                <label for="phone">電話</label>
                <input type="tel"" class="form-control" id="phone" name="phone" placeholder="請輸入電話" required>
              </div>
              <div class="col-12 mb-3">
                <label for="address">地址</label>
                <input type="text" class="form-control" id="address" name="address" placeholder="請輸入地址" required>
              </div>
            </div>
            <button class="btn btn-primary" type="submit">送出</button>
            <button class="btn btn-primary" type="reset">重置</button>
          </form>
        </div>
      </div>
    </div>
  </section>
  <!-- 聯絡我們 end-->

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


    </script>
</body>

</html>