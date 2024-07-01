<?php
header('Content-Type: application/json');

include '../../db/connection.php';
$db = new Database();
$conn = $db->connect();

$response = [];

try {
    $data = json_decode(file_get_contents('php://input'), true);

    if (isset($data['category_name'])) {
        $category_name = $data['category_name'];

        // Find the next category_id
        $nextIdQuery = "SELECT MAX(category_id) AS max_id FROM category";
        $result = $conn->query($nextIdQuery);
        $row = $result->fetch_assoc();
        $nextCategoryId = $row['max_id'] + 1;

        $stmt = $conn->prepare('INSERT INTO category (category_id, category_name) VALUES (?, ?)');
        $stmt->bind_param('is', $nextCategoryId, $category_name);
        $stmt->execute();

        if ($stmt->affected_rows > 0) {
            $response['status'] = 'success';
            $response['message'] = 'Category added successfully';
        } else {
            $response['status'] = 'error';
            $response['message'] = 'Failed to add category';
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