<?php
session_start(); // Start the session to manage user sessions

// Check if user is already logged in
if (isset($_SESSION['username'])) {
    header("Location: dashboard.php"); // Redirect to dashboard if already logged in
    exit;
}

// Check if the form is submitted via POST method
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    include 'connection.php'; // Include database connection script

    $username = $_POST["username"]; // Get the username from the form
    $password = $_POST["password"]; // Get the password from the form

    // Prepare SQL statement to fetch the hashed password for the given username
    $stmt = $conn->prepare("SELECT password FROM Players WHERE username = ?");
    $stmt->bind_param("s", $username); // Bind the username parameter
    $stmt->execute(); // Execute the prepared statement
    $result = $stmt->get_result(); // Get the result set

    if ($result->num_rows == 1) { // If there's exactly one matching username in the database
        $row = $result->fetch_assoc(); // Fetch the row
        $hashed_password = $row['password']; // Get the hashed password from the database

        if (password_verify($password, $hashed_password)) { // Verify the password
            // Password is correct, set the username session variable
            $_SESSION['username'] = $username;
            header("Location: dashboard.php"); // Redirect to the dashboard
            exit; // Stop further execution
        } else {
            // Password is incorrect, display an error message
            echo "<script>alert('Login error: wrong password!');</script>";
            echo "<script>window.location.href = 'index.html';</script>";
            exit; // Stop further execution
        }
    } else {
        // Username not found, display an error message
        echo "<script>alert('Login error: User not found!');</script>";
        echo "<script>window.location.href = 'index.html';</script>";
        exit; // Stop further execution
    }

    $stmt->close(); // Close the prepared statement
    $conn->close(); // Close the database connection
}
?>