<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <?php include_once("includes/head.php"); ?>
       
        
    </head>
    <body>

    <div class="container">
        <?php include("includes/header.php"); ?>
        <div class="row" id="section2">
        <?php include_once("includes/sidebar.php"); ?>

            <div class="col-md-9">
                <h2><?=$L["login_form_title"] ?></h2>
                <hr />
                <?php
                    if(isset($_GET["status"]) && $_GET["status"]=="successful"){
                ?>
                    <div class="alert alert-success" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <?=$_GET["msg"]?></div>
                <?php 
                    } else if(isset($_GET["status"]) && $_GET["status"]=="failed"){
                ?>
                    <div class="alert alert-danger" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <?=$_GET["msg"]?></div>
                <?php 
                    }
                ?>
                <form action="login_action.php" method="post" class="jumbotrone">
                    <label><?=$L["login_form_un"] ?></label>
                    <input type="text" name="un" class="form-control">
                    <label for=""><?=$L["login_form_title"] ?></label>
                    <input type="password" name="pw" class="form-control">
                    <br />
                    <input type="reset" value="<?=$L["reset"] ?>" class="btn btn-success active-button">
                    <input type="submit" value="<?=$L["login"] ?>" class="btn btn-warning">

                </form>
            </div>
        </div>
        <?php include_once("includes/footer.php"); ?>
    </div>
    
    </body>
</html>