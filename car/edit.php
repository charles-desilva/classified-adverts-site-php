<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <?php include_once("../includes/head.php"); 
        ?>
       
        
    </head>
    <body>

    <div class="container">
        <?php include("../includes/header.php"); ?>
        <div class="row" id="section2">
        <?php include_once("../includes/sidebar.php"); ?>

            <div class="col-md-9">
                <h2><?=$L["brand_form_title"] ?></h2>
                <hr />

                <?php
                    include_once("../includes/db_connect.php");
                    $id= $_GET["id"];
                    $sql = "SELECT car.*, model.brand_id FROM car 
                    INNER JOIN model ON car.model_id=model.id
                    WHERE (car.id='$id')";
                    $result = mysqli_query($con, $sql);
                    if($row = mysqli_fetch_array($result)){
                  
                ?>

                <form action="edit_action.php" method="post" class="jumbotrone" enctype="multipart/form-data">
                    <label><?=$L["car_form_id"] ?><!-- Car ID --></label> 
                    <input type="text" name="id" class="form-control" value="<?=$id?>" readonly id="id">
                    <label><?=$L["car_form_listing_title"] ?><!-- Advert Title --></label> 
                    <input type="text" name="listing-title" class="form-control" id="listing-title" value = "<?=$row["title"]?>">
                    <label><?=$L["car_form_brand_name"] ?><!-- Brand --></label> 
                    <select name="brand" class="form-control" id="brand">
                    <?php 
                        include_once("../includes/db_connect.php");
                        $sql = "SELECT * 
                        FROM brand"; 
                        $result1 = mysqli_query($con, $sql);

                        while($row1 = mysqli_fetch_array($result1)){
                    ?>
                        <option value="<?=$row1["id"]?>" <?php if ($row["brand_id"]==$row1["id"]){ echo "selected";} ?>><?=$row1["name"]?></option>
                    <?php } ?>
                    </select>
                    <label><?=$L["car_form_model"] ?><!-- Model --></label> 
                    <select name="model" class="form-control" id="model">
                    <?php 
                        include_once("../includes/db_connect.php");
                        $sql = "SELECT * 
                        FROM model"; 
                        $result2 = mysqli_query($con, $sql);

                        while($row2 = mysqli_fetch_array($result2)){
                    ?>
                        <option value="<?=$row2["id"]?>" <?php if ($row["model_id"]==$row2["id"]){ echo "selected";} ?>><?=$row2["name"]?></option>
                    <?php } ?>
                    </select>
                    <label><?=$L["car_form_mileage"] ?><!-- Mileage --></label> 
                    <input type="text" name="mileage" class="form-control" id="mileage" value = <?=$row["mileage"]?>>
                    <label><?=$L["car_form_fuel_type"] ?><!-- Fuel Type --></label> 
                    <select type="text" name="fuel" class="form-control" id="fuel">
                        <option value="1" <?php if ($row["fuel_type"]==1){ echo "selected";} ?>>Petrol</option>
                        <option value="2" <?php if ($row["fuel_type"]==2){ echo "selected";} ?>>Diesel</option>
                        <option value="3"<?php if ($row["fuel_type"]==3){ echo "selected";} ?>>Electric</option>
                        <option value="4"<?php if ($row["fuel_type"]==4){ echo "selected";} ?>><?php if ($row["fuel_type"]==1){ echo "selected";} ?>Hybrid</option>
                        <option value="5"<?php if ($row["fuel_type"]==5){ echo "selected";} ?>>Other</option>
                    </select>
                    <label><?=$L["car_form_yom"] ?><!-- Yer of Manufacture --></label> 
                    <input type="text" name="yom" class="form-control" id="yom" value = <?=$row["year"]?>>
                    <label><?=$L["car_form_price"] ?><!-- Price --></label> 
                    <input type="text" name="price" class="form-control" id="price" value = <?=$row["price"]?>>
                    <label><?=$L["car_form_photo"] ?><!-- Photo --></label> <br />
                    <input type="hidden" name="photo-old" class="form-control" id="photo-old" value = <?=$row["photo"]?>>
                    <img src="<?=PATH."uploads/".$row["photo"]?>" alt="" width="150" class="img img-thumbnail">
                    <input type="file" name="photo" class="form-control" id="photo">
                    <label><?=$L["car_form_description"] ?><!-- Colour --></label> 
                    <textarea name= "description" class="form-control" id="description"><?=$row["description"]?></textarea>
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