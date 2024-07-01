<?php
header('Content-Type: application/json');

include '../../db/connection.php';
$db = new Database();
$conn = $db->connect();

$searchTerm = isset($_GET['searchTerm']) ? $_GET['searchTerm'] : '';

$productQuery = "SELECT *
                 FROM products p
                 JOIN suppliers s ON p.supplier_id = s.supplier_id
                 JOIN category c ON p.category_id = c.category_id
                 WHERE p.product_id LIKE ? OR p.name LIKE ? OR c.category_name LIKE ? OR s.supplier_name LIKE ?
                 ORDER BY p.product_id ASC";

$stmt = $conn->prepare($productQuery);
$searchTermWildcard = '%' . $searchTerm . '%';
$stmt->bind_param('ssss', $searchTermWildcard, $searchTermWildcard, $searchTermWildcard, $searchTermWildcard);
$stmt->execute();
$result = $stmt->get_result();

$products = [];
while ($row = $result->fetch_assoc()) {
    $products[] = $row;
}

$conn->close();
echo json_encode($products);
