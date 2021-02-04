<?php
    if (!isset($_SESSION)){
        session_start();
    }
?>

<div class="row" id="section1">
    <div class="col-md-12">
        <div class="jumbotron" id="header-banner">
            <h1 class="site-name"><?=$L["sitename"] ?></h1>
            <p class="slogan"><?=$L["slogan"] ?></p>
            <hr />
            <?php
                if(isset($_SESSION["ID"])){
            ?>
                <a href="<?=PATH?>logout.php" class="btn btn-warning">LOGOUT</a>
            <?php
                }else{
            ?>
                <a href="<?=PATH?>login.php" class="btn btn-warning"><?=$L["login"] ?></a>
                <a href="<?=PATH?>register.php" class="btn btn-success active-button"><?=$L["register"] ?></a>
            <?php
                }
            ?>
            
            
            <div id=languages>
            <?php
                if(isset($_SESSION["ID"])){
            ?>
                Welcome <?=$_SESSION["NAME"]?>
            <?php
                }
            ?>
                <a href="?lang=en"><img src="<?=PATH?>images/flags/united-kingdom-flag-icon-256.png" alt=""></a>
                <a href="?lang=si"><img src="<?=PATH?>images/flags/sri-lanka-flag-icon-256.png" alt=""></a>
                <a href="?lang=it"><img src="<?=PATH?>images/flags/italy-flag-icon-256.png" alt=""></a>
                
            </div>

        </div>
    </div>
</div>