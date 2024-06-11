<?php
header('Content-Type: application/json');

$input = json_decode(file_get_contents('php://input'), true);
$password = $input['password'] ?? '';

if (empty($password)) {
    echo json_encode(["success" => false, "message" => "Password is required."]);
    exit;
}

require_once '../db.php';

$database = new Database();
$conn = $database->connect();

if ($conn->connect_error) {
    echo json_encode(["success" => false, "message" => "Connection failed: " . $conn->connect_error]);
    exit;
}

$query = "SELECT password FROM users WHERE role='admin' LIMIT 1";
$result = $conn->query($query);

if ($result) {
    $row = $result->fetch_assoc();
    if ($row && $password === $row['password']) {
        echo json_encode(["success" => true]);
    } else {
        echo json_encode(["success" => false, "message" => "Incorrect password."]);
    }
} else {
    echo json_encode(["success" => false, "message" => "Query error: " . $conn->error]);
}

$conn->close();
