<?php
define("LOCAL_PATH", "C:/Users/ruwan/Documents/Ruwan/Industrial Masters/PHP Laravel/car_sale/");

if (!isset($_SESSION)){
    session_start();
}

//1. collect data submitted via the form on the previous page
$listing_title= $_POST["listing-title"];
$model= $_POST["model"];
$mileage= $_POST["mileage"];
$fuel_type= $_POST["fuel"];
$yom= $_POST["yom"];
$price= $_POST["price"];
$photo = "uploads/default.jpg";

$description= $_POST["description"];

$destFile = "uploads/".basename($_FILES["photo"]["name"]); // not using this since there can be duplicate files when we user user uploaded file name. new file name is created below. 
$sourceFile = $_FILES["photo"]["tmp_name"]; // the location of the file on the user machine. its a temp location. not the orginal location under Documents etc

// 2. Process data
$errors = "";

if(strlen($listing_title)<5){
    $errors .= "Listing title should be atleast 5 characherts long<br />";
}
if($model<1){
    $errors .= "Please select Model<br />";
}
if(strlen($mileage)<1){
    $errors .= "Please enter Milage<br />";
}
if($fuel_type<1){
    //echo $fuel;
    $errors .= "Please select fuel type<br />";
}
if (is_nan($yom) <> 1){
    if($yom<1885 || $yom>date("Y") ){
        $errors .= "Please enter valid Year of Manufacture<br />";
    }
} else{
    $errors .= "Please s number for Year of Manufacture<br />";
}

$file_extension = pathinfo($_FILES["photo"]["name"], PATHINFO_EXTENSION);
$allowed_image_extension = array("png", "jpg", "jpeg");

if (! file_exists($_FILES["photo"]["tmp_name"])) {
    $errors .= "Please attach photograph of car.<br />";
} else if (! in_array($file_extension, $allowed_image_extension)) {
    $errors .= "Please attach only png, jpg or jpeg files.<br />";   
} else if(($_FILES["photo"]["size"] > 2000000)){
    $errors .= "Image File size should be less than 2MB<br />";   
}
    
if(strlen($description)<10){
    $errors .= "Please enter atlease 10 charachters for description<br />";
}


// 2.2 Set Non fillables 
$date = date("Y-m-d");
$member_id = $_SESSION["ID"];
$sold = 0;
$view_count = 0;
$time = time();
$photo_filename= $member_id."_".time().".".$file_extension;
$destFile = LOCAL_PATH . "uploads/" . $photo_filename;

$moved = move_uploaded_file($sourceFile, $destFile);

if ($moved) {
    
} else {
    $errors .= "Error uploading files. Error Code: " . $_FILES;
}

if(!$errors){
    // Insert record into the Database
    include_once("../includes/db_connect.php");
    
    $sql = "INSERT INTO 
    car (title, description, model_id, member_id, fuel_type, year, mileage, price, photo, sold, view_count, date) 
    VALUES ('$listing_title', '$description', '$model', '$member_id', '$fuel_type', '$yom', '$mileage', '$price', '$photo_filename', '$sold', '$view_count', '$date')";
    
    if(mysqli_query($con, $sql)){
        header("location:list.php?msg=Car added successfully!&status=successful");

    }else{
        echo "Error: ". mysqli_error($con);
    }

}else{
    header("location:add.php?msg=".$errors);

}

?>