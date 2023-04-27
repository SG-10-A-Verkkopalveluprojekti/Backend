<?php

require_once '../inc/headers.php';
require_once '../inc/functions.php';

$dbcon = createDbConnection();

// $sql = "ALTER TABLE product
    // ADD lowered_price double (10,2)";

// $statement = $dbcon->prepare($sql);
// $statement->execute();

// $product_id = 31;
// $price_multiplier = 0.75;

// $sql = "UPDATE product
//     SET lowered_price = $price_multiplier * price
//     WHERE product_id = $product_id";

// $statement = $dbcon->prepare($sql);
// $statement->execute();