<?php
$servername = "localhost";
$username = "root";
$password = "";
$databaseName = "project";
$conn = new mysqli($servername, $username, $password, $databaseName);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $inputData = $_POST['inputData'];
    $createTableQuery = "CREATE TABLE IF NOT EXISTS playlist (name varchar(50))";
    $conn->query($createTableQuery);
    $insertDataQuery = "INSERT INTO playlist (name) VALUES ('$inputData')";
    if ($conn->query($insertDataQuery)) {
        echo "<script>alert('Song added successfully!'); window.location.href = 'playlist.html';</script>";
    } else {
        echo "Error: " . $conn->error;
    }
}
$conn->close();
?>
