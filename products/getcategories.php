<?php

require_once '../inc/headers.php';
require_once '../inc/functions.php';

try {
    $dbcon = createDbConnection();
    selectAsJsonCategories($dbcon,'select * from category');
}
catch (PDOException $pdoex) {
    returnError($pdoex);
}