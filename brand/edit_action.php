<?php
//1. collect data submitted via the form on the previous page
$name= $_POST["name"];
$id= $_POST["id"];


//echo $name.$email.$password.$password_conf;

// 2. Process data
$errors = "";

if(strlen($name)<3){
    $errors .= "Name must have atleast 3 charachters for Brand Name<br />";
}

if(!$errors){
    // Insert record into the Database
    include_once("../includes/db_connect.php");
    
    $sql = "UPDATE brand SET name='$name' WHERE id='$id'";
    //echo $sql;
    
    if(mysqli_query($con, $sql)){
        //echo "<h1> Brand Updated Successfuly </h1>";
        header("location:list.php?msg=Brand Updated successfully!&status=successful");

    }else{
        echo "Error: ". mysqli_error($con);
    }

}else{
    header("location:edit.php?msg=".$errors);

}

?>