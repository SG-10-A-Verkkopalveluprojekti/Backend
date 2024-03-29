<?php

function createDbConnection(){
    $ini = parse_ini_file("../confi.ini", true);

    $host = $ini["host"];
    $db = $ini["db"];
    $username = $ini["username"];
    $pw = $ini["pw"];

    try{
        $dbcon = new PDO("mysql:host=$host;dbname=$db", $username, $pw);
        return $dbcon;
    }catch( PDOException $e){
        echo $e->getMessage();
    }

    return null;
}

//Used for categories fetch
function selectAsJson(object $dbcon,string $sql): void {
    $query = $dbcon->query($sql);
    $results = $query->fetchAll(PDO::FETCH_ASSOC);

    //Removes html tags from each value in the $results array
    // foreach ($results as &$row) {
    //     foreach ($row as &$value) {
    //         $value = strip_tags($value);
    //     }
    // }

    header('HTTP/1.1 200 OK');
    echo json_encode($results);
}

//Used for categories fetch 2
function selectAsJsonCategories(object $dbcon,string $sql): void {
    $query = $dbcon->query($sql);
    $results = $query->fetchAll(PDO::FETCH_ASSOC);

    //Removes html tags from each value in the $results array
     foreach ($results as &$row) {
         foreach ($row as &$value) {
             $value = strip_tags($value);
         }
     }

    header('HTTP/1.1 200 OK');
    echo json_encode($results);
}

function selectRowAsJson(object $dbcon,string $sql): void {
    $query = $dbcon->query($sql);
    $results = $query->fetch(PDO::FETCH_ASSOC);
    header('HTTP/1.1 200 OK');
    echo json_encode($results);
}

function executeInsert(object $dbcon,string $sql): int {
    $query = $dbcon->query($sql);
    return $dbcon->lastInsertId();
}

function returnError(PDOException $pdoex) {
    header('HTTP/1.1 500 Internal Server Error');
    $error = array('error' => $pdoex->getMessage());
    print json_encode($error);
}