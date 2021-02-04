<?php
if (!isset($_SESSION)){
    session_start();
}
if(!isset($_SESSION["ROLE"]) || $_SESSION["ROLE"] != "m"){

    header("location:".PATH."login.php");
}
?>     