<?php
session_start();
include "database.php";

$database = new Database();
$db = $database->getConnection();

$userid = $_SESSION["custid"];
$packageid = $_SESSION["package"];
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
    <link rel="stylesheet" type="text/css" href="styles/nav_style.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body class="paymentpage">
    <?php
    /* arrays of authorised user */
    define("AUTHORISED_ROLES", ["1", "2", "3"]);

    /* Connect to FoodEdge database */
    include 'userinformation_class.php';
    $database = new Database();
    $db = $database->getConnection();

    /* Get current user's information */
    $user = new userInformation($db);
    $user->getCurrentUser($_SESSION['custid']);
    $user->checkAuthority(AUTHORISED_ROLES);
    ?>
    <?php include_once "navigation.php" ?>

    <div class="row">
        <div class="col-75">
            <div class="container">
                <form name="paymentform" onsubmit="return validateForm()" method="POST" action="receipt.php">
                    <div class="row">
                        <div class="col-50">
                            <h2 class="total">Your total is $<?php echo $totalprice ?></h2>
                            <h3 class="totaldes">Pay securely with a credit card or debit card.</h3>
                            <h2 id="formtitle">Personal Information</h2>
                            <label for="fname">Name</label>
                            <input type="text" id="fname" name="name" placeholder="Leon Lai" value="<?php echo $fname ?>">
                            <div class="erroredit" id="nameerror"></div>
                            <label for="femail">Email</label>
                            <input type="text" id="femail" name="email" placeholder="leon@example.com" value="<?php echo $email ?>">
                            <div class="erroredit" id="emailerror"></div>
                            <label for="fadd">Address for delivery</label>
                            <input type="text" id="fadd" name="address" placeholder="123, Lorong Donut, 11900 Donut City, Pulau Pinang" value="<?php echo $address ?>">
                            <div class="erroredit" id="adderror"></div>
                        </div>

                        <div class="col-50">
                            <h2 id="formtitle">Credit Card Information</h2>
                            <label for="cname">Name on Card</label>
                            <input type="text" id="cardname" name="cardname" placeholder="Leon">
                            <div class="erroredit" id="cnameerror"></div>
                            <label for="cnum">Card number</label>
                            <input type="text" id="cardnum" name="cardnumber" placeholder="1111 2222 3333 4444">
                            <div class="erroredit" id="cnumerror"></div>
                        </div>

                    </div>
                    <div class="exp">
                        <div class="expcell">
                            <label class="cmonth">Month</label>
                            <input type="text" id="cardmonth" name="cardmonth" placeholder="08">
                            <div class="erroredit" id="cmontherror"></div>
                        </div>
                        <div class="expcell">
                            <label class="cyear">Year</label>
                            <input type="text" id="cardyear" name="cardyear" placeholder="2020">
                            <div class="erroredit" id="cyearerror"></div>
                        </div>
                        <div class="expcell">
                            <label class="cvv">CVV</label>
                            <input type="text" id="cvv" name="cvv" placeholder="352">
                            <div class="erroredit" id="cvverror"></div>
                        </div>
                    </div>

                    <div>
                        <input type="submit" value="Continue to checkout" class="button">
                    </div>

                </form>
            </div>
        </div>
    </div>


    <?php include_once "footer.php" ?>
</body>

</html>