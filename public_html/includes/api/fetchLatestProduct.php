<?php
include '../db/connection.php';
$db = new Database();
$conn = $db->connect();

$query = "SELECT * FROM products ORDER BY date DESC LIMIT 1";
$result = $conn->query($query);

if ($result->num_rows > 0) {
    $product = $result->fetch_assoc();
    echo json_encode($product);
} else {
    echo json_encode(['error' => 'No products found']);
}
?>