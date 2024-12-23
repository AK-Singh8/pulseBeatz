<?php
$servername = "localhost";
$username = "root";
$password = "";
$databaseName = "project";
$conn = new mysqli($servername, $username, $password, $databaseName);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$name = $_POST['name'];
$email = $_POST['email'];
$pass = $_POST['password'];
$usert = $_POST['user'];

$sql = "SELECT * FROM UserAndPassword WHERE user = '$name' AND type = '$usert'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<script>alert('User already exists. Please choose a different name.'); window.location.href = '2NewUser.html';</script>";
} else {
    if ($usert == 'Artist') {
        $sql1 = "INSERT INTO UserAndPassword (user, email, type, password) VALUES ('$name','$email','$usert','$pass')";
        $sql2 = "INSERT INTO artist (user, email, password) VALUES ('$name','$email','$pass')";
        $result = $conn->query($sql1);
        $result = $conn->query($sql2);
        echo "<script>alert('Artist Registration Success! Please Login'); window.location.href = '1First.html';</script>";
    } elseif ($usert == 'Listener') {
        $sql1 = "INSERT INTO UserAndPassword (user, email, type, password) VALUES ('$name','$email','$usert','$pass')";
        $sql2 = "INSERT INTO listener (user, email, password) VALUES ('$name','$email','$pass')";
        $result = $conn->query($sql1);
        $result = $conn->query($sql2);
        echo "<script>alert('Listener Registration Success! Please Login'); window.location.href = '1First.html';</script>";
    } else {
        echo "<script>alert('Invalid user type'); window.location.href = '2NewUser.html';</script>";
    }
}
$conn->close();
?>
