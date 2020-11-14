<?php
if (session_id() == '') {session_start();};
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

/* Check if form submitted */
if (isset($_POST['formName'])){
    $formName = $_POST['formName'];
} else {
    phpAlert('Unable to submit form. Please try again.');
    $_POST = array();
    echo '<script type="text/javascript">window.location.replace("profile.php")</script>';
}

/* function to create javascript alert box */
function phpAlert($msg) {
    echo '<script type="text/javascript">alert("' . $msg . '")</script>';
}

/* Validate and update user credentials */
if (isset($_POST['pass'])){
    if ($user->getPassword() == $_POST['pass']){
        if (isset($_POST['value-'.$formName])){
            $value = $_POST['value-'.$formName];
            $validValue = true;
            switch ($formName){
                case "FirstName":
                    $validValue = $user->setCustomerFirstName($value);
                    break;
                case "LastName":
                    $validValue = $user->setCustomerLastName($value);
                    break;
                case "Email":
                    $validValue = $user->setEmail($value);
                    break;
                case "PhoneNumber":
                    $validValue = $user->setPhoneNo($value);
                    break;
                default:
                    $validValue = false;
                    break;
            }

            $result = $validValue ? $user->updateUser() : "Failed to update. Input did not meet required format.";
            echo $result;
            phpAlert($result);
        } else {
            phpAlert('Value not set');
        }
    } else {
        phpAlert('Password Incorrect. Please try again.');
    }
} else {
    phpAlert('Password not set. Please try again.');
}

/* Redirect back to profile page */
echo '<script type="text/javascript">window.location.replace("profile.php")</script>';
?>