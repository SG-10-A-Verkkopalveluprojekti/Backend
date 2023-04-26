<?php
require_once '../inc/headers.php';
require_once '../inc/functions.php';

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

$parameters = explode('/',$uri);
//print_r($parameters);
$phrase = $parameters[3];

try {
    $dbcon = createDbConnection();
    $sql = "select * from product where name like '%$phrase%'";
    selectAsJson($dbcon, $sql);
}
catch (PDOException $pdoex) {
    returnError($pdoex);
}

