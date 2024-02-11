<?php
session_start();

// Check if user is already logged in
if (isset($_SESSION['username'])) {
    header("Location: dashboard.php");
    exit;
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Include database connection
    include_once "connection.php";

    // Prepare and bind parameters
    $stmt = $conn->prepare("INSERT INTO players (username, password, email, ip) VALUES (?, ?, ?,?)");
    $stmt->bind_param("ssss", $username, $hashed_password,  $email, $ip ); // Use $hashed_password instead of $password

    // Set parameters and execute
    $username = $_POST["username"];
    $password = $_POST["password"];
    $email = $_POST["email"];
    $ip = $_SERVER['REMOTE_ADDR'];

    // Hash the password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Check if the email already exists
    $check_stmt = $conn->prepare("SELECT * FROM players WHERE email = ? OR username = ?");
    $check_stmt->bind_param("ss", $email, $username);
    $check_stmt->execute();
    $result = $check_stmt->get_result();

    if ($result->num_rows > 0) {
        // Email or username already exists, handle the error
        echo "<script> alert('Email or Username already exists!');
                      window.location.href = 'index.html';
              </script>";
    } else {
        // Email and username do not exist, proceed with registration

        if ($password == $_POST["confirmpassword"]) {
            if ($stmt->execute()) {
                // Registration successful, redirect or show success message
                echo "<script> alert('Registration successful!');
                                window.location.href = 'dashboard.php';
                      </script>";
            } else {
                // Registration failed, handle the error
                echo "<script> alert('Error registering user!');
                                window.location.href = 'index.html';
                      </script>";
            }
        } else {
            // Passwords do not match, handle the error
            echo "<script> alert('Passwords do not match!');
                            window.location.href = 'index.html';
                  </script>";
        }
    }

    // Close statements and connection
    $stmt->close();
    $check_stmt->close();
    $conn->close();
}
?>
