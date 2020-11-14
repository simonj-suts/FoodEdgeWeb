<?php
    include_once 'order_class.php';

    /* Get all records from Order table */
    $order = new Order($db);
    $records = $order->read();

    /* Separate records based on their order status: Pending or Delivered */
    $pending_rec = [];
    $delivered_rec= [];
    $pendTable_vis ="";
    $delTable_vis="";

    function createTable($orderStatus){
        <
    }
?>