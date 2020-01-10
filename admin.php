<!DOCTYPE html>
<html lang="zh-tw">

<head>
<?php
include("header.php");
if ($_SESSION['login']["email"] != "admin") {
  header("location:index.php");
}

if(isset($_SESSION['update_type']) && $_SESSION['update_type'] == 1){
  echo '<script>alert("修改成功！")</script>';
  $_SESSION['update_type'] = 0;
}
$select_data = [];
$field = [];
$products = select('product', $field, $select_data);
$members = select('member', $field, $select_data);
$orders = select('order_info', $field, $select_data);
$order_details = select('order_detail', $field, $select_data);
?>

  <title>Uncle醬-後台管理</title>

</head>

<body>
  <!-- 導覽列 start -->
  <?php
  include("navbar.php");
  ?>
  <!-- 導覽列 end -->

  <!-- banner start -->
  <section id="productBanner">
    <div class="banImg">
      <div class="banText container-fluid d-flex flex-column justify-content-center align-items-center">
        <h1 class="display-4">後台管理</h1>
      </div>
      <img src="img/product/cake-tiramisu.jpg" alt="">
    </div>
  </section>
  <!-- banner end -->

  <!-- 後台服務 start -->
  <section id="serveList" class="d-flex align-items-center justify-content-center ">
    <div class="btnlist d-none d-sm-block">
      <button class="listSelect active mx-3" onclick="select('memberManagement');active(this)">
        <!-- <a href="admin.php?type=memberManagement"> -->
        會員管理
        <!-- </a> -->
      </button>
      <button class="listSelect btn btn-outline-uncle mx-3" onclick="select('productManagement');active(this)">
        <!-- <a href="admin.php?type=productManagement"> -->
        商品管理
        <!-- </a> -->
      </button>
      <button class="listSelect btn btn-outline-uncle mx-3" onclick="select('orderManagement');active(this)">
        <!-- <a href="admin.php?type=orderManagement"> -->
        訂單管理
        <!-- </a> -->
      </button>
    </div>
  </section>
  <!-- 後台服務 end -->

  <!-- 會員管理start -->
  <section id="memberManagement" class="mb-5">
    <div class="container-fluid table-responsive">
      <table class="table table-striped">
        <thead class="thead-dark">
          <tr>
            <th scope="col">流水號</th>
            <th scope="col">姓名</th>
            <th scope="col">性別</th>
            <th scope="col">生日</th>
            <th scope="col">電子信箱</th>
            <th scope="col">電話</th>
            <th scope="col">地址</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $i = 0;
          foreach ($members as $member) {
          ?>
            <tr>
              <td scope="row"><?= $i += 1 ?></td>
              <td><?= $member['member_name'] ?></td>
              <td><?= $member['gender'] ?></td>
              <td><?= $member['birthday'] ?></td>
              <td><?= $member['email'] ?></td>
              <td><?= $member['phone'] ?></td>
              <td><?= $member['address'] ?></td>
            </tr>
          <?php
          }
          ?>
        </tbody>
      </table>
    </div>
  </section>
  <!-- 會員管理end -->

  <!-- 商品管理start -->
  <section id="productManagement" class="mb-5">
    <div class="container-fluid table-responsive">
      <div class="text-right my-2">
        <button type="button" class="btn btn-outline-uncle" data-toggle="modal" data-target="#productAdd">新增產品</button>
      </div>
      <table class="table table-striped">
        <thead class="thead-dark">
          <tr>
            <th scope="col">編號</th>
            <th scope="col">圖片</th>
            <th scope="col">產品編號</th>
            <th scope="col">品項</th>
            <th scope="col">產品中文名</th>
            <th scope="col">產品英文名</th>
            <th scope="col">價錢</th>
            <th scope="col">產品描述</th>
            <th scope="col" class="text-center">操作</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $i = 0;
          foreach ($products as $product) {
          ?>
            <form action="api.php?do=productMdy" method="post">
              <tr>
                <td scope="row"><input type="hidden" name="id" value="<?= $product['id'] ?>"><?= $i += 1 ?></td>
                <td><img class="img-fluid" src="<?= ($product['img'] != null) ? $product['img'] : 'img/product/cake-chcolate.jpg'; ?>" alt="巧克力蛋糕" width="100px"></td>
                <td><input class="form-control form-control-sm" type="text" name="product_num" value="<?= $product['product_num'] ?>"></td>
                <td><input class="form-control form-control-sm" type="text" name="type" value="<?= $product['type'] ?>"></td>
                <td><input class="form-control form-control-sm" type="text" name="name_zh" value="<?= $product['name_zh'] ?>"></td>
                <td><input class="form-control form-control-sm" type="text" name="name_en" value="<?= $product['name_en'] ?>"></td>
                <td><input class="form-control form-control-sm" type="text" name="price" value="<?= $product['price'] ?>"></td>
                <td><textarea class="form-control form-control-sm" name="description" rows="2"><?= $product['description'] ?></textarea></td>
                <td class="text-center">
                  <button class="btn btn-readmore btn-outline-uncle my-1" type="submit" style="width: auto"><a>儲存</a></button>
                  <br>
                  <button class="btn btn-danger" style="width: auto">
                    <a href="api.php?do=productDel&delId=<?= $product['id'] ?>" style="color: white">刪除</a>
                  </button>
                </td>
              </tr>
            </form>
          <?php } ?>
        </tbody>
      </table>
      <div class="text-right">
        <button type="button" class="btn btn-outline-uncle" data-toggle="modal" data-target="#productAdd">新增產品</button>
      </div>

      <!--新增產品 Modal start-->
      <div class="modal fade" id="productAdd" tabindex="-1">
        <form method="post" action="api.php?do=productAdd" enctype="multipart/form-data">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title" id="productAddTitle">新增商品</h4>
                <button type="button" class="close" data-dismiss="modal">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <div class="form-row">
                  <div class="form-group col-4">
                    <label class="text-secondary font-weight-bolder" for="addType">品項</label>
                    <select class="form-control form-control-sm" type="text" id="addType" name="addType">
                      <option value="蛋糕系列" selected>蛋糕系列</option>
                      <option value="腰果醬">腰果醬</option>
                      <option value="派系列">派系列</option>
                      <option value="歐蕾卷">歐蕾卷</option>
                      <option value="燕麥蛋糕">燕麥蛋糕</option>
                      <option value="手工餅乾">手工餅乾</option>
                      <option value="牛軋糖">牛軋糖</option>
                    </select>
                  </div>
                  <div class="form-group col-4">
                    <label class="text-secondary font-weight-bolder" for="addProductNum">產品編號</label>
                    <input class="form-control form-control-sm" type="text" id="addProductNum" name="addProductNum" required>
                  </div>
                  <div class="form-group col-4">
                    <label class="text-secondary font-weight-bolder" for="addPrice">價錢</label>
                    <input class="form-control form-control-sm" type="text" id="addPrice" name="addPrice" required>
                  </div>
                </div>
                <div class="form-row">
                  <div class="form-group col-6">
                    <label class="text-secondary font-weight-bolder" for="addNameZh">產品中文名</label>
                    <input class="form-control form-control-sm" type="text" id="addNameZh" name="addNameZh" required>
                  </div>
                  <div class="form-group col-6">
                    <label class="text-secondary font-weight-bolder" for="addNameEn">產品英文名</label>
                    <input class="form-control form-control-sm" type="text" id="addNameEn" name="addNameEn">
                  </div>
                </div>
                <div class="form-group">
                  <label class="text-secondary font-weight-bolder" for="addDescription">產品描述</label>
                  <textarea class="form-control" rows="3" id="addDescription" name="addDescription"></textarea>
                </div>
                <div class="form-group">
                  <label class="text-secondary font-weight-bolder" for="addImg">圖片</label>
                  <input type="file" class="form-control-file btn btn-outline-uncle" id="addImg" name="addImg" style="width:auto;border:none;display:block">
                </div>
              </div>
              <div class="modal-footer">
                <button type="submit" class="btn btn-outline-uncle">確認新增</button>
                <button type="reset" class="btn btn-outline-uncle">重置</button>
                <button type="button" class="btn btn-outline-uncle" data-dismiss="modal">取消</button>
              </div>
            </div>
          </div>
        </form>
      </div>
      <!--新增產品 Modal end-->
    </div>
  </section>
  <!-- 商品管理end -->

  <!-- 訂單管理start -->
  <section id="orderManagement" class="mb-5">
    <div class="container-fluid table-responsive">
      <form action="">
        <table class="table table-striped">
          <thead class="thead-dark">
            <tr>
              <th scope="col">訂單編號</th>
              <th scope="col">收件者</th>
              <th scope="col">電話</th>
              <th scope="col">信箱</th>
              <th scope="col">地址</th>
              <th scope="col">訂購日期</th>
              <th scope="col">出貨狀態</th>
              <th scope="col">消費金額</th>
              <th scope="col">訂單詳情</th>
            </tr>
          </thead>
          <tbody>
            <?php
            foreach ($orders as $order) {
            ?>
              <tr>
                <input type="hidden" value="<?= $order["id"] ?>">
                <td scope="row"><?= $order["order_num"] ?></td>
                <td><?= $order["order_name"] ?></td>
                <td><?= $order["phone"] ?></td>
                <td><?= $order["email"] ?></td>
                <td><?= $order["address"] ?></td>
                <td><?= $order["ordertime"] ?></td>
                <td>
                  <select class="form-control form-control-sm">
                    <option selected><?= $order["shipping_status"] ?></option>
                    <option><?= $order["shipping_status"] == "已出貨" ? "待出貨" : "已出貨" ?></option>
                  </select>
                </td>
                <td>＄<?= $order["total_amount"] ?></td>
                <td>
                  <a type="button" class="btn-readmore" data-toggle="modal" data-target="#orderDetail<?= $order["id"] ?>">查詢詳情</a>
                </td>
              </tr>
            <?php
            }
            ?>
          </tbody>
        </table>
        <?php
        foreach ($order_details as $order_detail) {
          $name_zh=$order_detail["product_id"]
        ?>
          <div id="orderDetail<?= $order["id"] ?>" class="modal fade tabindex=" -1">
            <div class="modal-dialog modal-xl">
              <div class="modal-content">
                <table class="table">
                  <thead>
                    <tr>
                      <th scope="col">產品名稱</th>
                      <th scope="col">數量</th>
                      <th scope="col">價格</th>
                      <th scope="col">備註</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php

                  // foreach(){
                  ?>
                    <tr>
                      <td>Mark</td>
                      <td>Otto</td>
                      <td>@mdo</td>
                      <td></td>
                    </tr>
                    <?php
                    // }
                    ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        <?php
        }
        ?>

        <div class="text-right">
          <button type="submit" class="btn btn-outline-uncle">儲存</button>
        </div>
      </form>
    </div>
  </section>
  <!-- 訂單管理end -->

  <!-- footer start -->
  <?php include("footer.php") ?>
  <!-- footer end -->


  <!-- bootstrap -->
  <script src="js/jquery-3.4.1.min.js"></script>

  <script>
    // 選單按鈕選擇 start
    $("#productManagement").hide();
    $("#orderManagement").hide();

    function select(e) {
      switch (e) {
        case 'memberManagement':
          $("#memberManagement").show();
          $("#productManagement").hide();
          $("#orderManagement").hide();
          break;
        case 'productManagement':
          $("#productManagement").show();
          $("#memberManagement").hide();
          $("#orderManagement").hide();
          break;
        case 'orderManagement':
          $("#orderManagement").show();
          $("#productManagement").hide();
          $("#memberManagement").hide();
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
    // 選單按鈕選擇 end
  </script>
</body>

</html>