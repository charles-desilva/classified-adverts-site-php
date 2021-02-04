<?php define("PATH", "http://localhost/im/car_sale/")?>
<link rel="shortcut icon" href="../favicon.png" />

<title>Car Classifieds | Your Search for Cars Stops Here</title>

<!-- CSS Files -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<link rel="stylesheet" href="<?=PATH?>css/app.css">

<!-- JS files -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="<?=PATH?>js/app.js"></script>

<?php
$lang = "en";
    if(isset($_GET["lang"])){
        $lang = $_GET["lang"];
    }
    $L = parse_ini_file(PATH."languages/$lang.ini");
    //echo PATH."languages/$lang.ini";
?>
