<?php
header('Content-Type: application/json');

include '../../db/connection.php';
$db = new Database();
$conn = $db->connect();

$response = [];

try {
    $data = json_decode(file_get_contents('php://input'), true);

    if (isset($data['product_id']) && isset($data['name']) && isset($data['category_id']) && isset($data['supplier_id']) && isset($data['quantity']) && isset($data['price'])) {
        $product_id = $data['product_id'];
        $name = $data['name'];
        $category_id = $data['category_id'];
        $supplier_id = $data['supplier_id'];
        $quantity = $data['quantity'];
        $price = $data['price'];

        $stmt = $conn->prepare('UPDATE products SET name = ?, category_id = ?, supplier_id = ?, quantity = ?, price = ? WHERE product_id = ?');
        $stmt->bind_param('siiidi', $name, $category_id, $supplier_id, $quantity, $price, $product_id);
        $stmt->execute();

        if ($stmt->affected_rows > 0) {
            $response['status'] = 'success';
            $response['message'] = 'Product updated successfully';
        } else {
            $response['status'] = 'error';
            $response['message'] = 'Failed to update product';
        }

        $stmt->close();
    } else {
        $response['status'] = 'error';
        $response['message'] = 'Invalid input';
    }
} catch (Exception $e) {
    $response['status'] = 'error';
    $response['message'] = 'An error occurred: ' . $e->getMessage();
}

$conn->close();
echo json_encode($response);
?>