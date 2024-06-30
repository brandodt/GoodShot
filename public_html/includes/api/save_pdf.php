<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the data from the POST request
    $transactionNum = $_POST['transactionNum'];
    $pdfData = $_POST['pdfData'];

    // Decode the base64 string
    $pdfContent = base64_decode($pdfData);

    // Define the directory to save the PDF
    $saveDir = '../receipts/';

    // Ensure the directory exists
    if (!is_dir($saveDir)) {
        mkdir($saveDir, 0777, true);
    }

    // Define the file path
    $filePath = $saveDir . $transactionNum . '.pdf';

    // Save the PDF file
    if (file_put_contents($filePath, $pdfContent)) {
        echo json_encode(['success' => true, 'message' => 'PDF saved successfully']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Failed to save PDF']);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Invalid request']);
}
