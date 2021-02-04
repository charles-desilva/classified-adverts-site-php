<div class="col-md-3">
    <div class="card">

<?php
    if(isset($_SESSION["ROLE"])){
?>
    <div class="card" style="width:100%">
        <img class="card-img-top" src="<?=PATH?>uploads/profile_pic.png" alt="Card image">
        <div class="card-body">
            <h4 class="card-title"><?=$_SESSION["NAME"]?></h4>
            <p class="card-text">Some example text.</p>
            <?php if($_SESSION["ROLE"]== 'a') {?>
                <div style="width:100%" class="btn-group-vertical">
                    <a href="<?=PATH?>brand/list.php" class="btn btn-primary">Brands List</a>
                    <a href="<?=PATH?>model/list.php" class="btn btn-primary">Model List</a>
                    <a href="<?=PATH?>car/list.php" class="btn btn-primary">Car List</a>
                    <a href="<?=PATH?>member/list.php" class="btn btn-primary">Member List</a>
                </div>
            <?php } else {?>
                <div style="width:100%" class="btn-group-vertical">
                    <a href="<?=PATH?>car/mylist.php" class="btn btn-primary">My Cars List</a>
                    <a href="#" class="btn btn-primary">See Profile</a>
                </div>
            <?php } ?>
        </div>
    </div>
    
<?php
    }else{
?>
    <img src="<?=PATH?>images/side_banner.png" alt="">
<?php
    }
?>
    </div>
</div>