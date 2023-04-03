<?php

require_once '../inc/headers.php';
require_once '../inc/functions.php';


try {
    $dbcon = createDbConnection();
    selectAsJson($dbcon,'select * from category');
}
catch (PDOException $pdoex) {
    returnError($pdoex);
}