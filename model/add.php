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
                <h2><?=$L["model_form_title"] ?></h2>
                <hr />
                <?php
                    if(isset($_GET["msg"])){
                ?>
                    <div class="alert alert-danger"><?=$_GET["msg"]?></div>
                <?php 
                } 
                ?>
                <form action="add_action.php" method="post" class="jumbotrone">
                    
                    <label><?=$L["model_form_brand"] ?><!-- Name --></label> 

                    

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
                    <label><?=$L["model_form_model"] ?><!-- Name --></label> 
                    <input type="text" name="model" class="form-control" id="model">
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