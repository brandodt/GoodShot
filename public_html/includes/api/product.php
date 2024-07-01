<?php
header('Content-Type: application/json');
require_once "../db/connection.php";

$db = new Database();
$conn = $db->connect();

$productName = isset($_GET['productName']) ? "%" . $_GET['productName'] . "%" : "%";

$stmt = $conn->prepare("SELECT * FROM products p
                        JOIN category c ON p.category_id = c.category_id
                        WHERE name LIKE ? OR p.product_id LIKE ? OR c.category_name LIKE ?");
$stmt->bind_param("sss", $productName, $productName, $productName);
$stmt->execute();
$result = $stmt->get_result();
$products = $result->fetch_all(MYSQLI_ASSOC);
$stmt->close();
$conn->close();
echo json_encode($products);
