<?php
    if (session_id() == '') {session_start();};
    include_once "database.php";
    include_once "order_class.php";

    $database = new Database();
    $db = $database->getConnection();

    $order = new Order($db);
    $records = $order->read();

     /* Checks any changes to order status */
     $pending_rec = [];
     for ($i=0;$i<count($records);$i++){
        if ($records[$i]['order_status']=="pending"){
            array_push($pending_rec,$records[$i]);
        }
    }

     for ($i=0;$i<count($pending_rec);$i++){
         if (isset($_POST['status_'.$i])){
            $order->setOrderStatus($_POST['status_'.$i]);
            $order->updateOrderStatus($pending_rec[$i]['order_id']);
            unset($_POST['status_'.$i]);
        }
    }

    $database->closeConnection();

    if (isset($_SESSION['fromProfile'])){
        if ($_SESSION['fromProfile']==true){
            header("Location: profile.php");
            unset($_SESSION['fromProfile']);
        }
    } else{
        header("Location: orderlist.php");
    }
?>