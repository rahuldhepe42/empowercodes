<?php
// Database configuration
$host = "localhost";
$user = "root";
$password = "";
$dbname = "ProductDB";

// Connect to MySQL
$conn = new mysqli($host, $user, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve form data
$name = $_POST['name'] ?? '';
$short_description = $_POST['short_description'] ?? '';
$long_description = $_POST['long_description'] ?? '';
$price = $_POST['price'] ?? '';
$quantity = $_POST['quantity'] ?? '';
$purchase_date = $_POST['purchase_date'] ?? '';
$vendor = $_POST['vendor'] ?? '';

// Validate data
if (!$name || !$short_description || !$long_description || !$price || !$quantity || !$purchase_date || !$vendor) {
    die("All fields are mandatory!");
}

// Prepare and bind statement
$stmt = $conn->prepare("INSERT INTO Products (name, short_description, long_description, price, quantity, purchase_date, vendor) VALUES (?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("sssdisd", $name, $short_description, $long_description, $price, $quantity, $purchase_date, $vendor);

// Execute and check result
if ($stmt->execute()) {
    echo "Product added successfully!";
} else {
    echo "Error: " . $stmt->error;
}

// Close connection
$stmt->close();
$conn->close();
?>
