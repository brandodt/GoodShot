<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the data from the POST request
    $transactionNum = $_POST['transactionNum'] ?? '';
    $pdfData = $_POST['pdfData'] ?? '';

    // Debugging lines
    var_dump($transactionNum);  // Check if transactionNum is being received
    var_dump($pdfData);        // Check if pdfData is being received

    // Check for empty data
    if (empty($transactionNum) || empty($pdfData)) {
        echo json_encode(['success' => false, 'message' => 'Missing transaction number or PDF data']);
        exit;
    }

    // Decode the base64 string
    $pdfContent = base64_decode($pdfData);

    // Define the directory to save the PDF
    $saveDir = '../receipts/';

    // Ensure the directory exists
    if (!is_dir($saveDir)) {
        if (!mkdir($saveDir, 0777, true)) {
            echo json_encode(['success' => false, 'message' => 'Failed to create directory']);
            exit;
        }
    }

    // Define the file path
    $filePath = $saveDir . $transactionNum . '.pdf';
    var_dump($filePath);  // Debugging: Check the file path

    // Save the PDF file
    if (file_put_contents($filePath, $pdfContent)) {
        echo json_encode(['success' => true, 'message' => 'PDF saved successfully']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Failed to save PDF']);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Invalid request']);
}
