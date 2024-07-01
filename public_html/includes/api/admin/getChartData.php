<?php
include_once '../../db/connection.php';

$db = new Database();
$conn = $db->connect();

// Query to fetch total items sold data
$totalSoldQuery = "SELECT DATE_FORMAT(sale_date, '%a') AS day_of_week, SUM(quantity_sold) AS total_sold
                  FROM sales
                  GROUP BY DATE_FORMAT(sale_date, '%a')
                  ORDER BY MIN(sale_date)";
$totalSoldResult = $conn->query($totalSoldQuery);

$totalSoldLabels = [];
$totalSoldValues = [];

// Process fetched data for total items sold
while ($row = $totalSoldResult->fetch_assoc()) {
    $totalSoldLabels[] = $row['day_of_week'];
    $totalSoldValues[] = (int) $row['total_sold']; // Ensure numeric value for chart
}

// Query to fetch top revenue data
$topRevenueQuery = "SELECT DATE_FORMAT(sale_date, '%a') AS day_of_week, SUM(total_amount) AS total_revenue
                    FROM sales
                    GROUP BY DATE_FORMAT(sale_date, '%a')
                    ORDER BY MIN(sale_date)";
$topRevenueResult = $conn->query($topRevenueQuery);

$topRevenueLabels = [];
$topRevenueValues = [];

// Process fetched data for top revenue
while ($row = $topRevenueResult->fetch_assoc()) {
    $topRevenueLabels[] = $row['day_of_week'];
    $topRevenueValues[] = (int) $row['total_revenue']; // Ensure numeric value for chart
}

// Prepare data to send as JSON
$data = [
    'totalSoldLabels' => $totalSoldLabels,
    'totalSoldValues' => $totalSoldValues,
    'topRevenueLabels' => $topRevenueLabels,
    'topRevenueValues' => $topRevenueValues,
];

// Send response as JSON
header('Content-Type: application/json');
echo json_encode($data);

// Close database connection
$conn->close();
