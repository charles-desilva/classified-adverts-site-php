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
                <h2><?=$L["car_form_title"] ?></h2>
                <hr />
                <?php
                    if(isset($_GET["msg"])){
                ?>
                    <div class="alert alert-danger"><?=$_GET["msg"]?></div>
                <?php 
                } 
                ?>
                <form action="add_action.php" method="post" class="jumbotrone" enctype="multipart/form-data">
                    <label><?=$L["car_form_listing_title"] ?><!-- Advert Title --></label> 
                    <input type="text" name="listing-title" class="form-control" id="listing-title">
                    <label><?=$L["car_form_brand_name"] ?><!-- Brand --></label> 
                    <select name="brand" class="form-control" id="brand">

                    <?php 
                        include_once("../includes/db_connect.php");
                        $sql = "SELECT * 
                        FROM brand"; 
                        $result = mysqli_query($con, $sql);

                        while($row = mysqli_fetch_array($result)){
                    ?>
                        <option value="<?=$row["id"]?>"><?=$row["name"]?></option>
                    <?php } ?>
                    </select>
                    <label><?=$L["car_form_model"] ?><!-- Model --></label> 
                    <select name="model" class="form-control" id="model">

                    <?php 
                        include_once("../includes/db_connect.php");
                        $sql = "SELECT * 
                        FROM model"; 
                        $result2 = mysqli_query($con, $sql);

                        while($row = mysqli_fetch_array($result2)){
                    ?>
                        <option value="<?=$row["id"]?>"><?=$row["name"]?></option>
                    <?php } ?>
                    </select>
                    <label><?=$L["car_form_mileage"] ?><!-- Mileage --></label> 
                    <input type="text" name="mileage" class="form-control" id="mileage">
                    <label><?=$L["car_form_fuel_type"] ?><!-- Fuel Type --></label> 
                    <select type="text" name="fuel" class="form-control" id="fuel">
                        <option value="1">Petrol</option>
                        <option value="2">Diesel</option>
                        <option value="3">Electric</option>
                        <option value="4">Hybrid</option>
                        <option value="5">Other</option>
                    </select>
                    <label><?=$L["car_form_yom"] ?><!-- Year of Manufacture --></label> 
                    <input type="text" name="yom" class="form-control" id="yom">
                    <label><?=$L["car_form_price"] ?><!-- price --></label> 
                    <input type="text" name="price" class="form-control" id="price">
                    <label><?=$L["car_form_photo"] ?><!-- Colour --></label> 
                    <input type="file" name="photo" class="form-control" id="photo">
                    <label><?=$L["car_form_description"] ?><!-- Colour --></label> 
                    <textarea name= "description" class="form-control" id="description"></textarea>
                     <br />
                    <input type="reset" value="<?=$L["reset"] ?>" class="btn btn-success active-button">
                    <input type="submit" value="<?=$L["insert"] ?>" class="btn btn-warning">

                </form>
            </div>
        </div>
        <?php include_once("../includes/footer.php"); ?>
    </div>
    
    </body>
</html>