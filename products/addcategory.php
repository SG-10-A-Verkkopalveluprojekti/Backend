<?php

require_once '../inc/headers.php';
require_once '../inc/functions.php';

$input = json_decode(file_get_contents('php://input'));
$name = filter_var($input->name,FILTER_SANITIZE_FULL_SPECIAL_CHARS);

try {
    $dbcon = createDbConnection();
    $sql = "insert into category (name) values ('$name')";
    executeInsert($dbcon,$sql);
    $data = array('id' => $dbcon->lastInsertId(),'name' => $name);
    print json_encode($data);
}
catch (PDOException $pdoex) {
    returnError($pdoex);
}