<?php
define("LOCAL_PATH", "C:/Users/ruwan/Documents/Ruwan/Industrial Masters/PHP Laravel/car_sale/");

//1. collect data submitted via the form on the previous page
$id = $_POST["id"];
$listing_title= $_POST["listing-title"];
$model= $_POST["model"];
$mileage= $_POST["mileage"];
$fuel_type= $_POST["fuel"];
$yom= $_POST["yom"];
$price= $_POST["price"];
$photo = $_POST["photo-old"];
$member_id = 1;

$description= $_POST["description"];

$date = date("Y-m-d");
$member_id = 1;
$sold = 0;
$view_count = 0;
//$time = time();
//$photo_filename= $member_id."_".time().".".$file_extension;
//$destFile = LOCAL_PATH . "uploads/" . $photo_filename;
//echo ($_FILES["photo"]); die();
if(isset($_FILES["photo"]) && $_FILES["photo"]["name"] != ""){
    
    //$destFile = "uploads/".basename($_FILES["photo"]["name"]); // not using this since there can be duplicate files when we user user uploaded file name. new file name is created below. 
    $sourceFile = $_FILES["photo"]["tmp_name"]; // the location of the file on the user machine. its a temp location. not the orginal location under Documents etc


    $file_extension = pathinfo($_FILES["photo"]["name"], PATHINFO_EXTENSION);
    $allowed_image_extension = array("png", "jpg", "jpeg");
    $time = time();
    $photo_filename= $member_id."_".time().".".$file_extension;
    $destFile = LOCAL_PATH . "uploads/" . $photo_filename;

    //echo $destFile;
    

    if (! file_exists($_FILES["photo"]["tmp_name"])) {
        $errors .= "Please attach photograph of car.<br />";
    } else if (! in_array($file_extension, $allowed_image_extension)) {
        $errors .= "Please attach only png, jpg or jpeg files.<br />";   
    } else if(($_FILES["photo"]["size"] > 2000000)){
        $errors .= "Image File size should be less than 2MB<br />";   
    }

    if (move_uploaded_file($sourceFile, $destFile)){
        $photo = "'uploads/" . basename($_FILES["photo"]["name"])."'";
    }else{
        echo "error Uploading...";
    }
}else{
    $photo_filename = $photo;
}

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


    
if(strlen($description)<10){
    $errors .= "Please enter atlease 10 charachters for description<br />";
}


// 2.2 Set Non fillables 


/*$moved = move_uploaded_file($sourceFile, $destFile);

if ($moved) {
    
} else {
    $errors .= "Error uploading files. Error Code: " . $_FILES;
}*/

if(!$errors){
    // Insert record into the Database
    include_once("../includes/db_connect.php");
    
    $sql = "UPDATE car 
    SET title = '$listing_title', description = '$description', photo = '$photo_filename', model_id = '$model', member_id = '$member_id', fuel_type = '$fuel_type', year = '$yom', mileage = '$mileage', price = '$price', photo = '$photo_filename', sold = '$sold', view_count = '$view_count', date = '$date' 
    WHERE id = '$id'";
    
    if(mysqli_query($con, $sql)){
        header("location:list.php?msg=Car listing updated successfully!&status=successful");

    }else{
        echo "Error: ". mysqli_error($con);
    }

}else{
    header("location:edit.php?msg=$errors&id=$id");

}

?>