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
  <title>Farewell Party</title>
  <link rel="stylesheet" href="style.css">
  <style>
    body {
      margin: 0;
      font-family: 'Segoe UI', sans-serif;
      background: url('https://media.licdn.com/dms/image/v2/D4E12AQFTiZtm9F_mXw/article-cover_image-shrink_720_1280/article-cover_image-shrink_720_1280/0/1703883583317?e=1756339200&v=beta&t=_fmLnK89YuL9TYtseRaq76UW8OtEG5CCImUQ-D6-VNw') no-repeat center center fixed;
      background-size: cover;
      color: white;
    }
    header.navbar {
      position: fixed;
      top: 0;
      width: 100%;
      background: rgba(0, 0, 0, 0.7);
      padding: 15px;
      display: flex;
      justify-content: center;
      z-index: 999;
    }
    header.navbar a {
      color: #fff;
      margin: 0 20px;
      text-decoration: none;
      font-weight: bold;
      transition: color 0.3s;
    }
    header.navbar a:hover {
      color: #ffcc00;
    }
    .event-container {
      margin-top: 100px;
      background: rgba(0, 0, 0, 0.6);
      backdrop-filter: blur(6px);
      padding: 40px;
      border-radius: 20px;
      text-align: center;
      box-shadow: 0 0 20px rgba(255, 255, 255, 0.2);
      width: 90%;
      max-width: 600px;
      margin-left: auto;
      margin-right: auto;
    }
    h1 { font-size: 36px; margin-bottom: 10px; }
    p { font-size: 18px; line-height: 1.5; }
    section {
      padding: 60px 20px;
      text-align: center;
    }
  </style>
</head>
<body>

  <header class="navbar">
    <a href="#place">Place</a>
    <a href="dashboard.php">Homepage</a>
    <a href="#about">About</a>
  </header>

  <div class="event-container">
    <h1>Farewell Party 2025</h1>
    <p>Date: April 26, 2025 | 10:00 AM – 04:00 PM</p>
    <p>Let’s celebrate the final memories together with laughter, love, and nostalgia 🎓🎉</p>
    <form id="registerForm">
      <input type="hidden" name="event_name" value="College Farewell Party 2025">
      <button type="submit" style="margin-top: 20px; padding: 10px 20px; font-size: 16px;">🎟 Register</button>
    </form>
  </div>

  <section id="place">
    <h2>📍 Venue</h2>
    <p>Auditorium Hall, Brainware University</p>
  </section>

  <section id="about">
    <h2>🎈 About the Farewell</h2>
    <p>The Farewell Party 2025 honors our outgoing batch with heartfelt memories, performances, and gratitude. Let’s give them a send-off they’ll never forget!</p>
  </section>

  <script>
    const form = document.getElementById('registerForm');
    form.addEventListener('submit', function(e) {
      e.preventDefault();
      const formData = new FormData(form);
      fetch('register.php', {
        method: 'POST',
        body: formData
      })
      .then(res => res.json())
      .then(data => {
        alert(data.message);
        if (data.message === "Registration successful") {
          form.querySelector("button").innerText = "✅ Registered";
          form.querySelector("button").disabled = true;
        }
      })
      .catch(() => {
        alert("Something went wrong!");
      });
    });
  </script>

</body>
</html>