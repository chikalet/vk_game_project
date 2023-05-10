<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <meta charset = "UTF-8">
    <title>

    </title>
</head>
<body>
<div class="row">
<form class="col s12" action="connecting_room.php" method="POST">
    <div class="row">
        <div class="input-field col s6">
            <input type="text" placeholder="введите имя" name="username" class="validate col s3">
        </div>
    </div>
        <div class="row">
            <div class="input-field col s6">
        <input type="number" placeholder="введите номер комнаты" name="room_number" class="validate col s3">
            </div>
        </div>
                <input type="submit" class="waves-effect waves-light btn">
    </form>
</body>
</html>
<?php
