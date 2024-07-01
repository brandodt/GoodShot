<?php
// Include your database connection or any necessary initialization
include "../../db/connection.php";
$db = new Database();
$conn = $db->connect();

// Example query to fetch category sales data
$categorySalesQuery = "SELECT c.category_name, SUM(s.quantity_sold) AS total_sold 
                       FROM products AS p
                       JOIN sales AS s ON p.product_id = s.product_id
                       JOIN category AS c ON p.category_id = c.category_id
                       GROUP BY category_name";
$result = $conn->query($categorySalesQuery);

$labels = [];
$values = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $labels[] = $row['category_name'];
        $values[] = (int) $row['total_sold'];
    }
}

// Close database connection
$conn->close();

// Prepare data in JSON format
$data = [
    'categoryLabels' => $labels,
    'categoryValues' => $values,
];

// Output JSON data
header('Content-Type: application/json');
echo json_encode($data);
