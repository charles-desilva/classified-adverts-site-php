<?php
if (!isset($_SESSION)){
    session_start();
}

//1. collect data submitted via the form on the previous page
$email= $_POST["un"];
$password= $_POST["pw"];

// 2. Validate data
$errors = "";

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors .= "Invalid Email address<br />";
}
if(strlen($password)<5){
    $errors .= "Password must have atlease five charachters<br />";
}

if(!$errors){
    // chaeck with database record into the Database
    include_once("includes/db_connect.php");
    
    $sql = "SELECT * FROM member WHERE (email ='$email' AND password=md5('$password'))";
    $result = mysqli_query($con, $sql);

    if($row= mysqli_fetch_array($result)){ // if there is a user
        //login succcess
        // Assing variables to session
        $_SESSION["ID"]= $row["id"];
        $_SESSION["NAME"]= $row["name"];
        $_SESSION["ROLE"]= $row["role"];
        // redirect to index page
        header("location:index.php");
    }else{
        //login falied
        header("location:login.php?msg=Invalid Username or Password!&status=failed");
    }
   
}else{
    header("location:login.php?msg=$errors&status=failed");

}
?>