<!DOCTYPE html>
<html lang="zh-tw">

<head>
  <?php
  include("header.php");
  if (isset($_SESSION['login'])) {
    $member = $_SESSION['login'];
  }else{
    header("location:index.php");
  }
  if (isset($_SESSION["shoppingcart"])) {
    $addCartPros = $_SESSION["shoppingcart"];
  } else {
    $addCartPros = [];
  }

  if ($addCartPros != null) {
    $column_text = '(';
    foreach ($addCartPros as $key => $data) {
      $column_text .=  $key . ',';
    }
    $column_text = substr($column_text, 0, -1) . ')';
  } else {
    $column_text = '()';
  }
  // echo json_encode($column_text);


  $sql = $db->prepare("SELECT * FROM product WHERE id IN " . $column_text);
  $sql->execute();
  $products = $sql->fetchAll();

  // echo json_encode($sql);
  // return;

  $order_num = date('Ymd') . str_pad(mt_rand(1, 99999), 5, '0', STR_PAD_LEFT);
  ?>
  <title>Uncle醬-購物車</title>

</head>

<body>
  <!-- 導覽列 start -->
  <?php include("navbar.php") ?>
  <!-- 導覽列 end -->

  <!-- banner start -->
  <section id="productBanner">
    <div class="banImg">
      <div class="banText container-fluid d-flex flex-column justify-content-center align-items-center">
        <h1 class="display-4">購物車</h1>
      </div>
      <img calss="img-fluid" src="img/product/cake-tiramisu.jpg" alt="">
    </div>
  </section>
  <!-- banner end -->


  <!-- 空的購物車 start -->
  <section id="cartEmpty" class="m-5">
    <div class="container">
      <div class="row d-flex flex-column justify-content-center">
        <h3 class="col text-center border-bottom pb-3" style="color: silver">購物車尚無任何商品</h3>
        <div class="col text-center pt-3">
          <img class="img-fluid" src="img/emptyCart.png" alt="emptyCart">
        </div>
      </div>
    </div>
    <div class="text-center">
      <button class="btn btn-outline-uncle my-5"><a href="product.php">回商品頁</a></button>
    </div>
  </section>
  <!-- 空的購物車 start -->

  <div id="shoppingCart">
    <form action="api.php?do=orderAdd" method="post">
      <input type="hidden" name="order_num" value="<?= $order_num ?>">
      <!-- 購物車清單 start -->
      <section id="cartList" class="my-5">
        <div class="container-fluid table-responsive">
          <table class="table table-striped">
            <thead class="text-center">
              <tr>
                <th scope="col">編號</th>
                <th scope="col">圖片</th>
                <th scope="col">產品編號</th>
                <th scope="col">產品名</th>
                <th scope="col">數量</th>
                <th scope="col">單價</th>
                <th scope="col">總計</th>
                <th scope="col">備註</th>
                <th scope="col"></th>
              </tr>
            </thead>
            <tbody class="text-center">
              <?php
              $i = 0;
              $shipFee = 150;
              $total = array();
              foreach ($products as $product) {
                $price = 0;
                $qty = 0;
              ?>
                <tr>
                  <td scope="row"><?= $i += 1 ?></td>
                  <td><img class="img-fluid" src="img/product/cake-chcolate.jpg" alt="巧克力蛋糕" width="100px"></td>
                  <td class="en-font"><?= $product['product_num'] ?></td>
                  <input type="hidden" name="product_num" value="<?= $product['product_num'] ?>">
                  <td>
                    <p class="pro_name"><?= $product['name_zh'] ?></p>
                    <p class="pro_name_en"><?= $product['name_en'] ?></p>
                  </td>
                  <td><input type="number" min="1" max="10" value="<?php echo $_SESSION['shoppingcart'][$product['id']];
                  $qty = $_SESSION['shoppingcart'][$product['id']];
                  ?>">
                  </td>
                  <td class="en-font">$ <?php echo $product['price'];
                                        $price = $product['price'];
                                        ?></td>
                  <td class="en-font">$ <?php echo $sum = $qty * $price;
                                        array_push($total, $sum);
                                        ?></td>
                  <td>
                    <textarea name="single_note" rows="3"></textarea>
                  </td>
                  <td class="text-center">
                    <button class="btn-readmore btn-outline-uncle my-1" type="submit" style="width: auto"><a>修改</a></button>
                    <br>
                    <button class="btn-danger" style="width: auto;border-radius: 20px;">
                      <a href="api.php?do=productDel&delId=<?= $product['id'] ?>" style="color: white">刪除</a>
                    </button>
                  </td>
                </tr>
              <?php
              }
              ?>
            </tbody>
          </table>
          <div>
            <table class="text-right" style="width: auto;float:right">
              <tr>
                <td>總　　額</td>
                <td>：</td>
                <td>$ <?= array_sum($total) ?></td>
              </tr>
              <tr>
                <td>運　　費</td>
                <td>：</td>
                <td>$ <?= $shipFee ?></td>
              </tr>
              <tr>
                <td>應付金額</td>
                <td>：</td>
                <td>$ <?= array_sum($total) + $shipFee ?></td>
                <input type="hidden" name="total" value="<?= array_sum($total) + $shipFee ?>">
              </tr>
            </table>
          </div>
      </section>
      <!-- 購物車清單 end -->

      <!-- 訂購資料 start -->
      <section id="orderInfo" class="mb-5">
        <div class="container">
          <h3 class="text-center">訂購人資料</h3>
          <div class="form-row">
            <!-- 會員id start -->
            <input type="hidden" name="member_id" value="<?= $member["id"] ?>">
            <!-- 會員id end -->
            <div class="form-group col-6">
              <label for="orderName">訂購姓名</label>
              <input type="text" class="form-control form-control-sm" id="orderName" name="orderName" value="<?= $member["member_name"] ?>">
            </div>
            <div class="form-group col-6">
              <label for="orderPhone">聯絡電話</label>
              <input type="text" class="form-control form-control-sm" id="orderPhone" name="orderPhone" value="<?= $member["phone"] ?>">
            </div>
          </div>
          <div class="form-group">
            <label for="orderEmail">電子信箱</label>
            <input type="mail" class="form-control form-control-sm" id="orderEmail" name="orderEmail" value="<?= $member["email"] ?>">
          </div>
          <div class="form-group">
            <label for="orderAddress">送貨地址</label>
            <input type="text" class="form-control form-control-sm" id="orderAddress" name="orderAddress" value="<?= $member["address"] ?>">
          </div>
          <div class="form-group">
            <label for="orderNote">訂單備註</label>
            <textarea name="orderNote" id="orderNote" rows="3" class="form-control form-control-sm"></textarea>
          </div>
          <small style="color:red">*付款方式目前僅提供貨到付款及轉帳服務</small>
          <div class="text-center">
            <input type="submit" name="submitbtn" class="btn btn-outline-uncle my-3" value="訂購確認">
          </div>
        </div>
      </section>
      <!-- 訂購資料 end -->
    </form>
  </div>

  <?php
  if (isset($_POST['submitbtn'])) {
    $this->thanksOrder();
  }
  ?>

  <!-- footer start -->
  <?php include("footer.php") ?>
  <!-- footer end -->

  <!-- jquery -->
  <script src="js/jquery-3.4.1.min.js"></script>
  <script>
    var cartState = "<?= (isset($_SESSION["shoppingcart"])) ? 'shoppingCart' : 'cartEmpty'; ?>"
    cartShow(cartState);

    function cartShow(state) {
      switch (state) {
        case 'shoppingCart':
          $("#cartEmpty").hide();
          break;
        case 'cartEmpty':
          $("#shoppingCart").hide();
          break;
      }
    }

    var orderNum = <?= $order_num ?>;

    function thanksOrder() {
      $("#shoppingCart").html(`
      <section id="thanksOrder" class="m-5">
    <div class="container h-100">
      <div class="row align-items-center">
        <div class="d-none d-sm-block col-md-6">
          <img class="img-fluid" src="img/thanksorder.png" alt="thanksorder">
        </div>
        <div class="col-12 col-md-6" style="line-height: 1.8rem;color:rgb(110, 110, 110)">
          <h2 class="border-bottom">感謝您的訂購</h2>
          <b>訂單編號：${orderNum}</b>
          <p>
            付款資訊如下：<br>
            匯款銀行名稱：第一銀行北土城分行<br>
            匯款銀行代號：007<br>
            帳號：207-68-022026<br>
            戶名：王鵬志<br>
            <i style="color: red">ATM轉帳付款完成後，請提供帳號後五碼</i><br>
            聯絡電話：02-29811111
          </p>
        </div>
      </div>
      <div class="text-center">
        <button class="btn btn-outline-uncle my-3"><a href="index.php">回首頁</a></button>
      </div>
    </div>
  </section>
    `)
    }
  </script>


</body>

</html>