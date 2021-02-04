<?php

//1. collect data submitted via the form on the previous page
$name= $_POST["name"];
$email= $_POST["email"];
$password= $_POST["password"];
$mobile = $_POST["phone"];
$password_conf= $_POST["password-conf"];

//echo $name.$email.$password.$password_conf;

// 2. Process data
$errors = "";

if(strlen($name)<5){
    $errors .= "Name must have atleast five charachters<br />";
}
if(strlen($password)<5){
    $errors .= "Password must have atlease five charachters<br />";
}
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors .= "Invalid Email address<br />";
}
if ($password != $password_conf){
    $errors .= "Password confimration does not match<br />";
}


// 2.2 Set Non fillables 
$join_date = date("Y-m-d");
$active = 1;
$role = "m";

// 2.3 Business Logics should implement here
$user = "94766222181";
$password = "7555";
$text = urlencode("Thankyou for registering $name");
$to = "94".$mobile;
 
$baseurl ="http://www.textit.biz/sendmsg";
$url = "$baseurl/?id=$user&pw=$password&to=$to&text=$text";
$ret = file($url);
 
$res= explode(":",$ret[0]);
 
if (trim($res[0])=="OK")
{
echo "Message Sent - ID : ".$res[1];
}
else
{
echo "Sent Failed - Error : ".$res[1];
}

if(!$errors){
    // Insert record into the Database
    include_once("includes/db_connect.php");
    
    $sql = "INSERT INTO member (name, email, password, mobile, active, role, join_date) VALUES ('$name', '$email', md5('$password'), '$mobile', '$active', '$role', '$join_date')";
    
    if(mysqli_query($con, $sql)){
        echo "<h1> Registered Successfuly </h1>";

    }else{
        echo "Error: ". mysqli_error($con);
    }

}else{
    header("location:register.php?msg=".$errors);

}

?>