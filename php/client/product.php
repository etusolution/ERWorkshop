<?php
    include_once("etu.php");
    include_once("productlist.php");
    // $model : 儲存推薦相關資料的php變數
    // $model['uid'] : 使用者uid
    // $model['pid'] : 產品pid
    // $model['cat'] : 產品分類cat
?>
<!DOCTYPE html>
<html lang="zh-tw">

<?php
    include_once("etu_header.php");
?>

<body>

    <?php
        include_once("etu_nav.php");

    ?>

    <div class="container">

        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header"><?php echo $product_list[$model['pid']]; ?>
                </h1>
            </div>
        </div>
        <div class="row">

            <div class="col-md-8">
                <img class="img-responsive prod-img" src="../images/<?php echo $model['pid'];?>.jpg" alt="">
            </div>

            <div class="col-md-4">
                <h3>商品介紹</h3>
                <p><?php echo $product_list[$model['pid']];?></p>
                <h3>商品規格</h3>
                <ul>
                    <li><?php echo $product_list[$model['pid']];?></li>
                </ul>
            </div>

        </div>

        <div class="row">

            <div class="col-lg-12">
                <h3 class="page-header">推薦商品</h3>
            </div>
            </div>
<div id="recommend_index" class="row">
<!-- 請在query的callback中，用jQuery動態顯示實際的推薦資訊(可先移除此div內容) -->
<?php for ($idx = 0; $idx < $recommend_length; $idx++) {
?>

            <div class="col-sm-3 col-xs-6 portfolio-item">
                <a href="#">
                    <img class="img-responsive portfolio-item" src="http://placehold.it/500x333" alt="">
                </a>
                <h4>
                    <a href="#">推薦商品名稱</a>
                </h4>
            </div>
<?php
} ?>
        </div>
        <hr>
    <?php
        include_once("etu_footer.php");
    ?>

    </div>
    <script type="text/javascript">
        var product_list = <?php echo json_encode($product_list);?>;
    </script>
    <!-- 在這裡插入js程式碼 -->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>

</body>

</html>
