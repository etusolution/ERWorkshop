<?php
    include_once("etu.php");
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
                <h1 class="page-header">商品列表
                </h1>
            </div>
        </div>
        <div class="row">
        <?php
            $idx = 0;
        foreach ($product_list as $pid => $pname) {
        ?>
        <div class="col-md-4 portfolio-item">
            <a href="./product.php?prd=<?php echo $pid;?>">
                <img class="img-responsive" src="../images/<?php echo $pid;?>.jpg" alt="">
            </a>
            <h3>
                <a href="./product.php?prd=<?php echo $pid;?>"><?php echo $pname;?></a>
            </h3>
                    
        </div>
        <?php
            $idx++;
        if ($idx % $index_row_length == 0) {
            ?>
                </div>        
        <div class="row">
            <?php
        }
        }
        ?>
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
