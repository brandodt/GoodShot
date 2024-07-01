<?php
header('Content-Type: application/json');

include '../../db/connection.php';
$db = new Database();
$conn = $db->connect();

$suppliersQuery = "SELECT supplier_id, supplier_name FROM suppliers";
$result = $conn->query($suppliersQuery);

$suppliers = [];
while ($row = $result->fetch_assoc()) {
    $suppliers[] = $row;
}

$conn->close();
echo json_encode($suppliers);
?>