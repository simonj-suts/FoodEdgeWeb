<?php
    include_once 'order_class.php';

    /* Get all records from Order table */
    $order = new Order($db);
    $order->setCustomerID($user->getCustomerID());
    $records = $order->readByUser();

    /* Separate records based on their order status: Pending/Delivered/Cancelled */
    $pending_rec = [];
    $cancelled_rec = [];
    $delivered_rec= [];

    for ($i=0;$i<count($records);$i++){
        switch (strtolower($records[$i]['order_status'])){
            case "pending":
                array_push($pending_rec,$records[$i]);
                break;
            case "cancelled":
                array_push($cancelled_rec,$records[$i]);
                break;
            default:
                array_push($delivered_rec,$records[$i]);
                break;
        }
    }

    // visibility of each table
    $pendTable_vis = count($pending_rec)==0 ? "style=\"display:none\"" : "";
    $delTable_vis= count($delivered_rec)==0 ? "style=\"display:none\"" : "";
    $cancelled_vis= count($cancelled_rec)==0 ? "style=\"display:none\"" : "";

    function createTable($orderStatus, $recs, $visibiliy){
        if ($orderStatus=="pending"){
            echo '<form action="updateorderlist.php" method="post"'. $visibiliy .' onsubmit="return setDefaultPage();">';
        }
        
        echo '<table class="order-table order-table-'.$orderStatus.'" '. $visibiliy .' >';
            echo '<caption>'.count($recs).' '.$orderStatus.' Order(s)</caption>';
            echo '<thead>';
                echo '<tr>';
                    echo '<th>Order ID</th>';
                    echo '<th>Date Ordered</th>';
                    echo '<th>Package Booked</th>';
                    echo '<th colspan="2">Event Details</th>';
                    if ($orderStatus=="pending"){
                        echo '<th>Status</th>';
                    }
                echo '</tr>';
            echo '</thead>';

            for ($i=0;$i<count($recs);$i++){
                echo "<tr>";
                    echo "<td  rowspan=\"4\" class=\"fkoff\">".$recs[$i]['order_id']."</td>";
                    echo "<td  rowspan=\"4\">".date_format(date_create($recs[$i]['order_date']),"dS F Y")."</td>";
                    echo "<td  rowspan=\"4\">".$recs[$i]['package_name']."</td>";
                    echo "<td class=\"noborder\"><b>Occasion</b></td>";
                    echo "<td class=\"noborder\">: ".$recs[$i]['occasion']."</td>";
                    if ($orderStatus=="pending"){
                        echo "<td rowspan=\"4\">";
                            echo "<div class=\"ol_customSelect\">";
                                echo "<select name=\"status_".$i."\">";
                                    echo "<option value=\"pending\">Pending</option>";
                                    echo "<option value=\"cancelled\">Cancel</option>";
                                echo "</select>";
                            echo "</div>";
                        echo "</td>";
                    }
                echo "</tr>";
                echo "<tr>";
                    echo "<td class=\"noborder\"><b>Venue</b></td>";
                    echo "<td class=\"noborder\">: ".$recs[$i]['address']."</td>";
                echo "</tr>";
                echo "<tr>";
                    echo "<td class=\"noborder\"><b>Time</b></td>";
                    echo "<td class=\"noborder\">: ".date_format(date_create($recs[$i]['event_time']),"g:i A")."</td>";
                echo "</tr>";
                echo "<tr>";
                    echo "<td class=\"noborder\"><b>Date</b></td>";
                    echo "<td class=\"noborder\">: ".date_format(date_create($recs[$i]['event_date']),"dS F Y")."</td>";
                echo "</tr>";
            }
        echo '</table>';
        if ($orderStatus=="pending"){
            popUpDisplay("popUpBox-OrderStatus","Order Status");
            echo '<div id="ol_buttonHolder">';
                echo '<button type="button" class="confirm-button"  onclick="confirmButton(\'OrderStatus\')">Submit</button>'; // hidden
                echo '<button class="cancel-button" type="reset">Reset</button>';
            echo '</div>';
            $_SESSION['fromProfile'] = true;
            echo '</form>';
        }
    }

    createTable("pending", $pending_rec, $pendTable_vis);
    createTable("delivered", $delivered_rec, $delTable_vis);
    createTable("cancelled", $cancelled_rec, $cancelled_vis);
?>