<!DOCTYPE html>
<html>
<head>
  <title>Admin Panel - Registered Users</title>
  <style>
    body { font-family: Arial; padding: 20px; background: #f5f5f5; }
    table { border-collapse: collapse; width: 80%; margin: auto; background: white; }
    th, td { border: 1px solid #ddd; padding: 10px; text-align: center; }
    th { background-color: #002244; color: white; }
    h2 { text-align: center; }
  </style>
</head>
<body>
<?php
$conn = new mysqli("localhost", "root", "", "eventdb"); 

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$result = $conn->query("SELECT * FROM users");

echo "<h2>Registered Users</h2>";
echo "<table><tr><th>ID</th><th>Name</th><th>Email</th></tr>";

while($row = $result->fetch_assoc()) {
  echo "<tr><td>".$row['id']."</td><td>".$row['fullname']."</td><td>".$row['email']."</td></tr>";
}

echo "</table>";
$conn->close();
?>
</body>
</html>
