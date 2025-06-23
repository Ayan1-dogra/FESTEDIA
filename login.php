<?php
session_start();
include "db_conn.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Get user from DB using email
    $sql = "SELECT * FROM users WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if user exists
    if ($result->num_rows === 1) {
        $user = $result->fetch_assoc();

        // Verify password
        if (password_verify($password, $user['password'])) {
            $_SESSION['email'] = $user['email'];
            $_SESSION['fullname'] = $user['fullname']; // for dashboard
            header("Location: dashboard.php");
            exit();
        } else {
            header("Location: login.html?error=" . urlencode("Invalid email or password"));
            exit();
        }
    } else {
        header("Location: login.html?error=" . urlencode("Invalid email or password"));
        exit();
    }
}
?>