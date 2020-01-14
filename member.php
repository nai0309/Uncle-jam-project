<!DOCTYPE html>
<html lang="zh-tw">

<head>
  <?php
  include("header.php");
  if (!isset($_SESSION['login'])) {
    header("location:index.php");
  }
  $member = $_SESSION['login'];

  if (!empty($member["id"])) {
    $field = ["member_id"];
    $select_data["member_id"] = $member["id"];
    $order_infos = select("order_info", $field, $select_data);
    $field_pro = [];
    $select_data_pro = [];
    $products = select('product', $field_pro, $select_data_pro);
  }

  ?>

  <title>Uncle醬-會員專區</title>

</head>

<body>
  <!-- 導覽列 start -->
  <?php include("navbar.php") ?>
  <!-- 導覽列 end -->

  <!-- banner start -->
  <section id="productBanner">
    <div class="banImg">
      <div class="banText container-fluid d-flex flex-column justify-content-center align-items-center">
        <h1 class="display-4">會員專區</h1>
      </div>
      <img src="img/product/cake-tiramisu.jpg" alt="">
    </div>
  </section>
  <!-- banner end -->

  <!-- 會員服務 start -->
  <section id="serveList" class="d-flex align-items-center justify-content-center ">
    <div class="btnlist d-none d-sm-block">
      <button class="listSelect active mx-3" onclick="select('infoManagement');active(this)">資料管理</button>
      <button class="listSelect btn btn-outline-uncle mx-3" onclick="select('orderInfo');active(this)">訂單查詢</button>
    </div>
  </section>
  <!-- 會員服務 end -->

  <!-- 資料管理 start -->
  <section id="infoManagement" class="mb-5">
    <div class="container">
      <form method="post" action="api.php?do=memberMdy">
        <input type="hidden" name="id" value="<?= $member["id"] ?>">
        <div class="row">
          <div class="form-group col-4">
            <label for="name">姓名</label>
            <input type="text" class="form-control" name="name" value="<?= $member["member_name"] ?>" disabled>
          </div>
          <div class="form-group col-4">
            <label for="gender">性別</label>
            <input type="text" class="form-control" id="gender" name="gender" value="<?= $member["gender"] ?>" disabled>
          </div>
          <div class="form-group col-4">
            <label for="birthday">生日</label>
            <input type="text" class="form-control" name="birthday" value="<?= $member["birthday"] ?>" disabled>
          </div>
        </div>
        <div class="row">
          <div class="form-group col-6">
            <label for="password">密碼</label>
            <input type="password" class="form-control" name="password" value="<?= $member["password"] ?>">
          </div>
          <div class="form-group col-6">
            <label for="phone">電話</label>
            <input type="tel" class="form-control" name="phone" value="<?= $member["phone"] ?>">
          </div>
        </div>
        <div class="form-group">
          <label for="email">電子信箱</label>
          <input type="mail" class="form-control" name="email" value="<?= $member["email"] ?>">
        </div>
        <div class="form-group">
          <label for="address">地址</label>
          <input type="text" class="form-control" name="address" value="<?= $member["address"] ?>">
        </div>
        <div class="text-center">
          <button type="submit" class="btn btn-outline-uncle">確認修改</button>
        </div>
      </form>
    </div>
  </section>
  <!-- 資料管理 end -->

  <!-- 訂單查詢 start -->
  <section id="orderInfo" class="mb-5">
    <div class="container-fluid table-responsive">
      <table class="table table-striped">
        <thead class="thead-dark">
          <tr>
            <th scope="col">訂單編號</th>
            <th scope="col">收件者</th>
            <th scope="col">電話</th>
            <th scope="col">地址</th>
            <th scope="col">訂購日期</th>
            <th scope="col">訂單狀態</th>
            <th scope="col">消費金額</th>
            <th scope="col">備註</th>
            <th scope="col">訂單詳情</th>
          </tr>
        </thead>
        <tbody>
          <?php
          foreach ($order_infos as $order_info) {
          ?>
            <tr>
              <td scope="row"><?= $order_info["order_num"] ?></td>
              <td><?= $order_info["order_name"] ?></td>
              <td><?= $order_info["phone"] ?></td>
              <td><?= $order_info["address"] ?></td>
              <td><?= $order_info["ordertime"] ?></td>
              <td><?= $order_info["shipping_status"] ?></td>
              <td><?= $order_info["total_amount"] ?></td>
              <td><textarea cols="20" rows="2"><?= $order_info["note"] ?></textarea></td>
              <td>
                <a class="btn-readmore" data-toggle="modal" data-target="#order_detail<?= $order_info["order_num"] ?>">查詢詳情</a>
              </td>
            </tr>
          <?php
          }
          ?>
        </tbody>
      </table>

      <?php
      foreach ($order_infos as $order_info) {
      ?>
        <div id="order_detail<?= $order_info['order_num'] ?>" class="modal fade" tabindex="-1">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
              <table class="table text-center">
                <thead>
                  <tr>
                    <th scope="col">產品名稱</th>
                    <th scope="col">數量</th>
                    <th scope="col">備註</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  if (!empty($order_infos)) {
                    $field = ["order_num"];
                    $select_data = [];
                    for ($i = 0; $i < count($order_infos); $i++) {
                      $select_data["order_num"] = $order_infos[$i]["order_num"];
                      $order_details = select("order_detail", $field, $select_data);
                      if ($order_info["order_num"] == $select_data["order_num"]) {
                        foreach ($order_details as $order_detail) {
                  ?>
                          <tr>
                            <td>
                              <?php
                             foreach($products as $product){
                              if ($product["product_num"]==$order_detail["product_num"]) {
                                $order_detail["product_num"]=$product["name_zh"];
                                echo $order_detail["product_num"];
                              }
                            }
                             ?>
                             </td>
                            <td><?= $order_detail["count"] ?></td>
                            <td><textarea cols="30" rows="2"><?= $order_detail["ordernote"] ?></textarea></td>
                          </tr>
                  <?php
                        }
                      }
                    }
                  }
                  ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      <?php
      }
      ?>
    </div>
  </section>
  <!-- 訂單查詢 end -->

  <!-- footer start -->
  <?php include('footer.php') ?>
  <!-- footer end -->

  <!-- JQ -->
  <script src="js/jquery-3.4.1.min.js"></script>

  <script>
    $("#orderInfo").hide();

    function select(e) {
      switch (e) {
        case 'infoManagement':
          $("#infoManagement").show();
          $("#orderInfo").hide();
          break;
        case 'orderInfo':
          $("#orderInfo").show();
          $("#infoManagement").hide();
          break;
      }
    }

    function active(target) {
      $.each($(".listSelect"), function() {
        $(this).removeClass('active').addClass("btn btn-outline-uncle")
      });
      $(target).addClass("active");
      $(target).removeClass("btn btn-outline-uncle");
    }
  </script>



</body>

</html>