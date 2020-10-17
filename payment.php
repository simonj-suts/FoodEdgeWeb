<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="Payment page" content="Customer Payment Page" />
    <link rel="stylesheet" type="text/css" href="form_table.css" />
    <script src="paymentjs.js"></script>
    <title>Payment page</title>
</head>

<body class="paymentpage">
    <div class="row">
        <div class="col-75">
            <div class="container">
                <form name="paymentform" onsubmit="return validateForm()" method="POST" action="receipt.php">
                    <div class="row">
                        <div class="col-50">
                            <h2 class="total">Your total is $250</h2> <!-- Example price, need booking.php to get the price,apply on sprint 2 -->
                            <h3 class="totaldes">Pay securely with a credit card or debit card.</h3>
                            <h3>Personal Information</h3>
                            <label for="fname">Full name</label>
                            <input type="text" id="fname" name="name" placeholder="Leon Lai">
                            <label for="femail">Email</label>
                            <input type="text" id="femail" name="email" placeholder="leon@example.com">
                            <label for="fadd">Address for delivery</label>
                            <input type="text" id="fadd" name="address"
                                placeholder="123, Lorong Donut, 11900 Donut City, Pulau Pinang">
                        </div>

                        <div class="col-50">
                            <h3>Credit Card Information</h3>
                            <label for="cname">Name on Card</label>
                            <input type="text" id="cardname" name="cardname" placeholder="Leon">
                            <label for="cnum">Card number</label>
                            <input type="text" id="cardnum" name="cardnumber" placeholder="1111-2222-3333-4444">
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