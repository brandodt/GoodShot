<?php
header('Content-Type: application/json');

include '../../db/connection.php'; // Adjust the path as per your project structure
$db = new Database();
$conn = $db->connect();

$response = [];

try {
    $totalItemsQuery = "SELECT c.category_id, COUNT(p.product_id) AS total_items
                        FROM products p 
                        RIGHT JOIN category c ON p.category_id = c.category_id 
                        GROUP BY c.category_id";

    $result = $conn->query($totalItemsQuery);

    if ($result) {
        $totalItems = [];
        while ($row = $result->fetch_assoc()) {
            $totalItems[$row['category_id']] = (int) $row['total_items'];
        }
        $response['status'] = 'success';
        $response['data'] = $totalItems;
    } else {
        $response['status'] = 'error';
        $response['message'] = 'Failed to fetch total items';
    }
} catch (Exception $e) {
    $response['status'] = 'error';
    $response['message'] = 'An error occurred: ' . $e->getMessage();
}

$conn->close();
echo json_encode($response);
?>