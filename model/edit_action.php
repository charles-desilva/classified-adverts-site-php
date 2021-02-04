<?php
include_once("../includes/head.php"); 
include_once("../includes/head_admin_only.php");
//1. collect data submitted via the form on the previous page

$model_id=$_POST["id"];
$brand_id = $_POST["brand"];
$model = $_POST["name"];

//echo $name.$email.$password.$password_conf;

// 2. Process data
$errors = "";

if($brand_id==""){
    $errors .= "Brand must be selected<br />";
}
if(strlen($model)<3){
    $errors .= "Model Name must have atleast 3 charachters<br />";
}

if(!$errors){
    // Update record in the Database
    include_once("../includes/db_connect.php");
    
    $sql = "UPDATE model SET brand_id = '$brand_id', name='$model' WHERE id=$model_id";
    
    if(mysqli_query($con, $sql)){
        header("location:list.php?msg=Model updated successfully!&status=successful");
    }else{
        echo "Error: ". mysqli_error($con);
    }

}else{
    header("location:list.php?msg=$errorsModel&status=failed");
}

?>