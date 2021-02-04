<?php
echo $_GET["msg"];
    if(isset($_GET["status"]) && $_GET["status"]=="successful"){
?>
    <div class="alert alert-success" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <?=$_GET["msg"]?></div>
<?php 
    } else if(isset($_GET["status"]) && $_GET["status"]=="fail"){
?>
    <div class="alert alert-alert-danger">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <?=$_GET["msg"]?></div>
<?php 
    } 
?>
<div class="alert alert-success" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <?=$_GET["msg"]?></div>