<?php
session_start();
include "database.php";

$database = new Database();
$db = $database->getConnection();

$userid = $_SESSION["custid"];
$packageid = $_SESSION["packageid"];
$address = $_SESSION["address"];

$resultpackage = mysqli_query($db, "SELECT * FROM package WHERE package_id LIKE '$packageid'");
$rowpackage = mysqli_fetch_assoc($resultpackage);
$totalprice = $rowpackage["price_per_pax"];

$r = mysqli_query($db, "SELECT * FROM userinformation WHERE CustomerID LIKE $userid");
$rowuser = mysqli_fetch_assoc($r);
$email = $rowuser['Email'];
$fname = $rowuser['CustomerFName'];
$lname = $rowuser['CustomerLName'];

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="Payment page" content="Customer Payment Page" />
    <link rel="stylesheet" type="text/css" href="form_table.css" />
    <script src="paymentvalidate.js"></script>
    <title>Payment page</title>
</head>

<body class="paymentpage">
    <div class="row">
        <div class="col-75">
            <div class="container">
                <form name="paymentform" onsubmit="return validateForm()" method="POST" action="receipt.php">
                    <div class="row">
                        <div class="col-50">
                            <h2 class="total">Your total is $<?php echo $totalprice?></h2> <!-- Example price, need booking.php to get the price,apply on sprint 2 -->
                            <h3 class="totaldes">Pay securely with a credit card or debit card.</h3>
                            <h2 id="formtitle">Personal Information</h2>
                            <label for="fname">Name</label>
                            <input type="text" id="fname" name="name" placeholder="Leon Lai" value="<?php echo $fname?>">
                            <label for="femail">Email</label>
                            <input type="text" id="femail" name="email" placeholder="leon@example.com" value="<?php echo $email?>">
                            <label for="fadd">Address for delivery</label>
                            <input type="text" id="fadd" name="address" placeholder="123, Lorong Donut, 11900 Donut City, Pulau Pinang" value="<?php echo $address?>">
                        </div>

                        <div class="col-50">
                            <h2 id="formtitle">Credit Card Information</h2>
                            <label for="cname">Name on Card</label>
                            <input type="text" id="cardname" name="cardname" placeholder="Leon">
                            <label for="cnum">Card number</label>
                            <input type="text" id="cardnum" name="cardnumber" placeholder="1111 2222 3333 4444">
                        </div>
                    </div>
                    <div class="exp">
                        <div class="expcell">
                            <label class="cmonth">Month</label>
                            <input type="text" id="cardmonth" name="cardmonth" placeholder="08">
                        </div>
                        <div class="expcell">
                            <label class="cyear">Year</label>
                            <input type="text" id="cardyear" name="cardyear" placeholder="2020">
                        </div>
                        <div class="expcell">
                            <label class="cvv">CVV</label>
                            <input type="text" id="cvv" name="cvv" placeholder="352">
                        </div>
                    </div>


                    <div>
                        <input type="submit" value="Continue to checkout" class="button">
                    </div>

                </form>
            </div>
        </div>
    </div>


</body>

</html>

<?php
session_unset();
session_destroy();
?>