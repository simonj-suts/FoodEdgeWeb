<?php
    function changeFooterContentByRole($role){
        $role = strtolower($role);
        echo "<ul>";
        if ($role=="guest"){
            echo "<li><a href=\"cust_login.php\">Log In</a></li>";
            echo "<li><a href=\"registration.php\">Sign Up</a></li>";
        } else {
            echo "<li><a href=\"#profile\">My Profile</a></li>";
            if (strpos($role,"customer") !== false)
                echo "<li><a href=\"#orders\">My Orders</a></li>";
            else{
                if (strpos($role,"operation") !== false)
                    echo "<li><a href=\"orderlist.php\">Customers Orders</a></li>";
                elseif (strpos($role,"management") !== false)
                    echo "<li><a href=\"statistics.php\">View Statistics</a></li>";
                echo "<li><a href=\"#feedbackpage\">Customers Feedback</a></li>";
            } 
        }
        echo "</ul>";
    }

    function getUserRoleName($userrole){

        if (empty($userrole)){
            return "Guest";
        }

        switch ($userrole){
            case 1:
                return "Customer";
            case 2:
                return "Operation Team";
            case 3:
                return "Management Team";
            default:
                return "Guest";
        }
    }
?>

<footer>
    <div>
        <a href="index.php" >
            <img src="media/foodedgelogo.png" alt="company logo" class="logo-icon">
        </a>
    </div>
    <div>
        <p class="footer-section-header">Support</p>
        <ul>
            <li><a href="#feedback">Send feedback</a></li>
            <li><a href="mailto:101214970@students.swinburne.edu.my">Contact Developer</a></li>
        </ul>
    </div>
    <div>
        <p class="footer-section-header">FoodEdge</p>
        <ul>
            <li><a href="#aboutus">About Us</a></li>
            <li><a href="#menu">Our Menus</a></li>
            <li><a href="bookingform.php">Book Now</a></li>
        </ul>
    </div>
    <div>
        <?php
            echo "<p class=\"footer-section-header\">".getUserRoleName($user->getUserRole())."</p>";
            changeFooterContentByRole($user->getUserRole());
        ?>
    </div>
    <div>
        <p class="footer-section-header">FoodEdge &#8226; Last updated: 2020</p>
    </div>
</footer>