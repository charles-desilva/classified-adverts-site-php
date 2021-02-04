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
        <?php include_once("../includes/sidebar.php"); ?>

            <div class="col-md-9">
                <h2><?=$L["model_form_edit_title"] ?></h2>
                <hr />

                <?php
                    include_once("../includes/db_connect.php");
                    $id= $_GET["id"];
                    $sql = "SELECT * FROM model WHERE (id='$id')";
                    echo $sql;
                    $result = mysqli_query($con, $sql);
                    if($row = mysqli_fetch_array($result)){
                  
                ?>

                <form action="edit_action.php" method="post" class="jumbotrone">
                    
                    <label><?=$L["model_form_id"] ?><!-- ID --></label> 
                    <input type="text" name="id" class="form-control" value="<?=$row["id"] ?>" readonly id="id">
                    <label><?=$L["model_form_brand"] ?><!-- Brand --></label> 
                    <select name="brand" class="form-control" id="brand">

                    <?php 
                        $sql = "SELECT * 
                        FROM brand"; 
                        $result1 = mysqli_query($con, $sql);

                        while($row1 = mysqli_fetch_array($result1)){
                    ?>
                        <option value="<?=$row1["id"]?>"<?php if ($row["brand_id"]==$row1["id"]){ echo "selected";} ?>><?=$row1["name"]?></option>
                        <?php } ?>
                    </select>
                    <label><?=$L["model_form_model"] ?><!-- Name --></label> 
                    <input type="text" name="name" class="form-control" value="<?=$row["name"]?>" id="name">
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