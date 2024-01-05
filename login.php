<?php
session_start();



// Database connection parameters
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "project";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Function to check if email and password combination is valid
function isValidUser($conn, $email, $password)
{
    $email = mysqli_real_escape_string($conn, $email);
    $password = mysqli_real_escape_string($conn, $password);

    $query = "SELECT * FROM registration WHERE email = '$email'";
    $result = $conn->query($query);

    if ($result && $result->num_rows > 0) {
        $user = $result->fetch_assoc();
        if (password_verify($password, $user['password'])) {
            return true; // Email and password combination is valid
        }
    }

    return false; // Email and password combination is not valid
}

// Check if email and password are provided in the request
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['email']) && isset($_POST['password'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Check if email and password combination is valid
    if (isValidUser($conn, $email, $password)) {
        // Redirect to the home page or perform any desired action
        header("Location: homepage.html");
        exit();
    } else {
        echo "Error: Invalid email or password. Please register.";
    }
} else {
    echo "Error: Email and password not provided in the request.";
}

// Close the database connection
$conn->close();

?>





<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="registration.css">
  <link rel="stylesheet" href="home.css">
  <title>Login</title>

  <style>
p{
  font-size:100%;
}

  </style>
</head>

<body>
  <header>
    <!--<div class="logo">
      <img src="pic/logocodaweb.png" alt="your logo">
    </div>-->
  </header>

  <section class="main">
    <form action="" method="POST" name="login" id="loginForm">
      <div class="container">
        <h3>LOGIN</h3><br>
        <?php if (isset($_GET['error'])) { ?>
    		<div class="alert alert-danger" role="alert">
			  <?=$_GET['error']?>
			</div>
			<?php } ?>
        
        <input type="email" placeholder="Enter your email" name="email" required><br><br>
        
        <input type="password" placeholder="Enter your password" name="password" required><br>
        <br>
        <!-- <p class="forgot"><a href="">Forgot Password?</a></p>-->
        <button type="submit" class="creatbtn" >Login Now</button>
        <p>don't have an account? <a href="home.php">Register now!</a></p>
      </div>
    </form>
  </section>
</body>
</html>