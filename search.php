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

// Get the search value from the AJAX request
$searchValue = isset($_POST['search']) ? $_POST['search'] : '';

// Perform a query to search for names
$query = "SELECT username FROM student WHERE username LIKE '%$searchValue%'";
$result = $conn->query($query);

if ($result->num_rows > 0) {
    // Display the names
    echo "<ul>";
    while ($row = $result->fetch_assoc()) {
        echo "<li>" . $row['username'] . "</li>";
    }
    echo "</ul>";
} else {
    echo "No results found.";
}

// Close the database connection
$conn->close();
?>
