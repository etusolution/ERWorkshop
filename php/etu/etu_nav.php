<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="./"><img src="../images/logo.png"></a>
            </div>
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="./">商品首頁</a>
                    </li>
                    <li>
                        <a href="./content_index.php">文章首頁</a>
                    </li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
        <li><a href="<?php echo $login_url;?>">
        <?php 
        if (isset($_SESSION['uid'])) {
            echo '登出: '.$_SESSION['uid'];
        } else {
            echo '登入';
        }
        ?>
            </a></li>
                
            </ul>
            </div>
        </div>
    </nav>