<?php
include_once("../includes/head.php"); 
include_once("../includes/head_admin_only.php");

//1. collect data submitted via the form on the previous page

$brand_id = $_POST["brand"];
$model = $_POST["model"];

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
    // Insert record into the Database
    include_once("../includes/db_connect.php");
    
    $sql = "INSERT INTO model (brand_id, name) VALUES ('$brand_id','$model')";
    //echo $sql;
    
    if(mysqli_query($con, $sql)){
        header("location:list.php?msg=Model Added successfully!&status=successful");
    }else{
        echo "Error: ". mysqli_error($con);
    }

}else{
    header("location:list.php?msg=$errorsModel&status=failed");

}

?>