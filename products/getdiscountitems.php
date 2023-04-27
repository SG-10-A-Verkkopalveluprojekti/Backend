<?php

require_once '../inc/headers.php';
require_once '../inc/functions.php';

try {
    $dbcon = createDbConnection();
    selectAsJson($dbcon,"SELECT * FROM product WHERE lowered_price IS NOT NULL");
} catch (PDOException $pdoex) {
    returnError($pdoex);
}