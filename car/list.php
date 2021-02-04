<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <?php 
        include_once("../includes/head.php");
        include_once("../includes/head_admin_only.php");
       
        ?>
       
        
    </head>
    <body>

    <div class="container">
        <?php include("../includes/header.php"); ?>
        <div class="row" id="section2">
        <?php include_once("../includes/sidebar.php"); ?>

            <div class="col-md-9">
                <h2><?=$L["car_form_list_title"] ?><a href="add.php" class="btn btn-success float-right"><?=$L["add"] ?></a></h2>
                <?php
                    if(isset($_GET["status"]) && $_GET["status"]=="successful"){
                ?>
                    <div class="alert alert-success" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <?=$_GET["msg"]?></div>
                <?php 
                    } else if(isset($_GET["status"]) && $_GET["status"]=="fail"){
                ?>
                    <div class="alert alert-alert-danger">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <?=$_GET["msg"]?></div>
                <?php 
                    }
                ?>
                
                <table class="table">
                    <tr>
                        <th><?=$L["car_form_id"] ?></th>
                        <th>Car Photo</th>
                        <th><?=$L["car_form_brand_name"] ?></th>
                        <th><?=$L["car_form_model"] ?></th>
                        <th><?=$L["car_form_sold"] ?></th>
                        <th><?=$L["car_form_view_count"] ?></th>
                        <th><?=$L["options"] ?></th>
                    </tr>
                    <?php include_once("../includes/db_connect.php");
                        $sql = "SELECT car.*, brand.name as brand_name, model.name as model_name
                                FROM car
                                INNER JOIN model ON model.id = car.model_id
                                INNER JOIN brand ON brand.id = model.brand_id";
                        $result = mysqli_query($con, $sql);

                        while($row = mysqli_fetch_array($result)){
                    ?>
                    <tr>
                        <td><?=$row["id"]?></td>
                        <td><img src="<?=PATH."uploads/".$row["photo"]?>" alt="" width="70" class="img img-thumbnail"></td>
                        <td><?=$row["brand_name"]?></td>
                        <td><?=$row["model_name"]?></td>
                        <td><label class="badge badge-pill badge-success" for=""><?=($row["sold"])?"Sold": "Available" ?></label></td>
                        <td><?=$row["view_count"]?></td>
                        <td>
                            <a href="edit.php?id=<?=$row["id"]?>" class = "btn btn-warning"><?=$L["edit"] ?></a>
                            <a href="delete_action.php?id=<?=$row["id"]?>" class = "btn btn-danger"><?=$L["delete"] ?></a>
                            <a href="view.php?id=<?=$row["id"]?>" class = "btn btn-success"><?=$L["view"] ?></a>
                        </td>
                    </tr>
                        <?php } ?>
                    <tr></tr>
                </table>

                
                
            </div>
        </div>
        <?php include_once("../includes/footer.php"); ?>
    </div>
    
    </body>
</html>