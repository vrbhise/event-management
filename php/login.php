<?php
session_start();
require 'connect.php';


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE username='$username'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['password'])) {
            // Login successful, create session
            $_SESSION['username'] = $username;
            header("Location: localhost/event management/technical.html"); // Redirect to a page after login
            exit();
        } else {
            echo "Invalid password!";
        }
    } else {
        echo "No account found with that username!";
    }

    $conn->close();
}
?>
