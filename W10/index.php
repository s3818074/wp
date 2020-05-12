<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
    $user = 'root';
    $password = 'root';
    $db = 'inventory';
    $host = 'localhost';
    $port = 3307;

    $conn = mysqli_connect("$host:$port", $user, $password  );

    if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
    }
    echo "<p> Connected successfully </p>";
    ?>
</body>
</html>
