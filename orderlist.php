<?php include_once "database.php" ?>
<?php include_once "userinformation_class.php" ?>
<?php include_once "order_class.php" ?>


<!DOCTYPE html>
<html lang="en">
    <!-- Description: A list of Customer's orders page for Operation Team -->
    <!-- Author: Simon Jingga -->
    <!-- Date: 06/10/2020 -->
    <!-- Validated: Ok 17/10/2020 -->

    <head>
		<title>Order List</title>
		<meta charset="utf-8"/>
		<meta name="author" content="Simon Jingga"/>
		<meta name="description" content="Order list page"/>
		<meta name="keywords" content="Order, List, Customer,status,edit"/>
		<meta name="viewport" content="width=device-width, initial-scale=1"/>
        <link rel="stylesheet" type="text/css" href="styles/nav_style.css"/>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	</head>

    <body id="orderpage_body">
        <?php
            /* arrays of authorised user */
            define("AUTHORISED_ROLES",["2"]);
            session_start();

            /* Connect to FoodEdge database */ 
            $database = new Database();
            $db = $database->getConnection();

            /* Get current user's information */
            $user = new userInformation($db);
            $user->getCurrentUser($_SESSION['custid']);
            $user->checkAuthority(AUTHORISED_ROLES);
            
            /* Get all records from Order table */
            $order = new Order($db);
            $records = $order->read();

            /* Separate records based on their order status: Pending or Delivered */
            $pending_rec = [];
            $delivered_rec= [];
            $pendTable_vis ="";
            $delTable_vis="";
            
            for ($i=0;$i<count($records);$i++){
                if (strtolower($records[$i]['order_status'])=="pending"){
                    array_push($pending_rec,$records[$i]);
                    continue;
                }
                array_push($delivered_rec,$records[$i]);
            }
            
            /* Hide table if there would be no records in it */
            if (count($pending_rec)==0){ $pendTable_vis="style=\"display:none\""; }
            if (count($delivered_rec)==0){ $delTable_vis="style=\"display:none\""; }
        ?>

        <?php include_once "navigation.php"?>
        <article  id="orderlist">
            <div>
                <h1>Customer's Orders</h1>
                <?php
                if (count($delivered_rec) && count($pending_rec) != 0){
                    echo "<a href=\"orderlist.php#topending\">See delivered orders  &#129123;</a>";
                } elseif (count($pending_rec) == 0){
                    echo "<p style=\"text-align:center\"><em>There are currently no pending orders...</em></p>";
                }
                ?>
            </div>
            
            <form action="updateorderlist.php" method="post" <?php echo $pendTable_vis ?> onsubmit="return confirm('Are you sure you want to change that order status?');" id="pending_form">
                <table id="orderlisttable_pend" >
                    <caption><?php echo count($pending_rec) ?> Pending Order(s)</caption>
                    <thead>
                        <tr>
                            <th>Order ID</th>
                            <th>Date Ordered</th>
                            <th>Customer</th>
                            <th>Package Booked</th>
                            <th colspan="2">Event Details</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            for ($i=0;$i<count($pending_rec);$i++){
                                echo "<tr>";
                                    echo "<td  rowspan=\"4\" class=\"fkoff\">".$pending_rec[$i]['order_id']."</td>";
                                    echo "<td  rowspan=\"4\">".date_format(date_create($pending_rec[$i]['order_date']),"dS F Y")."</td>";
                                    echo "<td  rowspan=\"4\">".$pending_rec[$i]['CustomerFName']." ".$pending_rec[$i]['CustomerLName']."</td>";
                                    echo "<td  rowspan=\"4\">".$pending_rec[$i]['package_name']."</td>";
                                    echo "<td class=\"noborder\"><b>Occasion</b></td>";
                                    echo "<td class=\"noborder\">: ".$pending_rec[$i]['occasion']."</td>";
                                    echo "<td rowspan=\"4\">";
                                        echo "<div class=\"ol_customSelect\">";
                                            echo "<select name=\"status_".$i."\">";
                                                echo "<option value=\"pending\">Pending</option>";
                                                echo "<option value=\"delivered\">Delivered</option>";
                                            echo "</select>";
                                        echo "</div>";
                                    echo "</td>";
                                echo "</tr>";
                                echo "<tr>";
                                    echo "<td class=\"noborder\"><b>Venue</b></td>";
                                    echo "<td class=\"noborder\">: ".$pending_rec[$i]['address']."</td>";
                                echo "</tr>";
                                echo "<tr>";
                                    echo "<td class=\"noborder\"><b>Time</b></td>";
                                    echo "<td class=\"noborder\">: ".date_format(date_create($pending_rec[$i]['event_time']),"g:i A")."</td>";
                                echo "</tr>";
                                echo "<tr>";
                                    echo "<td class=\"noborder\"><b>Date</b></td>";
                                    echo "<td class=\"noborder\">: ".date_format(date_create($pending_rec[$i]['event_date']),"dS F Y")."</td>";
                                echo "</tr>";
                            }
                        ?>
                    </tbody>
                </table>
                <div id="ol_buttonHolder">
                    <input type="submit" value="Save Changes">
                    <input type="reset" value="Cancel">
                </div>
            </form>
            <hr/>
            <?php
                if ((count($delivered_rec) && count($pending_rec) != 0)){
                    echo "<a href=\"orderlist.php#orderlist\" id=\"topending\">See pending orders &#129121;</a>";
                }
            ?>
            
            <table id="orderlisttable_deliv" <?php echo $delTable_vis ?>>
                <caption>Delivered</caption>
                <tr>
                    <th>Order ID</th>
                    <th>Date Ordered</th>
                    <th>Customer</th>
                    <th>Package Booked</th>
                    <th>Event Details</th>
                </tr>
                <?php
                    for ($i=0;$i<count($delivered_rec);$i++){
                        echo "<tr class=\"ol_row\">";
                            echo "<td class=\"fkoff\">".$delivered_rec[$i]['order_id']."</td>";
                            echo "<td>".date_format(date_create($delivered_rec[$i]['order_date']),"dS F Y")."</td>";
                            echo "<td>".$delivered_rec[$i]['CustomerFName']." ".$delivered_rec[$i]['CustomerLName']."</td>";
                            echo "<td>".$delivered_rec[$i]['package_name']."</td>";
                            echo "<td>";
                                echo "<p><b>Occasion:</b> ".$delivered_rec[$i]['occasion']."</p>";
                                echo "<p><b>Venue:</b> ".$delivered_rec[$i]['address']."</p>";
                                echo "<p><b>Time:</b> ".date_format(date_create($delivered_rec[$i]['event_time']),"g:i A")."</p>";
                                echo "<p><b>Date:</b> ".date_format(date_create($delivered_rec[$i]['event_date']),"dS F Y")."</p>";
                            echo "</td>";
                        echo "</tr>";
                    }
                ?>
            </table>
            <br/>
        </article>
        <?php include_once "footer.php" ?>
    </body>
</html>

<?php $database->closeConnection(); ?>