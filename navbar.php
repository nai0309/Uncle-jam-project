<?php
if(isset($_SESSION['login'])){
$member_type = $_SESSION['login']['logintype'];
}

?>
<!-- 導覽列 start -->
<nav class="navbar navbar-expand-lg navbar-color navbar-bg fixed-top float-none border-bottom">
  <a class="navbar-brand" href="index.php#"><img src="img/logo.png" alt="uncle醬" class="img-fluid" width="100px"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar"><span class="navbar-toggler-icon"></span></button>
  <div class="collapse navbar-collapse" id="navbar">

    <ul id="navbarcenter" class="navbar-nav m-auto">
      <li class="nav-item"><a class="nav-link mr-4" href="index.php#">首頁</a></li>
      <li class="nav-item"><a class="nav-link mr-4" href="index.php#brandStory">品牌故事</a></li>
      <li class="nav-item dropdown">
        <a id="dropdown-product" class="nav-link mr-4 dropdown-toggle" href="" data-toggle="dropdown">商品列表</a>
        <div class="dropdown-menu">
          <a class="dropdown-item font-weight-normal" href="product.php">所有商品</a>
          <a class="dropdown-item font-weight-normal" href="product.php?type=蛋糕系列&select=productCake">蛋糕系列</a>
          <a class="dropdown-item font-weight-normal" href="product.php?type=醬系列&select=productCashew">醬系列</a>
          <a class="dropdown-item font-weight-normal" href="product.php?type=派系列&select=productPie">派系列</a>
          <a class="dropdown-item font-weight-normal" href="product.php?type=歐蕾卷&select=productCakeroll">歐蕾卷</a>
          <a class="dropdown-item font-weight-normal" href="product.php?type=燕麥蛋糕&select=productOat">燕麥蛋糕</a>
          <a class="dropdown-item font-weight-normal" href="product.php?type=手工餅乾&select=productCookies">手工餅乾</a>
          <a class="dropdown-item font-weight-normal" href="product.php?type=牛軋糖&select=productCandy">牛軋糖</a>
        </div>
      </li>
      <li class="nav-item"><a class="nav-link mr-4" href="#footerZone">聯絡我們</a></li>
      <li class="nav-item"><a class="nav-link mr-4" href="index.php#orderNote">購物須知</a></li>
    </ul>
    <ul id="join" class="navbar-nav login">
      <?php if (isset($_SESSION['login'])) {
        if ($member_type == 1) {
      ?>
          <li class="nav-item">
            <a class="nav-link" href="admin.php">後台管理</a>
          </li>
          <span class="text-secondary font-weight-bolder" style="line-height: 40px;">｜</span>
          <li class="nav-item">
            <a class="nav-link" href="logout.php">登出</a>
          </li>
        <?php } else { ?>
          <li class="nav-item">
            <a class="nav-link" href="member.php">會員專區</a>
          </li>
          <span class="text-secondary font-weight-bolder" style="line-height: 40px;">｜</span>
          <li class="nav-item">
            <a class="nav-link" href="shoppingCart.php">購物車</a>
          </li>
          <span class="text-secondary font-weight-bolder" style="line-height: 40px;">｜</span>
          <li class="nav-item">
            <a class="nav-link" href="logout.php">登出</a>
          </li>
        <?php
        }
      } else {
        ?>
        <li class="nav-item">
          <a class="nav-link" href="#signin" data-toggle="modal">登入</a>
        </li>
        <span class="text-secondary   font-weight-bolder" style="line-height: 40px;">｜</span>
        <li class="nav-item">
          <a class="nav-link" href="#signup" data-toggle="modal">註冊</a>
        </li>
      <?php } ?>
    </ul>
  </div>
</nav>
<!-- 導覽列 end -->

<!-- 登入modal start -->
<div class="modal fade" id="signin" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="signinTitle">會員登入</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form class="needs-validation" method="post" action="sign.php" novalidate>
        <div class="modal-body">
          <div class="form-group">
            <label for="loginEmail">帳號</label>
            <input type="text" class="form-control" name="loginEmail" id="loginEmail" placeholder="請輸入註冊Email" required>
            <div class="invalid-feedback">
              請輸入帳號
            </div>
          </div>
          <div class="form-group">
            <label for="loginPassword">密碼</label>
            <input type="password" class="form-control" id="loginPassword" name="loginPassword" placeholder="請輸入密碼" required>
            <div class="invalid-feedback">
              請輸入密碼
            </div>
          </div>
        </div>
        <div class="form-group modal-footer">
          <button type="submit" class="btn">確定</button>
          <button type="button" class="btn" data-dismiss="modal">取消</button>
        </div>
      </form>
    </div>
  </div>
</div>
<!-- 登入modal end -->

<!-- 註冊modal start -->
<div class="modal fade" id="signup" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="signinTitle">會員註冊</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <!-- 會員註冊表單 -->
      <form class="needs-validation" method="post" action="sign.php" novalidate>
        <!-- 判斷name=type且value＝signup -->
        <input type="hidden" name="type" value="signup">
        <div class="modal-body">
          <div class="form-row">
            <div class="form-group col-6">
              <label for="member_name">姓名</label>
              <input type="text" class="form-control" id="member_name" name="member_name" placeholder="請輸入姓名" required>
              <div class="invalid-feedback">
                姓名未輸入
              </div>
            </div>
            <div class="form-group col-6">
              <label for="gender">性別</label>
              <div class="form-row text-center">
                <div class="col-4 form-check">
                  <input class="form-check-input" type="radio" name="gender" value="male" checked>
                  <label class="form-check-label" for="male">男</label>
                </div>
                <div class="col-4 form-check">
                  <input class="form-check-input" type="radio" name="gender" value="female">
                  <label class="form-check-label" for="female">女</label>
                </div>
                <div class="col-4 form-check">
                  <input class="form-check-input" type="radio" name="gender" value="other">
                  <label class="form-check-label" for="other">其它</label>
                </div>
              </div>
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-6">
              <label for="birthday">生日</label>
              <input type="date" class="form-control" id="birthday" name="birthday" required>
              <div class="invalid-feedback">
                請輸入生日
              </div>
            </div>
            <div class="form-group col-6">
              <label for="password">密碼</label>
              <input type="password" class="form-control" id="password" name="password" placeholder="請輸入密碼" required>
              <div class="invalid-feedback">
                密碼未輸入
              </div>
            </div>
          </div>
          <div class="form-group">
            <label for="email">電子信箱</label>
            <input type="mail" class="form-control" id="email" name="email" placeholder="請輸入電子信箱" required>
            <div class="invalid-feedback">
              信箱未輸入
            </div>
          </div>
          <div class="form-group">
            <label for="phone">電話</label>
            <input type="tel" class="form-control" id="phone" name="phone" placeholder="請輸入電話" required>
            <div class="invalid-feedback">
              電話未輸入
            </div>
          </div>
          <div class="form-group">
            <label for="address">地址</label>
            <input type="text" class="form-control" id="address" name="address" placeholder="請輸入地址" required>
            <div class="invalid-feedback">
              地址未輸入
            </div>
          </div>
        </div>
        <div class="form-group modal-footer">
          <button type="submit" class="btn">確定</button>
          <button type="button" class="btn" data-dismiss="modal">取消</button>
        </div>
      </form>
    </div>
  </div>
</div>
<!-- 註冊modal end -->

<!-- Jqery -->
<script src="js/jquery-3.4.1.min.js"></script>
<!-- bootstrap -->
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>

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