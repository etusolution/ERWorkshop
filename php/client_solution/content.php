<?php
    include_once("etu.php");
    include_once("productlist.php");
    include_once("contentlist.php");
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
var _qevent = _qevent || [];
_qevent.push({
    group : 'workshop',
    cid : 'workshopcorec',
    act : 'view',
    uid : '<?php echo $model['uid'] ;?>',
    pid : '<?php echo $model['pid'] ;?>',
    cat : '<?php echo $model['cat'] ;?>',
});
var _qquery = _qquery || [];
_qquery.push({
    group : 'workshop',
    cid : 'workshopcorec',
    type : 'cross',
    act : 'view',
    pid : '<?php echo $model['pid'] ;?>',
    cat : '<?php echo $model['cat'] ;?>', // optional
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
