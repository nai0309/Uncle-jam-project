<!DOCTYPE html>
<html lang="zh-tw">

<head>
  <?php
  include("header.php");
  ?>
  <title>Uncle醬-商品專區</title>
</head>

<body>
  <?php
  $select_data = [];
  $field = [];
  if(isset($_GET['type'])){
    $select_data['type'] = $_GET['type'];
    if($field !=null){
      /*
        array_push(要增加值得陣列,要增加得值)
        (要查詢的欄位陣列,要查詢的欄位名稱)
      */
      array_push($field,'type');
    }else{
      $field = ['type'];
    }
  }
  
  $products = select('product', $field, $select_data)
  ?>

  <!-- 導覽列 start -->
  <?php include("navbar.php") ?>
  <!-- 導覽列 end -->

  <!-- banner start -->
  <section id="productBanner">
    <div class="banImg">
      <div class="banText container-fluid d-flex flex-column justify-content-center align-items-center">
        <h1 class="display-4">手工甜點</h1>
        <p class="lead">健康手工，少油、少糖、少鹽</p>
      </div>
      <img src="img/product/cake-tiramisu.jpg" alt="">
    </div>
  </section>
  <!-- banner end -->

  <!-- 產品列表 start -->
  <?php include("proSelectList.php") ?>
  <!-- 產品列表 end -->

  <!-- 產品陳列 start -->
  <section id="productDisplay" class="mb-auto mb-md-5">
    <div class="container">
      <div class="row flex-wrap">
        <?php
        foreach ($products as $product) {
        ?>
          <div class="product col-6 col-md-4 text-center">
            <div class="pro_img">
              <div class="pro_more">
                <a href="productDetail.php?type=<?= $product['type'] ?>&proid=<?= $product['product_num'] ?>">
                  <img class="img-fluid" src="img/more.png" alt="more">
                </a>
              </div>
              <?php
                    if ($product['img'] != null) {
                      echo $product['img'];
                    } else {
                      echo '<img class="img-fluid" src="img/product/cake-chcolate.jpg" alt="請補圖" title="'.$product['name_zh'].'">';
                    }
                    ?>
            </div>
            <div class="pro_info">
              <a href="productDetail.php?type=<?= $product['type'] ?>&proid=<?= $product['product_num'] ?>">
                <div class="pro_name"><?= $product['name_zh'] ?></div>
                <div class="pro_name_en"><?= $product['name_en'] ?></div>
                <div class="pro_price">$ <?= $product['price'] ?></div>
                <input type="hidden" name="type" value="<?= $product['type'] ?>">
              </a>
            </div>
            <button type="button" class="btn btn-outline-uncle addToCar" onmouseover="this.innerHTML = '加入購物車'" onmouseout="this.innerHTML = '+'" onclick="<?php
            if(!isset($_SESSION['login'])){
              echo "loginInfo()";
            }else{
              echo "location.href='addToCart.php?do=sigleProduct&productToCart=".$product['id']."'";
            }
            ?>">+</button>
          </div>
        <?php
        }
        ?>
      </div>
    </div>
  </section>
  <!-- 產品陳列 end -->

  <!-- footer start -->
  <?php include("footer.php") ?>
  <!-- footer end -->

  <!-- jquery -->
  <script src="js/jquery-3.4.1.min.js"></script>
  <script>
  function loginInfo(){
    alert('請先登入會員');
  }
  </script>

</body>

</html>