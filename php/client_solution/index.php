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

        </div>
        <hr>
    <?php
        include_once("etu_footer.php");
    ?>

    </div>
    <script type="text/javascript">
        var product_list = <?php echo json_encode($product_list);?>;
    </script>
<script id="etu-recommender" type="text/javascript">
var erHostname='api.eronline.etunexus.com';
var _qquery = _qquery || [];
_qquery.push({
    group : 'ER',
    cid : 'workshoprec',
    type : 'user',
    act : 'view',
    alg : 'last_item_views',
    uid : '<?php echo $model['uid'] ;?>',
    callback : function(queryParams,queryResult){
        for(var idx in queryResult){
            var pid = queryResult[idx];
            var html =  '<div class="col-sm-3 col-xs-6 portfolio-item">';
            html += '<a href="./product.php?prd='+pid+'"><img class="img-responsive portfolio-item" src="../images/'+pid+'.jpg" alt=""></a>';
            html += '<h4><a href="./product.php?prd='+pid+'">'+product_list[pid]+'</a></h4>';
            html += '</div>';
            $("#recommend_index").append(html);
        }
    }
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
    <script src="../js/bootstrap.min.js"></script>

</body>

</html>
