<?php
session_start();
if (!isset($_SESSION['email'])) {
  header("Location: login.html");
  exit();
}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Dashboard</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <header>
    <h1>Welcome, <?php echo $_SESSION['email']; ?> 👋</h1>
    <nav>
      <a href="my_registrations.php">My Registrations</a>
      <a href="logout.php">Logout</a>
    </nav>
  </header>
  <section class="event-list">
    <div class="event-box">
      <h2>College Fest</h2>
      <p>Join our most exciting College Fest of 2025!</p>
      <a href="fest.php">View Details</a>
    </div>
    <div class="event-box">
      <h2>Farewell Party</h2>
      <p>Say goodbye to seniors with love and celebration.</p>
      <a href="farewell.php">View Details</a>
    </div>
  </section>
</body>
</html>