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

            <?php
                    include_once("../includes/db_connect.php");
                    $id=$_GET["id"];
                    $sql = "SELECT car.*, brand.name as brand_name, model.name as model_name
                                FROM car 
                                INNER JOIN model ON model.id = car.model_id
                                INNER JOIN brand ON brand.id = model.brand_id
                                WHERE car.id=$id";
                                //echo $sql;
                    $result = mysqli_query($con, $sql);
                    $row = mysqli_fetch_array($result);
                    //echo $result;
                ?>

                <h2><?=$row["title"]?></h2>
                <hr />
                
                    <label><?=$L["car_form_id"] ?>:<!-- Car ID --></label> 
                    <label for=""><?=$row["id"]?></label> <br />
                    <label><?=$L["car_form_brand_name"] ?>:<!-- Brand --></label> 
                    <label><?=$row["brand_name"]?></label> <br />
                    <label><?=$L["car_form_model"] ?>:<!-- Model --></label> 
                    <label><?=$row["model_name"]?></label> <br />
                    <label><?=$L["car_form_mileage"] ?>:<!-- Mileage --></label> 
                    <label><?=$row["mileage"]?></label> <br />
                    <label><?=$L["car_form_fuel_type"] ?>:<!-- Fuel Type --></label> 
                    <label><?=$row["fuel_type"]?></label> <br />
                    <label><?=$L["car_form_yom"] ?>:<!-- Yer of Manufacture --></label> 
                    <label><?=$row["year"]?></label> <br />
                    <label>Price:<!-- Yer of Manufacture --></label> 
                    <label><?=$row["price"]?></label> <br />
                    <label><?=$L["car_form_description"] ?>:<!-- Description --></label> <br />
                    <label><?=$row["description"]?></label> <br />
                    <label>Views:<!-- Yer of Manufacture --></label> 
                    <label><?=$row["view_count"]?></label> <br />
                    <label><?=$L["car_form_photo"] ?>:<!-- Photo --></label> <br>
                    <img src="<?=PATH."uploads/".$row["photo"]?>" alt="" width="400" class="img img-fluid"><br>
                    

            </div>
        </div>
        <?php include_once("../includes/footer.php"); ?>
    </div>
    
    </body>
</html>