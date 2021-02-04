<?php
include_once("../includes/head.php"); 
include_once("../includes/head_admin_only.php");

//1. collect data submitted via the form on the previous page
$id= $_GET["id"];


//echo $name.$email.$password.$password_conf;

// 2. Process data
$errors = "";

if(!$errors){
    // Insert record into the Database
    include_once("../includes/db_connect.php");
    
    $sql = "DELETE FROM model WHERE id='$id'";
    
    if(mysqli_query($con, $sql)){
        header("location:list.php?msg=Model deleted successfully!&status=successful");

    }else{
        echo "Error: ". mysqli_error($con);
    }

}else{
    header("location:list.php?msg=".$errors."&status=failed");

}

?>