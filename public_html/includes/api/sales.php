<?php
header('Content-Type: application/json');

include '../db/connection.php';

$input = json_decode(file_get_contents('php://input'), true);

$cart = $input['cart'];
$totalAmount = $input['totalAmount'];
$cashierName = $input['cashierName'];
$pdf = $input['pdf'];

// Save the transaction to the database
$sql = "INSERT INTO sales (cart, totalAmount, cashierName, pdf) VALUES (?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ssss", json_encode($cart), $totalAmount, $cashierName, $pdf);

if ($stmt->execute()) {
    echo json_encode(['success' => true]);
} else {
    echo json_encode(['success' => false, 'message' => 'Failed to save invoice']);
}

$stmt->close();
$conn->close();
