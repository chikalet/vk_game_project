<!DOCTYPE html>
<html>
<head>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <meta charset = "UTF-8">
    <title>

    </title>
</head>
<body>
<div class="btn-group position-absolute top-50 start-50 translate-middle">
    <a href="create_room.php" class="btn btn-primary active " aria-current="page">сгенерируйте номер комнаты</a>

<?php
session_start();
if ($_SESSION['message']) {
    echo '<p id="err">'.$_SESSION['message'].'</p>';
}
unset($_SESSION['message']);
?>
</div>
</body>
</html>
