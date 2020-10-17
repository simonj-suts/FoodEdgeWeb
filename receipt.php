<?php
include "database.php";

$formname = $_POST['name'];
$formemail = $_POST['email'];
$formadd = $_POST['address'];

$package_name;
$package_cuisine;
$pax;
$price_per_pax;
$phone;
$userid;
$packageid;
$totalprice;
$orderdate;

$database = new Database();
$db = $database->getConnection();

$resultuser = mysqli_query($db, "SELECT * FROM userinformation WHERE Email LIKE '$formemail'");
$rowuser = mysqli_fetch_assoc($resultuser);
$userid = $rowuser["CustomerID"];
$phone = $rowuser["PhoneNo"];

$resultorder = mysqli_query($db, "SELECT * FROM orders WHERE order_id LIKE 1"); //1 just for demo, need booking.php to get the order_id using session
$roworder = mysqli_fetch_assoc($resultorder);
$packageid = $roworder['package_id'];
$orderdate = $roworder['order_date'];

$resultpackage = mysqli_query($db, "SELECT * FROM package WHERE package_id LIKE '$packageid'");
$rowpackage = mysqli_fetch_assoc($resultpackage);
$package_name = $rowpackage["package_name"];
$package_cuisine = $rowpackage["package_cuisine"];
$pax = $rowpackage["pax"];
$price_per_pax = $rowpackage["price_per_pax"];

$totalprice = $price_per_pax;

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="Receipt page" content="Customer Receipt Page" />
    <link rel="stylesheet" type="text/css" href="style.css" />
    <title>Receipt page</title>
</head>

<body class="receiptpage">
    <div class="container">
        <div class="receipt-main">
            <div class="rowheader">
                <div class="receipt-text">
                    <div class="receipt-company-header">
                        <h5>FoodEdge.</h5>
                        <p>+6012456789</p>
                        <p>foodedge@example.com</p>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="receipt-header receipt-header-mid">
                    <div class="receipt-text">
                        <h5 class="custname"><?php echo $formname ?></h5>
                        <p class="custphone"><b>Mobile :</b><?php echo $phone ?> </p>
                        <p class="custemail"><b>Email :</b> <?php echo $formemail ?></p>
                        <p class="custadd"><b>Address for delivery:</b> <?php echo $formadd ?></p>
                    </div>
                    <div class="receipt-right">
                        <h1>Receipt</h1>
                    </div>
                </div>
            </div>

            <div class="row">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Description</th>
                            <th>PAX</th>
                            <th>Amount</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="payment1des"><?php echo $package_name ?></td>
                            <td class="pax1"><?php echo $pax ?></td>
                            <td class="payment1price"><?php echo $price_per_pax ?></td>
                        </tr>
                        <tr>
                            <td class="payment2des"></td>
                            <td class="pax2"></td>
                            <td class="payment2price"></td>
                        </tr>
                        <tr>
                            <td class="payment3des"></td>
                            <td class="pax3"></td>
                            <td class="payment3price"></td>
                        </tr>
                        <tr>

                            <td class="text-right">
                                <h2><strong>Total: </strong></h2>
                            </td>
                            <td class="">
                                <h2 class="pax"></h2>
                            </td>
                            <td class="text-left">
                                <h2 class="totalprice"><strong>RM<?php echo $totalprice ?></strong></h2>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="row-footer">
                <div class="receipt-header receipt-header-mid receipt-footer">
                    <div class="receipt-text">
                        <p><b>Date :</b> <?php echo $orderdate?></p>
                        <h5 style="color: rgb(140, 140, 140);">Thank you for your order!</h5>
                    </div>
                    <div class="receipt-right">
                        <h1>Sincerely by Foodedge</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>



</html>