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
                <h2>Add a Member</h2>
                <hr />
                <?php
                    if(isset($_GET["msg"])){
                ?>
                    <div class="alert alert-danger"><?=$_GET["msg"]?></div>
                <?php 
                } 
                ?>
                <form action="add_action.php" method="post" class="jumbotrone">
                    <label><?=$L["member_form_full_name"] ?><!-- Name --></label> 
                    <input type="text" name="name" class="form-control" id="name">    
                    <label><?=$L["member_form_gender"] ?><!-- Name --></label> 
                    <select name="gender" class="form-control" id="gender">
                        <option value="1">Male</option>
                        <option value="2">Female</option>
                        <option value="3">Other</option>
                    </select>
                    <label><?=$L["member_form_birthday"] ?><!-- Name --></label> 
                    <input type="date" name="dob" class="form-control" id="dob">   
                    <label><?=$L["member_form_address"] ?><!-- Name --></label>
                    <input type="text" name="address" class="form-control" id="address">
                    <label><?=$L["member_form_city"] ?><!-- Name --></label>
                    <input type="text" name="city" class="form-control" id="city">
                    <label><?=$L["member_form_phone"] ?><!-- Name --></label>
                    <input type="text" name="phone" class="form-control" id="phone">
                    <label><?=$L["member_form_email"] ?><!-- Name --></label>
                    <input type="email" name="email" class="form-control" id="email">
                    <br />
                    <input type="reset" value="<?=$L["reset"] ?>" class="btn btn-success active-button">
                    <input type="submit" value="Add Member" class="btn btn-warning">
                </form>
            </div>
        </div>
        <?php include_once("../includes/footer.php"); ?>
    </div>
    
    </body>
</html>