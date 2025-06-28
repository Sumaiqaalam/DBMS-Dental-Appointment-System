<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Login - MEDICIO</title>
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
      max-width: 400px;
      margin: 40px auto;
      border-radius: 10px;
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.05);
    }

    h1 {
      margin-bottom: 30px;
      color: #444444; /* black-ish */
      text-align: center;
      font-size: 1.8rem;
    }

    form {
      display: flex;
      flex-direction: column;
      gap: 20px;
    }

    label {
      font-weight: bold;
      color: #444444; /* black-ish */
      margin-bottom: 5px;
    }

    input {
      padding: 10px;
      font-size: 1rem;
      border: 1px solid #ccc;
      border-radius: 5px;
      background-color: #f9f9f9;
      transition: border-color 0.3s, box-shadow 0.3s;
    }

    input:hover {
      border-color: #3fbbc0;
      box-shadow: 0 0 5px rgba(63, 187, 192, 0.5);
    }

    .btn {
      background-color: #3fbbc0;
      border: none;
      color: #ffffff;
      padding: 12px;
      font-size: 1rem;
      font-weight: bold;
      cursor: pointer;
      border-radius: 5px;
      transition: background-color 0.3s ease;
    }

    .btn:hover {
      background-color: #059652;
    }
  </style>
</head>
<body>

  <!-- Navbar -->
  <nav>
    <div>
      <div class="logo">MEDICIO</div>
      <ul>
       <li><a href="/home_page">HOME</a></li>
        <li><a href="#about">ABOUT</a></li>
      
        <li><a href="#">CONTACT</a></li>
      </ul>
      </ul>
    </div>
  </nav>

  <!-- Login Form -->
  <div class="container">
    <h1>Patient Login</h1>
    
    <form action="/check_info" method="POST">
      @csrf

      <div>
        <label for="username">Username</label>
        <input type="text" id="username" name="username" required />
      </div>

      <div>
        <label for="password">Password</label>
        <input type="password" id="password" name="password" required />
      </div>

      <button type="submit" class="btn">Login</button>
    </form>
  </div>

</body>
</html>
