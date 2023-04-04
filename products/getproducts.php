<?php
require_once '../inc/headers.php';
require_once '../inc/functions.php';

//$uri = parse_url(filter_input(INPUT_SERVER,'PATH_INFO'),PHP_URL_PATH);
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

$parameters = explode('/',$uri);
//print_r($parameters);
$category_id = $parameters[3];

try {
    
    $dbcon = createDbConnection();
    $sql = "select * from category where category_num = $category_id";
    $query = $dbcon->query($sql);
    $category = $query->fetch(PDO::FETCH_ASSOC);

    $sql = "select * from product where category_num = $category_id";
    $query = $dbcon->query($sql);
    $products = $query->fetchAll(PDO::FETCH_ASSOC);

    header('HTTP/1.1 200 OK');
    echo json_encode(array (
        "category" => $category['name'],
        "products" => $products
    ));
}
catch (PDOException $pdoex) {
    returnError($pdoex);
}