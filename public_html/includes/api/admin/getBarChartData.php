<?php
// Include your database connection or any necessary initialization
include "../../db/connection.php";
$db = new Database();
$conn = $db->connect();

// Query to fetch top weekly revenue data
$topRevenueQuery = "SELECT DATE_FORMAT(sale_date, '%w') AS day_index, DATE_FORMAT(sale_date, '%a') AS day_of_week, SUM(total_amount) AS total_revenue
                    FROM sales
                    WHERE sale_date >= DATE_SUB(CURDATE(), INTERVAL 1 WEEK)
                    GROUP BY day_index, day_of_week
                    ORDER BY day_index";

$result = $conn->query($topRevenueQuery);

// Initialize arrays for labels and values
$labels = ["Sun", "Mon", "Tue", "Wed", "Thu", "Fri", "Sat"];
$values = array_fill(0, 7, 0); // Initialize with 0 for each day

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $day_index = (int) $row['day_index'];
        $values[$day_index] = (float) $row['total_revenue'];
    }
}

// Close database connection
$conn->close();

// Prepare data in JSON format
$data = [
    'weeklyRevenueLabels' => $labels,
    'weeklyRevenueValues' => $values,
];

// Output JSON data
header('Content-Type: application/json');
echo json_encode($data);
