<?php

require_once '../inc/headers.php';
require_once '../inc/functions.php';

try {
    $dbcon = createDbConnection(); 
    $dbcon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $jsonData = file_get_contents("php://input");
    $data = json_decode($jsonData, true);

    $sql = "INSERT INTO feedback (name, email, message) VALUES (:name, :email, :message)";
    $stmt = $dbcon->prepare($sql);

    $stmt->bindParam(':name', $data['name'], PDO::PARAM_STR);
    $stmt->bindParam(':email', $data['email'], PDO::PARAM_STR);
    $stmt->bindParam(':message', $data['message'], PDO::PARAM_STR);

    if ($stmt->execute()) {
        http_response_code(201);
        echo json_encode(["message" => "Feedback was created."]);
    } else {
        http_response_code(503);
        echo json_encode(["message" => "Unable to create feedback."]);
    }
    
} catch (PDOException $exception) {
    http_response_code(500);
    echo json_encode(["message" => "Error: " . $exception->getMessage()]);
}

