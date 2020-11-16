<?php
if (session_id() == '') {session_start();}
include_once 'database.php';
include_once "userinformation_class.php";
include_once "order_class.php";

/* arrays of authorised user */
define("AUTHORISED_ROLES",["1","2","3"]);

/* Connect to FoodEdge database */ 
$database = new Database();
$db = $database->getConnection();

/* Get current user's information */
$user = new userInformation($db);
$user->getCurrentUser($_SESSION['custid']);
$user->checkAuthority(AUTHORISED_ROLES);

function popUpDisplay($popUpBoxID, $fieldName){
    $fieldNameStripped = preg_replace('/\s+/', '', $fieldName);

    echo '<div class="pInfo-popUpBox" id="'.$popUpBoxID.'">';
        echo '<h3>Changing '.$fieldName.'</h3>';
        echo '<p><em>Please enter your password to confirm your changes</em></p>';
        echo '<p>PASSWORD: <input type="password" name="pass" required="required"></p>';
        echo '<button class="confirm-button">Submit</button>';
        echo '<button type="reset" class="cancel-button" onclick="resetButton(\''.$fieldNameStripped.'\')">Cancel</button>';
    echo '</div>';
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Profile Page</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<meta name="description" content="FoodEdge Profile Page"/>
	<meta name="keywords" content="Web, programming"/>
	<meta name="author" content="Simon Jingga"/>
    <link rel="stylesheet" type="text/css" href="style.css"/>
    <link rel="stylesheet" type="text/css" href="form_table.css"/>
    <link rel="stylesheet" type="text/css" href="styles/nav_style.css"/>
    <link rel="stylesheet" type="text/css" href="styles/profile_style.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
    <script src="javascript/profileScript.js"></script>
</head>
<body style="margin:0">
    <?php include_once 'navigation.php' ?>
    <div id="dimScreen"></div>
    <article id="profile">
        <div id="profile-nav">
            <button class="buttonback" id="profile-info-button" onclick="displayProfile()">MY PROFILE</button>
            <?php
                if ($user->getUserRole()=="1"){
                    echo '<button class="buttonback" id="profile-order-button" onclick="displayOrder()">MY ORDERS</button>';
                }
            ?>
        </div>
        <div id="profile-content">
            <div id="profile-info"> <?php include_once 'profileinfo.php'; ?> </div>
            <div id="profile-order"> <?php include_once 'profileorder.php'; ?> </div>
        </div>
    </article>
    <?php include_once 'footer.php' ?>
</body>