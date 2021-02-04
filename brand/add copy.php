<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <?php include_once("../includes/head.php"); ?>
       
        
    </head>
    <body>

    <div class="container">
        <?php include("../includes/header.php"); ?>
        <div class="row" id="section2">
        <?php include_once("../includes/sidebar.php"); ?>

            <div class="col-md-9">
                <h2><?=$L["brand_form_title"] ?></h2>
                <hr />
                <form action="add_action.php" method="post" class="jumbotrone">
                    
                    <label><?=$L["brand_form_brand_id"] ?><!-- ID --></label> 
                    <input type="text" name="id" class="form-control" value="1" readonly id="id">
                    <label><?=$L["brand_form_brand_name"] ?><!-- Name --></label> 
                    <input type="text" name="name" class="form-control" value="Honda" id="name">
                     <br />
                    <input type="reset" value="<?=$L["reset"] ?>" class="btn btn-success active-button">
                    <input type="submit" value="<?=$L["update"] ?>" class="btn btn-warning">

                </form>
            </div>
        </div>
        <?php include_once("../includes/footer.php"); ?>
    </div>
    
    </body>
</html>