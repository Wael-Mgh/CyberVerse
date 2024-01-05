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

// Function to check if email exists in the database
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

// Function to add user to the database
function addUserToDatabase($conn, $username, $email, $password)
{
    $username = mysqli_real_escape_string($conn, $username);
    $email = mysqli_real_escape_string($conn, $email);
    $password = password_hash($password, PASSWORD_DEFAULT); // Hash the password for security

    $query = "INSERT INTO registration (username, email, password) VALUES ('$username', '$email', '$password')";
    
    // Perform the query
    $result = $conn->query($query);

    if (!$result) {
        // Handle query error
        die("Error executing query: " . $conn->error);
    }

    return $result;
}

// Check if email is provided in the request
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['email'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Check if email already exists
    if (emailExists($conn, $email)) {
        echo "Error: Email already exists in the database.";
    } else {
        // Add user to the database
        if (addUserToDatabase($conn, $username, $email, $password)) {
            echo "User added to the database.";
        } else {
            echo "Error: Failed to add user to the database.";
        }
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
  <title>Registration</title>

  <style>
    .sspan{
      
      font-size:70%;
      font-family:sans-serif;
    }
    p{
      font-size:90%;
      font-family:sans-serif;
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
    <form id="registrationForm" action="home.php" method="POST" name="register" onsubmit="return validateForm()">
      <div class="container">
        <h3>REGISTER NOW</h3><br>
        <?php if (isset($_GET['error'])) { ?>
    		<div class="alert alert-danger" role="alert">
			  <?=$_GET['error']?>
			</div>
			<?php } ?>
            <div class="form_group">
        
        <input type="text" placeholder="Enter username" name="username" required><br><br>
        
        <input type="email" placeholder="Enter your email" name="email" required><br><br>
       
        <input type="password" placeholder="Enter your password" name="password" id="myInput" required><br>

        <input type="checkbox" onclick="myFunction1()"><span class="sspan">Show Password</span>
        <br><br>
       
        <input type="password" placeholder="Confirm your password" name="confpassword" id="myinput" required><br>

        <input type="checkbox" onclick="myFunction2()"><span class="sspan">Show Password</span>
        <br><br>
        <button type="submit" class="creatbtn" name="Submit" value="register">Register Now</button>
        <p>already have an account? <a href="login.php">Login now!</a></p>
      </div>
    </form>
    </div>
  </section>
  <script>

function myFunction1() {
  var x = document.getElementById("myInput");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
function myFunction2() {
  var x = document.getElementById("myinput");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
    function validateForm() {
      var username = document.forms["register"]["username"].value;
      var email = document.forms["register"]["email"].value;
      var password = document.forms["register"]["password"].value;
      var confpassword = document.forms["register"]["confpassword"].value;

      if (username == "" || email == "" || password == "" || confpassword == "") {
        alert("All fields must be filled out");
        return false;
      }
      if (password != confpassword) {
        alert("Passwords do not match");
        return false;
      }
      return true;
    }
  </script>
</body>

</html>