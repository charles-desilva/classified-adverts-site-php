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
                    <div class="card" style="padding:0.5em;" >
                        <form action="" class="form-inline">
                            <label for="" class="mr-sm-2">Search</label>
                            <input type="text" name="search" class="form-control mb-1 mr-sm-4" placeholder="Search"/>
                            <label for="" class="mr-sm-2">Brand</label>
                            <select class="form-control mb-1 mr-sm-4" name="brand" id="brand">
                                <option value="">All Brands</option>
                                <?php 
                                include_once("includes/db_connect.php");
                                $sql = "SELECT * 
                                FROM brand"; 
                                $result2 = mysqli_query($con, $sql);

                                while($row2 = mysqli_fetch_array($result2)){
                                ?>
                                <option value="<?=$row2["id"]?>"><?=$row2["name"]?></option>
                                <?php } 
                                ?>
                            </select>
                            <button type="submit" class="btn btn-primary mb-2">Filter</button>
                        </form>
                    </div>
                    <hr/>

                    <?php 
                        $where="";
                        if(isset($_GET["search"])){
                            $where = " WHERE car.title LIKE '%".$_GET["search"]."%'";
                        }
                        if(isset($_GET["brand"]) && $_GET["brand"]!=""){
                            if($where == ""){
                                $where = " WHERE model.brand_id='".$_GET["brand"]."'";

                            }else{
                                $where = " AND model.brand_id='".$_GET["brand"]."'";
                            }
                        }

                        include_once("includes/db_connect.php");
                        $sql = "SELECT car.*, brand.name as brand_name, model.name as model_name
                                FROM car
                                INNER JOIN model ON model.id = car.model_id
                                INNER JOIN brand ON brand.id = model.brand_id".$where;
                        $result = mysqli_query($con, $sql);

                        while($row = mysqli_fetch_array($result)){
                    ?>

                    <div class="card">
                        <div class="row" style="padding:0.5em;">
                            <div class = "col-md-3">
                                <img src="<?=PATH?>uploads/<?=$row["photo"]?>" alt="" class="img img-thumbnail" width = "150">
                            </div>
                        
                        <div class="col-md-9">
                            <h3><?=$row["title"]?></h3>
                            <span>Price:<?=$row["price"]?></span>
                            <p><?=$row["brand_name"]?> / <?=$row["model_name"]?> </p>
                            <a href="<?=PATH?>car/view.php?id=<?=$row['id']?>" class="btn btn-danger">View</a>
                        </div>
                        <div></div>
                    </div>
                        <?php } ?>

                </div>
            </div>
            <?php include_once("includes/footer.php"); ?>
        </div>
    
    </body>
</html>