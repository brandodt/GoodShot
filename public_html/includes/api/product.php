<?php
header('Content-Type: application/json');
require_once "../db/connection.php";

$db = new Database();
$conn = $db->connect();

$productName = isset($_GET['productName']) ? "%" . $_GET['productName'] . "%" : "%";

$stmt = $conn->prepare("SELECT * FROM products WHERE name LIKE ? OR product_id LIKE ? OR category LIKE ?");
$stmt->bind_param("sss", $productName, $productName, $productName);
$stmt->execute();
$result = $stmt->get_result();
$products = $result->fetch_all(MYSQLI_ASSOC);
$stmt->close();
$conn->close();
echo json_encode($products);
