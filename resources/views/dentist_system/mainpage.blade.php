<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Dental Appointment</title>
  <style>
    /* Basic Reset */
    * {
      box-sizing: border-box;
      margin: 0;
      padding: 0;
      font-family: Arial, sans-serif;
    }

    /* Navbar Styles */
    nav {
      background-color: #0077b6;
      padding: 15px 20px;
      color: white;
      display: flex;
      justify-content: space-between;
      align-items: center;
    }
    nav .logo {
      font-weight: bold;
      font-size: 1.5rem;
    }
    nav ul {
      list-style: none;
      display: flex;
      gap: 20px;
    }
    nav ul li a {
      color: white;
      text-decoration: none;
      font-weight: 500;
    }
    nav ul li a:hover {
      text-decoration: underline;
    }

    /* Main Content */
    .container {
      padding: 40px 20px;
      text-align: center;
    }

    h1 {
      margin-bottom: 30px;
      color: #023e8a;
    }

    /* Book Button */
    .btn {
      background-color: #0096c7;
      border: none;
      color: white;
      padding: 15px 30px;
      margin: 20px;
      font-size: 1.1rem;
      cursor: pointer;
      border-radius: 5px;
      transition: background-color 0.3s ease;
    }

    .btn:hover {
      background-color: #0077b6;
    }
  </style>
</head>
<body>

  <!-- Navbar -->
  <nav>
    <div class="logo">MEDICIO</div>
    <ul>
      <li><a href="#">Home</a></li>
      <li><a href="#">Services</a></li>
      <li><a href="#">Appointments</a></li>
      <li><a href="#">Contact</a></li>
    </ul>
  </nav>

  <!-- Main Content -->
  <div class="container">
    <h1>Welcome to MEDICIO Appointment</h1>
    <p>Book your appointment online in just a few clicks:</p>
    <button class="btn" onclick="window.location.href='/patient_status'">Book Appointment Online</button>
    <button class="btn" onclick="window.location.href='/dentist_login_page'">Dentist</button>
  </div>

</body>
</html>
