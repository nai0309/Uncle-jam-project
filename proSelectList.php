  <section id="productList" class="d-flex align-items-center justify-content-center ">
    <div class="btnlist d-none d-sm-flex flex-wrap align-items-center justify-content-center">
      <button id="productAll" class="listSelect <?=(isset($_GET['type']) && $_GET['type']=='蛋糕系列')?'':'active';?> mx-3 my-1"><a href="product.php">所有商品</a></button>
      <button id="productCake" class="listSelect <?=(isset($_GET['type'])&&$_GET['type']=='蛋糕系列')?'active':''?> btn btn-outline-uncle mx-3 my-1" onclick="select('productCake');active('productCake')"><a href="product.php?type=蛋糕系列&select=productCake">蛋糕系列</a></button>
      <button id="productCashew" class="<?=(isset($_GET['type'])&&$_GET['type']=='醬系列')?'active':''?> btn btn-outline-uncle mx-3 my-1"><a href="product.php?type=醬系列&select=productCashew">醬系列</a></button>
      <button id="productPie" class="<?=(isset($_GET['type'])&&$_GET['type']=='派系列')?'active':''?> btn btn-outline-uncle mx-3 my-1"><a href="product.php?type=派系列&select=productPie">派系列</a></button>
      <button id="productCakeroll" class="<?=(isset($_GET['type'])&&$_GET['type']=='歐蕾卷')?'active':''?> btn btn-outline-uncle mx-3 my-1"><a href="product.php?type=歐蕾卷&select=productCakeroll">歐蕾卷</a></button>
      <button id="productOat" class="<?=(isset($_GET['type'])&&$_GET['type']=='燕麥蛋糕')?'active':''?> btn btn-outline-uncle mx-3 my-1"><a href="product.php?type=燕麥蛋糕&select=productOat">燕麥蛋糕</a></button>
      <button id="productCookies" class="<?=(isset($_GET['type'])&&$_GET['type']=='手工餅乾')?'active':''?> btn btn-outline-uncle mx-3 my-1"><a href="product.php?type=手工餅乾&select=productCookies">手工餅乾</a></button>
      <button id="productCandy" class="<?=(isset($_GET['type'])&&$_GET['type']=='牛軋糖')?'active':''?> btn btn-outline-uncle mx-3 my-1"><a href="product.php?type=牛軋糖&select=productCandy">牛軋糖</a></button>
    </div>
  </section>

  <!-- jquery -->
  <script src="js/jquery-3.4.1.min.js"></script>

  <script>

    var active_type = "<?=(isset($_GET['select']))?$_GET['select']:'productAll';?>";
    active(active_type);

    function active(target) {
      $.each($(".listSelect"), function() {
        $("#"+target).siblings("button").removeClass('active').addClass("btn btn-outline-uncle")
      });
      $("#"+target).addClass("active");
      $("#"+target).removeClass("btn btn-outline-uncle");
    }
  </script>
