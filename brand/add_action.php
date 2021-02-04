<?php
//1. collect data submitted via the form on the previous page
$name= $_POST["name"];


//echo $name.$email.$password.$password_conf;

// 2. Process data
$errors = "";

if(strlen($name)<3){
    $errors .= "Name must have atleast 3 charachters for Brand Name<br />";
}

if(!$errors){
    // Insert record into the Database
    include_once("../includes/db_connect.php");
    
    $sql = "INSERT INTO brand (name) VALUES ('$name')";
    
    if(mysqli_query($con, $sql)){
        header("location:list.php?msg=New Brand added successfully!&status=successful");

    }else{
        echo "Error: ". mysqli_error($con);
    }

}else{
    header("location:add.php?msg=".$errors);

}

?>