<?php
if (!isset($_SESSION)){
    session_start();
}
if(!isset($_SESSION["ROLE"]) || $_SESSION["ROLE"] != "a"){
    header("location:".PATH."login.php");
}
?>     