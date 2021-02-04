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
                <h2>Members List <a href="add.php" class="btn btn-success float-right"><?=$L["add"] ?></a></h2>
                
                <table class="table">
                    <tr>
                        <th>Member ID</th>
                        <th>Member Name</th>
                        <th>Member Email</th>
                        <th>Member Mobile</th>
                        <th>Listing Count</th>
                        <th><?=$L["options"] ?></th>
                    </tr>
                    <?php
                        include_once("../includes/db_connect.php");
                        $sql = "SELECT *, (SELECT count(id) FROM car WHERE car.member_id=member.id) AS count 
                        FROM member";
                        $result = mysqli_query($con, $sql);

                        while($row = mysqli_fetch_array($result)){
                    ?>
                    <tr>
                        <td><?=$row["id"]?></td>
                        <td><?=$row["name"]?></td>
                        <td><?=$row["email"]?></td>
                        <td><?=$row["mobile"]?></td>
                        <td><?=$row["count"]?></td>
                        <td>
                        <a href="edit.php?id=<?=$row["id"]?>" class = "btn btn-warning"><?=$L["edit"] ?></a>
                            <a href="delete_action.php?id=<?=$row["id"]?>" class = "btn btn-danger"><?=$L["delete"] ?></a>
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