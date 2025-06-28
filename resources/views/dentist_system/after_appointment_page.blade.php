<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Appointment Submitted - DentalCare</title>
  <style>
    * {
      box-sizing: border-box;
      margin: 0;
      padding: 0;
      font-family: Arial, sans-serif;
    }

    body {
      background-color: #ffffff;
      color: #333;
    }

    nav {
      background-color: #3fbbc0;
      padding: 15px 30px;
      color: #ffffff;
      display: flex;
      justify-content: center;
      align-items: center;
    }

    nav .logo {
      font-weight: bold;
      font-size: 1.5rem;
    }

    nav > div {
      width: 100%;
      max-width: 1200px;
      display: flex;
      justify-content: space-between;
      align-items: center;
    }

    nav ul {
      list-style: none;
      display: flex;
      gap: 20px;
      margin: 0;
      padding: 0;
    }

    nav ul li a {
      color: #ffffff;
      text-decoration: none;
      font-weight: 500;
      transition: color 0.3s;
    }

    nav ul li a:hover {
      color: #dff6f7;
    }

    .container {
      background-color: #ffffff;
      padding: 40px 20px;
      max-width: 600px;
      margin: 60px auto;
      border-radius: 10px;
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.05);
      text-align: center;
    }

    h1 {
      color: #444444;
      font-size: 1.8rem;
    }
  </style>
</head>
<body>

  <!-- Updated Navbar -->
  <nav>
    <div>
      <div class="logo">DentalCare</div>
      <ul>
        <li><a href="/home_page">HOME</a></li>
        <li><a href="#about">ABOUT</a></li>
        <li><a href="#">CONTACT</a></li>
      </ul>
    </div>
  </nav>

  <!-- Confirmation Message -->
  <div class="container">
    <h1>Your appointment has been submitted</h1>
  </div>

</body>
</html>
