<?php

require_once '../inc/functions.php';
require_once '../inc/headers.php';

try {
    $dbcon = createDbConnection();
    selectAsJson($dbcon,'select * from category');
}
catch (PDOException $pdoex) {
    returnError($pdoex);
}