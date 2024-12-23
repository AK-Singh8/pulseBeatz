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
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM listener WHERE user = '$username' AND password = '$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<script>window.location.href = 'mainPlayerD.html';</script>";
    } else {
        echo "<script>alert('Invalid username or password.'); window.location.href = '2Listen.html';</script>";
    }
}
$conn->close();
?>