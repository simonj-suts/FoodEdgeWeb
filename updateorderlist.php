<?php
    include_once "database.php";
    include_once "order_class.php";

    $database = new Database();
    $db = $database->getConnection();

    $order = new Order($db);
    $records = $order->read();

     /* Checks any changes to order status */
     $delivered_rec = [];
     for ($i=0;$i<count($records);$i++){
        if ($records[$i]['order_status']=="pending"){
            array_push($delivered_rec,$records[$i]);
        }
    }

     for ($i=0;$i<count($delivered_rec);$i++){
         if (isset($_POST['status_'.$i])){
            $order->setOrderStatus($_POST['status_'.$i]);
            $order->updateOrderStatus($delivered_rec[$i]['order_id']);
            unset($_POST['status_'.$i]);
        }
    }

    $database->closeConnection();

    header("Location: orderlist.php");
?>