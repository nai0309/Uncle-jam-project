<!DOCTYPE html>
<html lang="zh-tw">

<head>

  <?php
  include("header.php");
  $select_data = [];
  $field = [];
  if (isset($_GET['type'])) {
    $select_data['type'] = $_GET['type'];
    $select_data['product_num'] = $_GET['proid'];
    if ($field != null) {
      /*
       array_push(要增加值得陣列,要增加得值)
       (要查詢的欄位陣列,要查詢的欄位名稱)
     */
      array_push($field, 'type', 'product_num');
    } else {
      $field = ['type', 'product_num'];
    }
  }

  $products = select('product', $field, $select_data)
  ?>
  <title>Uncle醬-商品介紹</title>


</head>

<body>
  <!-- 導覽列 start -->
  <?php
  include("navbar.php")
  ?>
  <!-- 導覽列 end -->

  <!-- banner start -->
  <section id="productBanner">
    <div class="banImg">
      <div class="banText container-fluid d-flex flex-column justify-content-center align-items-center">
      </div>
      <img src="img/banner_product.jpg" alt="商品banner" title="商品banner">
    </div>
  </section>
  <!-- banner end -->

  <!-- 產品列表 start -->
  <?php include("proSelectList.php") ?>
  <!-- 產品列表 end -->

  <!-- 產品詳情 start -->
  <section id="productDetail" class="mb-auto mb-md-5">
    <?php
    foreach ($products as $product) {
    ?>
      <div class="container">
        <div class="media proDetailImg">
          <?php
          if ($product['img'] != null) {
            echo $product['img'];
          } else {
            echo '<img class="img-fluid" src="img/product/proimg_default.JPG" alt="請補圖" title="'.$product['name_zh'].'">';
          }
          ?>
          <!-- <img src="<?= ($product['img'] != null) ? $product['img'] : 'img/product/cake-chcolate.jpg'; ?>" class="align-self-center mr-3" alt="..." width="40%"> -->

          <form action="addToCart.php?do=multipleProduct&productToCart=<?= $product['id'] ?>" method="post">
            <div class="media-body">
              <h3 class="h3 pro_name mt-0"><?= $product['name_zh'] ?></h3>
              <h5 class="h5 pro_name_en"><?= $product['name_en'] ?></h5>
              <p class="pro_price">售價：$ <?= $product['price'] ?></p>
              <div class="form-group">
                <select class="form-control form-control-sm" id="addQty" name="addQty">
                  <option value="1" selected>1</option>
                  <option value="2">2</option>
                  <option value="3">3</option>
                  <option value="4">4</option>
                  <option value="5">5</option>
                </select>
              </div>
              <p>
                <button id="addCartBtn" class="btn btn-outline-uncle btn-readmore" type="submit" name="submitbtn" onmouseover="this.innerHTML = '加入購物車'" onmouseout="this.innerHTML = '+'" style="width:110px">+</button>
              </p>
              <pre><b class="h6">商品詳情：</b><p><?= $product['description'] ?></p></pre>
            </div>
          </form>
        </div>
      </div>
    <?php
    }
    ?>
  </section>
  <!-- 產品詳情 end -->

  <!-- footer start -->
  <?php include("footer.php") ?>
  <!-- footer end -->

  <!-- jquery -->
  <script src="js/jquery-3.4.1.min.js"></script>

  <script>
    let length = $('.product input').length;

    function select(e) {
      for (i = 0; i < length; i++) {
        let productType = $('.product input').eq(i).val();
        switch (e) {
          case 'all':
            $(".product").show();
            break;
          case 'cake':
            (productType == '蛋糕系列') ? $(".product").eq(i).show(): $(".product").eq(i).hide();
            break;
          case 'cashew':
            (productType == '腰果醬') ? $(".product").eq(i).show(): $(".product").eq(i).hide();
            break;
          case 'pie':
            (productType == '派系列') ? $(".product").eq(i).show(): $(".product").eq(i).hide();
            break;
          case 'cakeroll':
            (productType == '歐蕾卷') ? $(".product").eq(i).show(): $(".product").eq(i).hide();
            break;
          case 'oat':
            (productType == '燕麥蛋糕') ? $(".product").eq(i).show(): $(".product").eq(i).hide();
            break;
          case 'cookies':
            (productType == '手工餅乾') ? $(".product").eq(i).show(): $(".product").eq(i).hide();
            break;
          case 'candy':
            (productType == '牛軋糖') ? $(".product").eq(i).show(): $(".product").eq(i).hide();
            break;
        }
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