<?php
header('Content-Type: application/json');
require_once '../db/connection.php'; // Adjust the path as necessary

$db = new Database();
$conn = $db->connect();

$data = json_decode(file_get_contents('php://input'), true);

if (isset($data['products']) && is_array($data['products'])) {
    foreach ($data['products'] as $product) {
        $productId = $product['productId'];
        $quantitySold = $product['quantitySold'];

        $stmt = $conn->prepare("UPDATE products SET quantity = quantity - ? WHERE product_id = ?");
        $stmt->bind_param("ss", $quantitySold, $productId);

        if (!$stmt->execute()) {
            echo json_encode(['error' => 'Failed to update product stock.']);
            http_response_code(500);
            exit;
        }
    }

    echo json_encode(['success' => true, 'message' => 'Stock updated successfully.']);
} else {
    echo json_encode(['error' => 'Invalid request data.']);
    http_response_code(400);
}
