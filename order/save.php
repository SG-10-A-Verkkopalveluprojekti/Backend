<?php

require_once '../inc/headers.php';
require_once '../inc/functions.php';

$input = json_decode(file_get_contents('php://input'));

$fname = filter_var($input->firstname,FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$lname = filter_var($input->lastname,FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$address = filter_var($input->address,FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$zip = filter_var($input->zip,FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$city = filter_var($input->city,FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$cart = $input->cart;

try {
    $dbcon = createDbConnection();
    $dbcon->beginTransaction();

    //Insert customer
    $sql = "insert into customer (firstname, lastname, address, zip, city) values ('" .
        filter_var($fname,FILTER_SANITIZE_FULL_SPECIAL_CHARS) . "','" . 
        filter_var($lname,FILTER_SANITIZE_FULL_SPECIAL_CHARS) . "','" . 
        filter_var($address,FILTER_SANITIZE_FULL_SPECIAL_CHARS) . "','" . 
        filter_var($zip,FILTER_SANITIZE_FULL_SPECIAL_CHARS) . "','" . 
        filter_var($city,FILTER_SANITIZE_FULL_SPECIAL_CHARS) 
    . "')";

    $customer_id = executeInsert($dbcon,$sql);

    //Insert order
    $sql = "insert into orders (customer_id) values ($customer_id)";
    $order_id = executeInsert($dbcon,$sql);

    //Insert order rows by looping through cart (which is an array)
    foreach ($cart as $product) {
        $sql = "insert into order_row (order_id, product_id) values ("
        . 
            $order_id . "," . 
            $product->product_id
        . ")";
        executeInsert($dbcon,$sql);
    }

    $dbcon->commit(); //Commit transaction

    //return 200 status and customer id
    header('HTTP/1.1 200 OK');
    $data = array('id' => $customer_id);
    echo json_encode($data);
}
catch (PDOException $pdoex) {
    $dbcon->rollback(); //Error, rollback transaction
    returnError($pdoex);
}