<?php
//1.collect form data from post method in php.
    $name=$_POST["name"];
    $email=$_POST["email"];
    $mobile=$_POST["mobile"];
    $pw=$_POST["pw"];
    $confirm=$_POST["rpw"];

//2.process data
//2.1 validation
$errors = "";
if(strlen($name) <5){
    $errors .= "Namme must have 5 charactors min";
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $emailErr = "Invalid email format";
  }

  if($pw != $confirm){
      $errors .= "Password and confirm does not match";
  }

//2.2 non-fillables

$join_date = date("Y-m-d");

//2.3 bussiness logics should implement here.
if(!$errors){
    //3. insert record in to database.
    //3.1 database connect
    include_once("../includes/db.php");
    //3.3 create sql execute
    $sql="INSERT INTO member (name,email,mobile,pw,)VALUES('$name','$email','$mobile','$pw')";
    if(mysqli_query($con, $sql)){
            echo "<h1> Registration Successfull!</h1>";
    }else{
        echo "Error :" . mysqli_errno($con);
    }

}else{
    header("location:register.php?msg=".$errors);
}

?>