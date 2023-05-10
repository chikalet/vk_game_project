<?php
function Database($host, $database, $user, $password) {
    try {
        // Создаем новый экземпляр PDO для подключения к базе данных
        $dsn = "mysql:host=$host;dbname=$database;charset=utf8mb4";
        $pdo = new PDO($dsn, $user, $password);

        // Устанавливаем режим обработки ошибок
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        return $pdo;
    } catch(PDOException $e) {
        // Обрабатываем ошибку подключения
        die("Failed to connect to database: " . $e->getMessage());
    }
}