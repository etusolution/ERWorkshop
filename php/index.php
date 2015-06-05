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
                <img class="img-responsive" src="./images/<?php echo $pid;?>.jpg" alt="">
            </a>
            <h3>
                <a href="./product.php?prd=<?php echo $pid;?>"><?php echo $pname;?></a>
            </h3>
                    
        </div>
        <?php
            $idx++;
        if ($idx % $row_length == 0) {
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

            <div class="col-sm-3 col-xs-6">
                <a href="#">
                    <img class="img-responsive portfolio-item" src="http://placehold.it/500x333" alt="">
                </a>
            </div>

            <div class="col-sm-3 col-xs-6">
                <a href="#">
                    <img class="img-responsive portfolio-item" src="http://placehold.it/500x333" alt="">
                </a>
            </div>

            <div class="col-sm-3 col-xs-6">
                <a href="#">
                    <img class="img-responsive portfolio-item" src="http://placehold.it/500x333" alt="">
                </a>
            </div>

            <div class="col-sm-3 col-xs-6">
                <a href="#">
                    <img class="img-responsive portfolio-item" src="http://placehold.it/500x333" alt="">
                </a>
            </div>

        </div>
        <hr>
    <?php
        include_once("etu_footer.php");
    ?>

    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
