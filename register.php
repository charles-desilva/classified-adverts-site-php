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
                <h2><?=$L["register_form_title"] ?></h2>
                <hr />
                <?php
                    if(isset($_GET["msg"])){
                ?>
                    <div class="alert alert-danger"><?=$_GET["msg"]?></div>
                <?php 
                } 
                ?>
                <form action="register_action.php" method="post" class="jumbotrone">
                    
                    <label><?=$L["register_form_name"] ?><!-- Name --></label> 
                    <input type="text" name="name" class="form-control">
                    <label for=""><?=$L["register_form_email"] ?></label>
                    <input type="email" name="email" class="form-control">
                    <label for=""><?=$L["register_form_phone"] ?></label>
                    <input type="text" name="phone" class="form-control">
                    <label for=""><?=$L["register_form_pw"] ?></label>
                    <input type="password" name="password" class="form-control"><br />
                    <label for=""><?=$L["register_form_pw_conf"] ?></label>
                    <input type="password" name="password-conf" class="form-control"><br />
                    
                    <input type="reset" value="<?=$L["reset"] ?>" class="btn btn-success active-button">
                    <input type="submit" value="<?=$L["register"] ?>" class="btn btn-warning">
                

                </form>
            </div>
        </div>
        <?php include_once("includes/footer.php"); ?>
    </div>
    
    </body>
</html>