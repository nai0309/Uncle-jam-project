<!DOCTYPE html>
<html lang="zh-tw">

<head>
  <?php
  include("header.php");
  if ($_SESSION['login']["email"] != "admin") {
    header("location:index.php");
  }

  $select_data = [];
  $field = [];
  $product_types = select('product_type', $field, $select_data);
  $products = select('product', $field, $select_data);
  $members = select('member', $field, $select_data);
  $order_infos = select('order_info', $field, $select_data);
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
      </div>
      <img src="img/banner_backend.jpg" alt="後台banner" title="後台banner">
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
                <td>
                  <input type="file" class="form-control-file mb-1" id="updateImg<?= $product['id'] ?>" name="updateImg" onchange="encodeUpdate('<?= $product['id'] ?>');">
                  <div id="updateImgshow<?= $product['id'] ?>" class="uploadImg">
                    <?php
                    if ($product['img'] != null) {
                      echo $product['img'];
                    } else {
                      echo '<img src="img/product/proimg_default.JPG" alt="請補圖" title="'.$product['name_zh'].'">';
                    }
                    ?>
                  </div>
                  <div>
                    <textarea style="display:none" class="form-control" id="updateImgtxt<?= $product['id'] ?>" name="updateImgtxt"><?= $product['img'] ?></textarea>
                  </div>
                </td>
                <td><input class="form-control form-control-sm" type="text" name="product_num" value="<?= $product['product_num'] ?>"></td>

                <td>
                  <select class="form-control form-control-sm" type="text" id="addType" name="type">
                    <?php
                    foreach ($product_types as $product_type) {
                    ?>
                      <option value="<?= $product_type["type"] ?>" <?= ($product['type'] == $product_type["type"]) ? "selected" : ""; ?>>
                        <?= $product_type["type"] ?>
                      </option>
                    <?php
                    }
                    ?>
                  </select>
                </td>
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
                      <?php
                      foreach ($product_types as $product_type) {
                      ?>
                        <option value="<?= $product_type["type"] ?>"><?= $product_type["type"] ?></option>
                      <?php
                      }
                      ?>
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
                  <input type="file" class="form-control-file" id="addImg" name="addImg" onchange="encodeAdd();">
                  <div id="imgshow">
                  </div>
                  <div>
                    <textarea style="display:none" class="form-control" id="txt" name="addImgtxt"></textarea>
                  </div>
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
            <th scope="col">備註</th>
            <th scope="col">訂單詳情</th>
            <th scope="col">操作</th>
          </tr>
        </thead>
        <tbody>
          <?php
          foreach ($order_infos as $order_info) {
          ?>
            <form action="api.php?do=order_infoMdy" method="post">
              <tr>
                <input type="hidden" name="id" value="<?= $order_info["id"] ?>">
                <td scope="row"><?= $order_info["order_num"] ?></td>
                <td><?= $order_info["order_name"] ?></td>
                <td><?= $order_info["phone"] ?></td>
                <td><?= $order_info["email"] ?></td>
                <td><?= $order_info["address"] ?></td>
                <td><?= $order_info["ordertime"] ?></td>
                <td>
                  <select class="form-control form-control-sm" name="shipping_status">
                    <option selected><?= $order_info["shipping_status"] ?></option>
                    <option><?= $order_info["shipping_status"] == "已出貨" ? "待出貨" : "已出貨" ?></option>
                  </select>
                </td>
                <td>＄<?= $order_info["total_amount"] ?></td>
                <td><textarea cols="20" rows="2" name="order_infoNote"><?= $order_info["note"] ?></textarea></td>
                <td>
                  <a type="button" class="btn-readmore" data-toggle="modal" data-target="#orderDetail<?= $order_info['order_num'] ?>">查詢詳情</a>
                </td>
                <td><button class="btn btn-readmore btn-outline-uncle my-1" type="submit" style="width: auto"><a>儲存</a></button></td>
              </tr>
            </form>
          <?php
          }
          ?>
        </tbody>
      </table>

      <?php
      foreach ($order_infos as $order_info) {
      ?>
        <div id="orderDetail<?= $order_info['order_num'] ?>" class="modal fade" tabindex="-1">
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
                  foreach ($order_details as $order_detail) {
                    if ($order_info["order_num"] == $order_detail["order_num"]) {
                  ?>
                      <tr>
                        <td>
                          <?php
                          foreach ($products as $product) {
                            if ($product["product_num"] == $order_detail["product_num"]) {
                              $order_detail["product_num"] = $product["name_zh"];
                              echo $order_detail["product_num"];
                            }
                          }
                          ?>
                        </td>
                        <td><?= $order_detail["count"] ?></td>
                        <td><textarea cols="30" rows="2" name="order_info_singleNote[]"><?= $order_detail["ordernote"] ?></textarea></td>
                      </tr>
                  <?php
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


    function encodeUpdate(e) {
      <?php
      foreach ($products as $product) {
      ?>
        switch (e) {
          case "<?= $product['id'] ?>":
            var selectedfile = document.getElementById("updateImg<?= $product['id'] ?>").files;
            if (selectedfile.length > 0) {
              var imageFile = selectedfile[0];
              var fileReader = new FileReader();
              fileReader.onload = function(fileLoadedEvent) {
                var srcData = fileLoadedEvent.target.result;
                var newImage = document.createElement('img');
                newImage.src = srcData;
                document.getElementById("updateImgshow<?= $product['id'] ?>").innerHTML = newImage.outerHTML;
                document.getElementById("updateImgtxt<?= $product['id'] ?>").innerHTML = document.getElementById("updateImgshow<?= $product['id'] ?>").innerHTML;
              }
              fileReader.readAsDataURL(imageFile);
            }
            break;
        }
      <?php
      }
      ?>
    }


    function encodeAdd() {
      var selectedfile = document.getElementById("addImg").files;
      if (selectedfile.length > 0) {
        var imageFile = selectedfile[0];
        var fileReader = new FileReader();
        fileReader.onload = function(fileLoadedEvent) {
          var srcData = fileLoadedEvent.target.result;
          var newImage = document.createElement('img');
          newImage.src = srcData;
          document.getElementById("imgshow").innerHTML = newImage.outerHTML;
          document.getElementById("txt").innerHTML = document.getElementById("imgshow").innerHTML;
        }
        fileReader.readAsDataURL(imageFile);
      }
    }
  </script>
</body>

</html>