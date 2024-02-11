<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: index.html");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>DASHBOARD</title>
</head>
<body>
<div class="container">
    <h1>Welcome <?php echo $_SESSION['username']; ?></h1>
    <a href="logout.php">Logout</a>
</div>
</body>
</html>
