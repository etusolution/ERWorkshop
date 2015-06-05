<?php
    include_once("etu.php");
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
                <img class="img-responsive prod-img" src="./images/<?php echo $model['pid'];?>.jpg" alt="">
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

            <div class="col-sm-3 col-xs-6">
                <a href="#">
                    <img class="img-responsive portfolio-item" src="http://placehold.it/500x300" alt="">
                </a>
            </div>

            <div class="col-sm-3 col-xs-6">
                <a href="#">
                    <img class="img-responsive portfolio-item" src="http://placehold.it/500x300" alt="">
                </a>
            </div>

            <div class="col-sm-3 col-xs-6">
                <a href="#">
                    <img class="img-responsive portfolio-item" src="http://placehold.it/500x300" alt="">
                </a>
            </div>

            <div class="col-sm-3 col-xs-6">
                <a href="#">
                    <img class="img-responsive portfolio-item" src="http://placehold.it/500x300" alt="">
                </a>
            </div>

        </div>

        <hr>

    <?php
        include_once("etu_footer.php");
    ?>

    </div>

<script id="etu-recommender" type="text/javascript">
var erHostname='api.eronline.etunexus.com';
var _qevent = _qevent || [];
_qevent.push({
    group : 'ER',
    cid : 'workshoprec',
    act : 'view',
    uid : '<?php echo $model['uid'] ;?>',
    pid : '<?php echo $model['pid'] ;?>',
    cat : '<?php echo $model['cat'] ;?>',
});

var erUrlPrefix=('https:' == document.location.protocol ? 'https://':'http://')+erHostname+'/';
(function() {
    var er = document.createElement('script');
    er.type = 'text/javascript';
    er.async = true;
    er.src = erUrlPrefix+'/etu.js?'+(new Date().getTime());
    var currentJs=document.getElementById('etu-recommender');
    currentJs.parentNode.insertBefore(er,currentJs);
})();
</script>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
