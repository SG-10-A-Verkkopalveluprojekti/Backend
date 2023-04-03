<?php 

require_once '../inc/functions.php';
require_once '../inc/headers.php';

$uri = parse_url(filter_input(INPUT_SERVER,'PATH_INFO',PHP_URL_PATH));
$parameters = explode('/',$uri);
$product_id = $parameters[1];

try {
    $dbcon = createDbConnection();
    selectRowAsJson($dbcon,"select * from product where id = $product_id");
}
catch (PDOException $pdoex) {
    returnError($pdoex);
}