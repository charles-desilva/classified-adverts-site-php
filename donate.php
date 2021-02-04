<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <?php include_once("includes/head.php"); ?>
       
        
    </head>
    <body>

    <div class="container">
        <?php include("includes/header.php"); ?>
        <div class="row" id="section2">
        <?php include_once("includes/sidebar.php"); ?>

            <div class="col-md-9">
                <h2>Donate Now</h2>
                <hr />
                <form method="post" action="https://sandbox.payhere.lk/pay/checkout">   
                    <input type="hidden" name="merchant_id" value="1215507">    <!-- Replace your Merchant ID -->
                    <input type="hidden" name="return_url" value="<?=PATH?>/return.php">
                    <input type="hidden" name="cancel_url" value="<?=PATH?>/cancel.php">
                    <input type="hidden" name="notify_url" value="<?=PATH?>/notify.php">  
                    <br><br>Item Details<br>
                    <input type="text" name="order_id" value="12345">
                    <input type="text" name="items" value="Car Sale advert"><br>
                    <input type="text" name="currency" value="LKR">
                    <input type="text" name="amount" value="100">  
                    <br><br>Customer Details<br>
                    <input type="text" name="first_name" value="Saman">
                    <input type="text" name="last_name" value="Perera"><br>
                    <input type="text" name="email" value="ruwan@pixel.lk">
                    <input type="text" name="phone" value="0777697697"><br>
                    <input type="text" name="address" value="No.1, Galle Road">
                    <input type="text" name="city" value="Colombo">
                    <input type="hidden" name="country" value="Sri Lanka"><br><br> 
                    <input type="submit" value="Pay Now">   
                </form>
            </div>
        </div>
        <?php include_once("includes/footer.php"); ?>
    </div>
    
    </body>
</html>