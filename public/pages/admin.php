<?php 

if (!isset($_GET['successAdmin']) || $_GET['successAdmin'] != '1') {
    header("Location: login.php");
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page Admin</title>
</head>
<body>
    <h1>PAGE ADMIN</h1>
</body>
</html>