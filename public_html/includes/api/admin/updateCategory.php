<?php
header('Content-Type: application/json');

include '../../db/connection.php';
$db = new Database();
$conn = $db->connect();

$response = [];

try {
    $data = json_decode(file_get_contents('php://input'), true);

    if (isset($data['category_id']) && isset($data['category_name'])) {
        $category_id = $data['category_id'];
        $category_name = $data['category_name'];

        $stmt = $conn->prepare('UPDATE category SET category_name = ? WHERE category_id = ?');
        $stmt->bind_param('si', $category_name, $category_id);
        $stmt->execute();

        if ($stmt->affected_rows > 0) {
            $response['status'] = 'success';
            $response['message'] = 'Category updated successfully';
        } else {
            $response['status'] = 'error';
            $response['message'] = 'Failed to update category';
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