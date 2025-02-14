<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

echo "<h2>Selamat datang, " . $_SESSION['username'] . "!</h2>";
echo "<p>Role: " . $_SESSION['role'] . "</p>";
echo '<a href="logout.php">Logout</a>';
?>
