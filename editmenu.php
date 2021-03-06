<?php
session_start();
include "database.php";
include "package_class.php";
include 'userinformation_class.php';

$database = new Database();
$db = $database->getConnection();
define("AUTHORISED_ROLES",  ["2"]);

$user = new userInformation($db);
$user->getCurrentUser($_SESSION['custid']);
$user->checkAuthority(AUTHORISED_ROLES);

$package = new package($db);
?>
<?php include_once "navigation.php" ?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="Edit menu page" content="Operation team Edit Menu Page" />
    <link rel="stylesheet" type="text/css" href="form_table.css" />
    <title>Edit menu page</title>
    <script src="editmenu.js"></script>
    <link rel="stylesheet" type="text/css" href="editmenu.css" />
    <link rel="stylesheet" type="text/css" href="styles/nav_style.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://kit.fontawesome.com/cebce8210e.js" crossorigin="anonymous"></script>
</head>

<script>
    $(document).ready(function() {
        $('input[type="checkbox"]').on('change', function() {
            $('input[type="checkbox"]').not(this).prop('checked', false);
            if ($(".hidden").is(":visible") && ($('input[id="' + this.id + '"]').prop('checked') == false)) {
                $(".hidden").fadeOut();
            } else if ($('input[id="checkbox1"]').prop('checked')) {
                $(".hidden").fadeIn();
                <?php
                $_SESSION["packageid"] = 1;
                $packageid = 1;
                $rowpackage = $package->retrievePackage($packageid);
                $packagename = $rowpackage['package_name'];
                $packagecuisine = $rowpackage['package_cuisine'];
                $packagedesc = $rowpackage['package_desc'];
                $pax = $rowpackage['pax'];
                $price = $rowpackage['price_per_pax'];
				$id = $rowpackage['package_id'];
                ?>
                $('input[id="packagename"]').val('<?php echo $packagename; ?>');
                $('input[id="packagecuisine"]').val('<?php echo $packagecuisine; ?>');
                $('textarea[id="packagedesc"]').val('<?php echo $packagedesc; ?>');
                $('input[id="packagepax"]').val('<?php echo $pax; ?>');
                $('input[id="packageprice"]').val('<?php echo $price; ?>');
                $('input[id="packageid"]').val('<?php echo $id; ?>');
            } else if ($('input[id="checkbox2"]').prop('checked')) {
                $(".hidden").fadeIn();
                <?php
                $_SESSION["packageid"] = 2;
                $packageid = 2;
                $rowpackage = $package->retrievePackage($packageid);
                $packagename = $rowpackage['package_name'];
                $packagecuisine = $rowpackage['package_cuisine'];
                $packagedesc = $rowpackage['package_desc'];
                $pax = $rowpackage['pax'];
                $price = $rowpackage['price_per_pax'];
				$id = $rowpackage['package_id'];
                ?>
                $('input[id="packagename"]').val('<?php echo $packagename; ?>');
                $('input[id="packagecuisine"]').val('<?php echo $packagecuisine; ?>');
                $('textarea[id="packagedesc"]').val('<?php echo $packagedesc; ?>');
                $('input[id="packagepax"]').val('<?php echo $pax; ?>');
                $('input[id="packageprice"]').val('<?php echo $price; ?>');
				$('input[id="packageid"]').val('<?php echo $id; ?>');
            } else if ($('input[id="checkbox3"]').prop('checked')) {
                $(".hidden").fadeIn();
                <?php
                $_SESSION["packageid"] = 3;
                $packageid = 3;
                $rowpackage = $package->retrievePackage($packageid);
                $packagename = $rowpackage['package_name'];
                $packagecuisine = $rowpackage['package_cuisine'];
                $packagedesc = $rowpackage['package_desc'];
                $pax = $rowpackage['pax'];
                $price = $rowpackage['price_per_pax'];
				$id = $rowpackage['package_id'];
                ?>
                $('input[id="packagename"]').val('<?php echo $packagename; ?>');
                $('input[id="packagecuisine"]').val('<?php echo $packagecuisine; ?>');
                $('textarea[id="packagedesc"]').val('<?php echo $packagedesc; ?>');
                $('input[id="packagepax"]').val('<?php echo $pax; ?>');
                $('input[id="packageprice"]').val('<?php echo $price; ?>');
				$('input[id="packageid"]').val('<?php echo $id; ?>');
            } else if ($('input[id="checkbox4"]').prop('checked')) {
                $(".hidden").fadeIn();
                <?php
                $_SESSION["packageid"] = 4;
                $packageid = 4;
                $rowpackage = $package->retrievePackage($packageid);
                $packagename = $rowpackage['package_name'];
                $packagecuisine = $rowpackage['package_cuisine'];
                $packagedesc = $rowpackage['package_desc'];
                $pax = $rowpackage['pax'];
                $price = $rowpackage['price_per_pax'];
				$id = $rowpackage['package_id'];
                ?>
                $('input[id="packagename"]').val('<?php echo $packagename; ?>');
                $('input[id="packagecuisine"]').val('<?php echo $packagecuisine; ?>');
                $('textarea[id="packagedesc"]').val('<?php echo $packagedesc; ?>');
                $('input[id="packagepax"]').val('<?php echo $pax; ?>');
                $('input[id="packageprice"]').val('<?php echo $price; ?>');
				$('input[id="packageid"]').val('<?php echo $id; ?>');
            } else if ($('input[id="checkbox5"]').prop('checked')) {
                $(".hidden").fadeIn();
                <?php
                $_SESSION["packageid"] = 5;
                $packageid = 5;
                $rowpackage = $package->retrievePackage($packageid);
                $packagename = $rowpackage['package_name'];
                $packagecuisine = $rowpackage['package_cuisine'];
                $packagedesc = $rowpackage['package_desc'];
                $pax = $rowpackage['pax'];
                $price = $rowpackage['price_per_pax'];
				$id = $rowpackage['package_id'];
                ?>
                $('input[id="packagename"]').val('<?php echo $packagename; ?>');
                $('input[id="packagecuisine"]').val('<?php echo $packagecuisine; ?>');
                $('textarea[id="packagedesc"]').val('<?php echo $packagedesc; ?>');
                $('input[id="packagepax"]').val('<?php echo $pax; ?>');
                $('input[id="packageprice"]').val('<?php echo $price; ?>');
				$('input[id="packageid"]').val('<?php echo $id; ?>');
            }
        });
    });
