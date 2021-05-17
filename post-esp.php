<?php
require_once 'connect.php';

$api_key_value = "tPmAT5Ab3j7F9";

$api_key= $getTemp = $getHumi = $getPres = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $api_key = test_input($_POST["api_key"]);
    if($api_key == $api_key_value) {
        $getTemp = test_input($_POST["temp"]);
        $getHumi = test_input($_POST["humi"]);
        $getPres = test_input($_POST["pres"]);

        // Create connection
        $conn = new mysqli($servername, $username, $password, $database);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "INSERT INTO sensors (temperature, humidity, pressure)
        VALUES ('" . $getTemp . "', '" . $getHumi . "', '" . $getPres . "')";

        if ($conn->query($sql) === TRUE) {
            echo "New record created successfully";
        }
        else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        $conn->close();
    }
    else {
        echo "Wrong API Key provided.";
    }

}
else {
    echo "No data posted with HTTP POST.";
}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}