<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <?php include_once("../includes/head.php"); 
        include_once("../includes/head_admin_only.php");?>
       
        
    </head>
    <body>

    <div class="container">
        <?php include("../includes/header.php"); ?>
        <div class="row" id="section2">
        <?php include_once("../includes/sidebar.php"); 
        ?>

            <div class="col-md-9">
                <h2><?=$L["brand_form_title"] ?></h2>
                <hr />
                <?php
                    if(isset($_GET["msg"])){
                ?>
                    <div class="alert alert-danger"><?=$_GET["msg"]?></div>
                <?php 
                } 
                ?>
                <?php
                    include_once("../includes/db_connect.php");
                    $id= $_GET["id"];
                    $sql = "SELECT * FROM brand WHERE (id='$id')";
                    $result = mysqli_query($con, $sql);
                    if($row = mysqli_fetch_array($result)){
                  
                ?>


                <form action="edit_action.php" method="post" class="jumbotrone">
                <label><?=$L["brand_form_id"] ?><!-- ID --></label> 
                    <input type="text" name="id" class="form-control" value = <?=$row["id"]?> readonly>
                    <label><?=$L["brand_form_brand_name"] ?><!-- ID --></label> 
                    <input type="text" name="name" class="form-control" value = <?=$row["name"]?>>
                     <br />
                    <input type="reset" value="<?=$L["reset"] ?>" class="btn btn-success active-button">
                    <input type="submit" value="<?=$L["update"] ?>" class="btn btn-warning">

                </form>

                    <?php } ?>
            </div>
        </div>
        <?php include_once("../includes/footer.php"); ?>
    </div>
    
    </body>
</html>