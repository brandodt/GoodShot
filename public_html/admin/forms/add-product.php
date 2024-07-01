<?php
include_once '../../includes/db/connection.php';
$db = new Database();
$conn = $db->connect();
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    // Validate and sanitize form data
    $product_name = $_POST['product_name'];
    $category_id = $_POST['category']; // Fetch the category_id from the form
    $supplier_id = $_POST['supplier_id'];
    $quantity = $_POST['quantity'];
    $price = $_POST['price'];
    $cost = $price * 0.50; // Assuming cost is calculated based on price

    // Initialize variables for image processing
    $target_file = "";
    $upload_ok = true;

    // Check if an image file is uploaded
    if (!empty($_FILES["image"]["name"])) {
        $target_dir = "../../assets/img/products/";
        $target_file = $target_dir . basename($_FILES["image"]["name"]);

        // Attempt to move the uploaded file
        if (!move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
            $upload_ok = false;
            $message = "Error uploading image.";
        }
    }

    // Check if the category_id exists in the category table
    $check_category_query = "SELECT * FROM category WHERE category_id = ?";
    $stmt = $conn->prepare($check_category_query);
    $stmt->bind_param("i", $category_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 0) {
        $message = "Invalid category ID.";
        $stmt->close();
        $conn->close();
        header("Location: ../inventory.php?message=" . urlencode($message));
        exit();
    }

    $stmt->close();

    // Check if product already exists in the database
    $select_query = "SELECT * FROM products WHERE name = ?";
    $stmt = $conn->prepare($select_query);
    $stmt->bind_param("s", $product_name);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Product exists, update the quantity
        // $existing_product = $result->fetch_assoc();
        // $new_quantity = $existing_product['quantity'] + $quantity;

        // $update_query = "UPDATE products SET quantity = ? WHERE name = ?";
        // $stmt = $conn->prepare($update_query);
        // $stmt->bind_param("is", $new_quantity, $product_name);

        // if ($stmt->execute()) {
        //     $message = "Quantity updated successfully!";
        // } else {
        //     $message = "Error updating quantity: " . $stmt->error;
        // }
    } else {
        // Product does not exist, insert new product
        $insert_query = "INSERT INTO products (supplier_id, category_id, name, price, cost, quantity, img_path, date)
                        VALUES (?, ?, ?, ?, ?, ?, ?, NOW())";
        $stmt = $conn->prepare($insert_query);
        $stmt->bind_param("iissdss", $supplier_id, $category_id, $product_name, $price, $cost, $quantity, $target_file);

        if ($stmt->execute()) {
            $message = "Product added successfully!";
        } else {
            $message = "Error adding product: " . $stmt->error;
        }
    }

    // Close statement
    $stmt->close();

    // Close connection
    $conn->close();
} else {
    $message = "Form submission error: Form not submitted correctly.";
}

// Redirect or display notification back to the user
header("Location: ../inventory.php?message=" . urlencode($message));
exit();
