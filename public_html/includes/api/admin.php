<?php
header('Content-Type: application/json');
require_once "../db/connection.php";

$db = new Database();
$conn = $db->connect();

$input = json_decode(file_get_contents('php://input'), true);
$password = $input['password'] ?? '';

if (empty($password)) {
    echo json_encode(["success" => false, "message" => "Password is required."]);
    exit;
}

if ($conn->connect_error) {
    echo json_encode(["success" => false, "message" => "Connection failed: " . $conn->connect_error]);
    exit;
}

$stmt = $conn->prepare("SELECT password FROM users WHERE role='admin' LIMIT 1");
$stmt->execute();

$result = $stmt->get_result();
$row = $result->fetch_assoc();

if ($row && $password === $row['password']) {
    echo json_encode(["success" => true]);
} else {
    echo json_encode(["success" => false, "message" => "Incorrect password."]);
}

$stmt->close();
$conn->close();
