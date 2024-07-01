<?php
header('Content-Type: application/json');

include '../../db/connection.php';
$db = new Database();
$conn = $db->connect();

$categoriesQuery = "SELECT category_id, category_name FROM category";
$result = $conn->query($categoriesQuery);

$categories = [];
while ($row = $result->fetch_assoc()) {
    $categories[] = $row;
}

$conn->close();
echo json_encode($categories);
?>