</script>


<body class="editmenupage">
    <div class="content">
        <h2 class="title">Select package to edit:</h2>

        <div class="checkbox_container">
            <label class="option_item">
                <input type="checkbox" class="checkbox" name="checkbox" id="checkbox1">
                <div class="option_inner">
                    <div class="tickmark"></div>
                    <div class="packagename1">Package 1</div>
                </div>
            </label>
            <label class="option_item">
                <input type="checkbox" class="checkbox" name="checkbox" id="checkbox2">
                <div class="option_inner">
                    <div class="tickmark"></div>
                    <div class="packagename2">Package 2</div>
                </div>
            </label>
            <label class="option_item">
                <input type="checkbox" class="checkbox" name="checkbox" id="checkbox3">
                <div class="option_inner">
                    <div class="tickmark"></div>
                    <div class="packagename3">Package 3</div>
                </div>
            </label>
            <label class="option_item">
                <input type="checkbox" class="checkbox" name="checkbox" id="checkbox4">
                <div class="option_inner">
                    <div class="tickmark"></div>
                    <div class="packagename4">Package 4</div>
                </div>
            </label>
            <label class="option_item">
                <input type="checkbox" class="checkbox" name="checkbox" id="checkbox5">
                <div class="option_inner">
                    <div class="tickmark"></div>
                    <div class="packagename5">Package 5</div>
                </div>
            </label>
        </div>

        <div class="hidden">
            <form name="editmenuform" onsubmit="return validateForm()" method="POST" action="editmenuprocess.php">
                <h2 class="title">Package Information</h2>
                <div class="container">
                    <div class="row">
                    <label for="packagename">Package Name</label>
                        <input type="text" class="input" id="packagename" name="packagename" placeholder="Name" value="">
                        <div class="erroredit" id="nameerror"></div>
                        <label for="packagecuisine">Package cuisine</label>
                        <input type="text" class="input" id="packagecuisine" name="packagecuisine" placeholder="Cuisine" value="">
                        <div class="erroredit" id="cuisineerror"></div>
                        <label for="packagepax">Pax</label>
                        <input type="text" class="input" id="packagepax" name="packagepax" placeholder="50" value="">
                        <div class="erroredit" id="paxerror"></div>
                        <label for="packageprice">Price</label>
                        <input type="text" class="input" id="packageprice" name="packageprice" placeholder="600.00" value="">
                        <div class="erroredit" id="priceerror"></div>
                        <label for="packagedesc">Package Description</label>
                        <textarea rows="5" cols="60" class="input" name="packagedesc" id="packagedesc" placeholder="Description" value=""></textarea>
                        <div class="erroredit" id="descerror"></div>
			 <input type="hidden" id="packageid" name="packageid">
                    </div>
                </div>

                <div>
                    <input type="submit" value="Submit" class="button">
                </div>
            </form>

        </div>
    </div>
    <div class="footer">
        <?php include_once "footer.php" ?>
    </div>
</body>

</html>
