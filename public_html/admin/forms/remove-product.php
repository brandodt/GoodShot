<?php
include_once '../../includes/db/connection.php';
$db = new Database();
$conn = $db->connect();
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    // Validate and sanitize form data
    $product_id = $_POST['product_id'];
    $quantity_to_remove = $_POST['quantity'];
    $remove_all = isset($_POST['remove_all']) ? true : false;

    // Check if product exists
    $select_query = "SELECT * FROM products WHERE product_id = ?";
    $stmt = $conn->prepare($select_query);
    $stmt->bind_param("i", $product_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Product exists, perform removal logic
        $product = $result->fetch_assoc();

        if ($remove_all) {
            // Remove all quantity of the product
            $delete_query = "UPDATE products SET quantity = 0 WHERE product_id = ?";
            $stmt = $conn->prepare($delete_query);
            $stmt->bind_param("i", $product_id);
        } else {
            // Remove specified quantity
            $new_quantity = $product['quantity'] - $quantity_to_remove;

            if ($new_quantity < 0) {
                $message = "Error: Cannot remove more than available quantity.";
            } else {
                $update_query = "UPDATE products SET quantity = ? WHERE product_id = ?";
                $stmt = $conn->prepare($update_query);
                $stmt->bind_param("ii", $new_quantity, $product_id);
            }
        }

        if ($stmt->execute()) {
            $message = "Product removal successful!";
        } else {
            $message = "Error removing product: " . $stmt->error;
        }
    } else {
        $message = "Error: Product with ID $product_id not found.";
    }

    // Close statement and connection
    $stmt->close();
    $conn->close();
} else {
    $message = "Form submission error: Form not submitted correctly.";
}

// Redirect or display notification back to the user
header("Location: ../inventory.php?message=" . urlencode($message));
exit();
