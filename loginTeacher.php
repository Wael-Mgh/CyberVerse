<?php

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

// Function to check if email exists in the 'registration' table
function emailExists($conn, $email)
{
    $email = mysqli_real_escape_string($conn, $email);
    $query = "SELECT * FROM registration WHERE email = '$email'";
    
    // Perform the query
    $result = $conn->query($query);

    if (!$result) {
        // Handle query error
        die("Error executing query: " . $conn->error);
    }

    return $result->num_rows > 0;
}

// Function to insert data into the 'student' table
function insertStudentData($conn, $username, $email, $password)
{
    $username = mysqli_real_escape_string($conn, $username);
    $email = mysqli_real_escape_string($conn, $email);
    $password = mysqli_real_escape_string($conn, $password);

    $query = "INSERT INTO teacher (username, email, password) VALUES ('$username', '$email', '$password')";
    $result = $conn->query($query);

    if (!$result) {
        // Handle query error
        die("Error executing query: " . $conn->error);
    }

    return $result;
}

// Check if email is provided in the request
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['email'])) {
    $email = $_POST['email'];

    // Check if email exists
    if (emailExists($conn, $email)) {
        // Suggest registering and save data into the 'student' table
        echo "Email already exists. Register now.";

        if (isset($_POST['username']) && isset($_POST['password'])) {
            $username = $_POST['username'];
            $password = $_POST['password'];
            insertStudentData($conn, $username, $email, $password);

            // Redirect to the teacher.html page or perform the login action
            header("Location: teacher.php");
            exit();
        }
    } else {
        // Suggest registering
        echo "Email does not exist. Register now.";
    }
} else {
    echo "Error: Email not provided in the request.";
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

            <input type="text" placeholder="Enter your Name" name="username" required><br><br>
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