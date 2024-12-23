<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Playlist</title>
</head>
<body>

<h2>Playlist</h2>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$databaseName = "project";

$conn = new mysqli($servername, $username, $password, $databaseName);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM playlist";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table border='1'>";
    echo "<tr><th>Value</th></tr>";

    while($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["name"]. "</td></tr>";
    }

    echo "</table>";
} else {
    echo "No data in the playlist.";
}

$conn->close();
?>

</body>
</html>
