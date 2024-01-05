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

    // Query to select all records from the 'student' table
    $query = "SELECT id, username, email, password FROM student";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        // Display records in a table
        echo "<table border='1'>
                <tr>
                    <th>ID</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Password</th>
                </tr>";

        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>{$row['id']}</td>
                    <td>{$row['username']}</td>
                    <td>{$row['email']}</td>
                    <td>{$row['password']}</td>
                </tr>";
        }

        echo "</table>";
    } else {
        echo "No records found";
    }

    // Close the database connection
    $conn->close();
    ?>
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AJAX Student Search</title>
<style>

body{
    background-image: url("pic/1.jpeg");
    background-repeat: no-repeat;
  background-size: 1500px 7een00px;
}



</style>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
        $(document).ready(function(){
            $("#searchForm").submit(function(event){
                // Prevent the form from submitting the traditional way
                event.preventDefault();

                // Get the input value
                var searchValue = $("#searchInput").val();

                // Perform an AJAX request
                $.ajax({
                    type: "POST",
                    url: "search.php", // Change this to the actual path of your server-side script
                    data: {search: searchValue},
                    success: function(response){
                        // Display the result in the resultDiv
                        $("#resultDiv").html(response);
                    }
                });
            });
        });
    </script>
</head>
<body>

    <h2>Student Search</h2>

    <form id="searchForm">
        <label for="searchInput">Search by Name:</label>
        <input type="text" id="searchInput" name="searchInput" required>
        <button type="submit">Search</button>
    </form>

    <div id="resultDiv"></div>

</body>
</html>
