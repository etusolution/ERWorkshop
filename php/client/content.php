<?php
    include_once("etu.php");
    include_once("productlist.php");
    include_once("contentlist.php");
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

    <iframe src="<?php echo $content_url[$model['pid']]; ?>" frameborder="0" width="100%" height="500px"></iframe>

    <div class="container">


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
        var content_list = <?php echo json_encode($content_list);?>;
    </script>
    <!-- 在這裡插入js程式碼 -->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>

</body>

</html>
