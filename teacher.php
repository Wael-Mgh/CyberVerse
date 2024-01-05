<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="registration.css">
  <link rel="stylesheet" href="home.css">
  <title>Registration</title>

  <style>
   
    
   h2{
    color:black;
   }
   .button{
    margin-left:8%;
   }
   .button {
            background-color:black;
            color: white;
            padding: 10px 20px;
            font-size: 16px;
            border: none;
            cursor: pointer;
        }

        .button:hover {
            background-color: #45a049;
        }
        body {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
          
        }

        .container {
            display: flex;
            align-items: center;
            justify-content: space-between;
            width: 90%;
            background-color: rgba(240, 240, 240, 0.5);
        }

        .box {
            width: 30%;
            border: 2px solid #333;
            background-color: rgba(240, 240, 240, 0.5);
            margin: 10px;
            padding: 10px;
            text-align: center;
            font-family: Arial, sans-serif;
            font-size: 14px;
            color: #333;
            box-sizing: border-box;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        label {
            margin-bottom: 5px;
        }

        input {
            padding: 8px;
            margin-bottom: 10px;
            box-sizing: border-box;
            background-color: rgba(240, 240, 240, 0.5);
        }

        button {
            padding: 10px;
            background-color: #333;
            color: #fff;
            border: none;
            cursor: pointer;
        }
  </style>
  
</head>

<body>
 

  <div class="container">
  
  
  <div class="box">
  <h2>View Student Table</h2>
    
  <!-- Form with a View button -->
  <form action="viewStudent.php" method="post">
      <input type="submit" name="view" value="View Students" class="button">
  </form>
 
  <br><br><br>
      </div>
  
<div class="box">
  <h2>Delete Student Record</h2>
    
    <!-- Form with input fields for ID and username -->
    <form action="teacher.php" method="post">
        <h3>ID:   </h3> 
        <input type="text" name="id" required> <br>

        <h3>Username:</h3>
        <input type="text" name="username" required><br>

        <input type="submit" name="delete" value="Delete Record" class="button">
    </form>
      </div>

      <div class="box">
    <h2 >Edit Student Record</h2>
    
    <!-- Form with input fields for ID, username, and new values -->
    <form action="teacher.php" method="post" >
        <h3>ID:</h3>
        <input type="text" name="id" required><br>

        <h3>Username:</h3>
        <input type="text" name="username" required><br>

        <h3>New Email:</h3>
        <input type="email" name="new_email"><br>

        <h3>New Password:</h3>
        <input type="text" name="new_password"><br>

        <input type="submit" name="edit" value="Edit Record" class="button">
    </form>
      </div>


<div class="box">
      <h2>Insert Student Record</h2>
    
    <!-- Form with input fields for ID, username, email, and password -->
    <form action="teacher.php" method="post">
        <h3>ID:</h3>
        <input type="text" name="id" required><br>

        <h3>Username:</h3>
        <input type="text" name="username" required><br>

        <h3>Email:</h3>
        <input type="text" name="email" required><br>

        <h3>Password:</h3>
        <input type="password" name="password" required><br>

        <input type="submit" name="insert" value="Insert Record" class="button">
    </form>
      </div>

      </div>
</body>

</html>



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

// Function to delete a record from the 'student' table
function deleteStudentRecord($conn, $id, $username)
{
    $id = mysqli_real_escape_string($conn, $id);
    $username = mysqli_real_escape_string($conn, $username);

    $query = "DELETE FROM student WHERE id = '$id' AND username = '$username'";
    $result = $conn->query($query);

    if (!$result) {
        // Handle query error
        die("Error executing query: " . $conn->error);
    }

    echo "Record deleted successfully.";
}

// Check if the "Delete Record" button is pressed
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete'])) {
    $id = $_POST['id'];
    $username = $_POST['username'];

    deleteStudentRecord($conn, $id, $username);
}

// Function to edit a record in the 'student' table
function editStudentRecord($conn, $id, $username, $new_email, $new_password)
{
    $id = mysqli_real_escape_string($conn, $id);
    $username = mysqli_real_escape_string($conn, $username);
    $new_email = mysqli_real_escape_string($conn, $new_email);
    $new_password = mysqli_real_escape_string($conn, $new_password);

    $query = "UPDATE student SET email = '$new_email', password = '$new_password' WHERE id = '$id' AND username = '$username'";
    $result = $conn->query($query);

    if (!$result) {
        // Handle query error
        die("Error executing query: " . $conn->error);
    }

    echo "Record updated successfully.";
}

// Check if the "Edit Record" button is pressed
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['edit'])) {
    $id = $_POST['id'];
    $username = $_POST['username'];
    $new_email = $_POST['new_email'];
    $new_password = $_POST['new_password'];

    editStudentRecord($conn, $id, $username, $new_email, $new_password);
}



// Function to insert a record into the 'student' table
function insertStudentRecord($conn, $id, $username, $email, $password)
{
    $id = mysqli_real_escape_string($conn, $id);
    $username = mysqli_real_escape_string($conn, $username);
    $email = mysqli_real_escape_string($conn, $email);
    $password = mysqli_real_escape_string($conn, $password);

    $query = "INSERT INTO student (id, username, email, password) VALUES ('$id', '$username', '$email', '$password')";
    $result = $conn->query($query);

    if (!$result) {
        // Handle query error
        die("Error executing query: " . $conn->error);
    }

    echo "Record inserted successfully.";
}

// Check if the "Insert Record" button is pressed
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['insert'])) {
    $id = $_POST['id'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    insertStudentRecord($conn, $id, $username, $email, $password);
}


// Close the database connection
$conn->close();

?>


