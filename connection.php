<?php
// Database connection parameters
$servername = "localhost";
$username = "your_username";
$password = "your_password";
$database = "your_database_name";
$port = "3307";

// Create connection
$conn = new mysqli($servername, $username, $password, $database,$port);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Prepare and bind parameters
    $stmt = $conn->prepare("INSERT INTO tbl_it106 (username, password, email) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $username, $password, $email);

    // Set parameters and execute
    $username = $_POST["username"];
    $password = $_POST["password"];
    $email = $_POST["email"];

    // Check if the email already exists
    $check_stmt = $conn->prepare("SELECT * FROM tbl_it106 WHERE email = ?");
    $check_stmt->bind_param("s", $email);
    $check_stmt->execute();
    $result = $check_stmt->get_result();

    if ($result->num_rows > 0) {
        // Email already exists, handle the error (redirect, show error message, etc.)
        echo "Email already exists!";
    } else {
        // Email does not exist, proceed with registration
        if ($stmt->execute()) {
            // Registration successful, redirect or show success message
            echo "Registration successful!";
            // Redirect to a success page
            // header("Location: registration_success.php");
            // exit();
        } else {
            // Registration failed, handle the error (redirect, show error message, etc.)
            echo "Error registering user!";
        }
    }

    // Close statements
    $stmt->close();
    $check_stmt->close();
}

// Close connection
$conn->close();
?>