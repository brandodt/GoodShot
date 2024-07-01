<?php
header('Content-Type: application/json');

include '../../db/connection.php';
$db = new Database();
$conn = $db->connect();

$response = [];

try {
    // Get the posted data
    $data = json_decode(file_get_contents('php://input'), true);

    // Validate the required fields
    if (isset($data['product_id'])) {
        $product_id = $data['product_id'];

        // Prepare the SQL delete statement
        $stmt = $conn->prepare('DELETE FROM products WHERE product_id = ?');
        $stmt->bind_param('i', $product_id);
        $stmt->execute();

        // Check if the delete was successful
        if ($stmt->affected_rows > 0) {
            $response['status'] = 'success';
            $response['message'] = 'Product deleted successfully';
        } else {
            $response['status'] = 'error';
            $response['message'] = 'Failed to delete product';
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