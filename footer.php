  <?php
    if(isset($_GET['info_code'])){
      switch($_GET['info_code']){
        case 'required':
          echo "<script>alert('必填未填或資料傳輸失敗')</script>";
        break;
        case 'loginError':
          echo "<script>alert('帳號密碼錯誤或不存在')</script>";
        break;
        case 'emailExist':
          echo "<script>alert('Email已註冊過')</script>";
        break;
        case 'signupSuccess':
          echo "<script>alert('恭喜註冊成功，請重新登入')</script>";
        break; 
      }
    }

    if (isset($_SESSION["update_type"])) {
      if ($_SESSION['update_type'] == 1) {
        echo '<script>alert("修改/刪除成功！")</script>';
        $_SESSION['update_type'] = 0;
      }
      if ($_SESSION['update_type'] == 2) {
        echo '<script>alert("修改/刪除失敗！")</script>';
        $_SESSION['update_type'] = 0;
      }
      if ($_SESSION['update_type'] == 3) {
        echo '<script>alert("新增成功！")</script>';
        $_SESSION['update_type'] = 0;
      }
      if ($_SESSION['update_type'] == 4) {
        echo '<script>alert("會員資料更新成功！")</script>';
        $_SESSION['update_type'] = 0;
      }
    }
  ?>
  <footer id="footerZone" class="p-2 uncle-bg-dark">
    <div class="text-uncle-light d-flex align-items-center justify-content-between flex-column flex-md-row">
      <a href="index.php"><img src="img/logo-light.png" alt="uncle醬" class="img-fluid" width="140px"></a>
      <div class="text-center">
            <p class="m-0">聯絡電話：02-29811111</p>
            <p class="m-0">電子信箱：<a href="mailto:uncle_cashew@gmail.com" class="text-uncle-dark">uncle_cashew@gmail.com</a></p>
            <p class="m-0">服務時間：週一～週六 10:00~18:00</p>
        </div>
      <span class="copyright">copyright©Nai Hui</span>
    </div>
  </footer>