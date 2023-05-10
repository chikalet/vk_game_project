<?php
require_once 'connection_database.php';
session_start();

$room_number = rand(0, 1024);
$host = 'localhost:3306';
$database = 'users_data';
$user = 'root';
$password = 'root';

$pdo = Database($host, $database, $user, $password);

$result = $pdo->query("INSERT INTO game_session (game_id) values ($room_number)");

$_SESSION['message'] = $room_number;
header('location: create.php');