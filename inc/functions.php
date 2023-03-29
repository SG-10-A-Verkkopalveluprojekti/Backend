<?php

function createDbConnection(){
    $ini = parse_ini_file("myconf.ini");

    $host = $ini["host"];
    $db = $ini["db"];
    $username = $ini["username"];
    $pw = $ini["pw"];

    try{
    $dbcon = new PDO("mysql:host=$host;dbname=$db", $username, $pw);
    echo "onnistui";
        return $dbcon;
    }catch( PDOException $e){
        echo $e->getMessage();
    }

    return null;
}

function returnErr(PDOException $pdoex) {
    header('HTTP/1.1 500 Internal Server Error');
    $error = array('error' => $pdoex->getMessage());
    print json_encode($error);
}