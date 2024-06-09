<?php
require_once "db.php";

$db = new Database();
$conn = $db->connect();

$productName = "%" . $_GET['productName'] . "%";

$stmt = $conn->prepare("SELECT * FROM products WHERE name LIKE ?");
$stmt->bind_param("s", $productName);

$stmt->execute();

$result = $stmt->get_result();

$products = $result->fetch_all(MYSQLI_ASSOC);

$stmt->close();
$conn->close();

echo json_encode($products);
