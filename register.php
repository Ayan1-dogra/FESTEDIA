<?php
include "db_conn.php";
session_start();

if (!isset($_SESSION['email'])) {
  echo json_encode(["message" => "User not logged in"]);
  exit();
}

$email = $_SESSION['email'];

$user_query = $conn->prepare("SELECT fullname, department, roll, semester, phone FROM users WHERE email = ?");
$user_query->bind_param("s", $email);
$user_query->execute();
$user_query->store_result();

if ($user_query->num_rows > 0) {
    $user_query->bind_result($fullname, $department, $roll, $semester, $phone);
    $user_query->fetch();

    $event_name = $_POST['event_name'];
    $stmt = $conn->prepare("INSERT INTO registrations (fullname, email, event_name, department, roll, semester, phone) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssss", $fullname, $email, $event_name, $department, $roll, $semester, $phone);

    if ($stmt->execute()) {
        echo json_encode(["message" => "Registration successful"]);
    } else {
        echo json_encode(["message" => "Error occurred"]);
    }
} else {
    echo json_encode(["message" => "User not found"]);
}
?>