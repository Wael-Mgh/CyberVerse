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
//Array with names

$a[] = "Amanda";
$a[] = "Fadi";
$a[] = "Bassel";
$a[] = "Ahmad";
$a[] = "Walid";
$a[] = "Amal";
$a[] = "Faten";
$a[] = "mazen";
$a[] = "zeinab";



//get the q parameter from URL

$q = $_REQUEST["q"];
$hint = "";

if($q !== "")
{
    $q = strtolower($q);
    $len = strlen($q);

    foreach($a as $name)
    {
        if(stristr($q, substr($name, 0, $len)))
        {
            if($hint ==="")
            {
                $hint = $name;
            }
            else
            {
                $hint .= ", $name";
            }
        }
    }

}

echo $hint === ""? "No output" : $hint;


?>
