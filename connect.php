<?php
$servername = "10.10.0.222:3306";
$username = "konisz";
$password = "czolgis1225";
$database = "espweb";
?>

<?php
require_once 'connect.php';
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";

$q = "SELECT * FROM sensors";
$result = $conn->query($q);

$conn->close();
?>
