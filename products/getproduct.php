<?php 

require_once '../inc/functions.php';
require_once '../inc/headers.php';

// $uri = parse_url(filter_input(INPUT_SERVER,'PATH_INFO'),PHP_URL_PATH);
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$parameters = explode('/',$uri);
$product_id = $parameters[3];

try {
    $dbcon = createDbConnection();
    selectRowAsJson($dbcon,"select * from product where product_id = $product_id");
}
catch (PDOException $pdoex) {
    returnError($pdoex);
}