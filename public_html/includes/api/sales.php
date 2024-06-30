<?php
header('Content-Type: application/json');
require_once '../db/connection.php'; // Adjust the path as necessary

$db = new Database();
$conn = $db->connect();

$data = json_decode(file_get_contents('php://input'), true);

if (isset($data['transactionNum']) && isset($data['products']) && is_array($data['products'])) {
    $transactionNum = $data['transactionNum'];

    // Start transaction
    $conn->begin_transaction();

    try {
        foreach ($data['products'] as $product) {
            $productId = $product['productId'];
            $quantitySold = $product['quantitySold'];
            $totalAmount = $product['totalAmount']; // Assuming totalAmount is provided in the request
            $cashierID = 2;

            // Update product stock
            $stmt = $conn->prepare("UPDATE products SET quantity = quantity - ? WHERE product_id = ?");
            $stmt->bind_param("ii", $quantitySold, $productId);

            if (!$stmt->execute()) {
                throw new Exception('Failed to update product stock: ' . $stmt->error);
            }

            // Record the sale
            $stmt = $conn->prepare("INSERT INTO sales (transactNo, cashier_id, product_id, quantity_sold, total_amount, sale_date) VALUES (?, ?, ?, ?, ?, NOW())");
            $stmt->bind_param("iiiid", $transactionNum, $cashierID, $productId, $quantitySold, $totalAmount);

            if (!$stmt->execute()) {
                throw new Exception('Failed to record sale: ' . $stmt->error);
            }
        }

        // Commit transaction
        $conn->commit();
        echo json_encode(['success' => true, 'message' => 'Stock updated and sales recorded successfully.']);
    } catch (Exception $e) {
        // Rollback transaction on error
        $conn->rollback();
        echo json_encode(['error' => $e->getMessage()]);
        http_response_code(500);
    }
} else {
    echo json_encode(['error' => 'Invalid request data.']);
    http_response_code(400);
}
