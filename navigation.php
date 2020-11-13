<script src="javascript/navigationScript.js"></script>

<?php

// get drop-down menu contents based on user's role
function GetButtonContents($user_role,$username){
    echo "<li id=\"dropDown_nav\">";
    echo "<button onclick=\"showButtonContentNav(this)\" class=\"dropbtn_nav\">".$username." <i id=\"button_icon\"class=\"fa fa-caret-down\"></i></button>";
    echo "<div id=\"dropbtn_nav_div\" class=\"dropbtn_nav_contents\">";
    echo "<a href=\"profile.php\"><i class=\"fa fa-user\"></i> My Profile</a>";

    if ($user_role==2){
        echo "<a href=\"feedbacklist.php\"><i class=\"fa fa-comments-o\"></i> View Feedback</a>";
        echo "<a href=\"orderlist.php\"><i class=\"fa fa-cutlery\"></i> View Orders</a>";
    }
    elseif ($user_role==3){
        echo "<a href=\"feedbacklist.php\"><i class=\"fa fa-comments-o\"></i> View Feedback</a>";
        echo "<a href=\"statistics.php\"><i class=\"fa fa-bar-chart\"></i> View Statistics</a>";
        
    }

    echo "<a href=\"logOut.php\"><i class=\"fa fa-sign-out\"></i> Log Out</a>";
    echo "</div>";
    echo "</li>";
}

// change content of navigation bar based on current user's role
function changeNavContentByRole($user_role,$username){
    if (empty($user_role)){
        echo "<li><a href=\"cust_login.php\" class=\"dropbtn_nav\">Log In</a></li>";
        echo "<li><a href=\"registration.php\">Sign Up</a></li>";
    } else {
        echo GetButtonContents($user_role,$username);
        echo "<li><a href=\"bookingform.php\">Book Now</a></li>";
    }
}

?>

<nav>
    <ul>
        <li id="logo-navbar-placeholder"><a href="index.php" ><img src="media/foodedgelogo.png" alt="company logo" class="logo-icon"></a></li>
        <?php changeNavContentByRole($user->getUserRole(),$user->getCustomerLastName()); ?>
        <li><a href="menu.php">Our Menus</a></li>
    </ul>
</nav>