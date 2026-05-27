<?php
$path = __DIR__ . '/../data.db';
$pdo = new PDO('sqlite:' . $path);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$pdo->exec("CREATE TABLE IF NOT EXISTS pizza (id INTEGER PRIMARY KEY AUTOINCREMENT, name TEXT NOT NULL, price REAL NOT NULL)");
$cnt = $pdo->query('SELECT COUNT(*) FROM pizza')->fetchColumn();
if ($cnt == 0) {
    $pdo->exec("INSERT INTO pizza (name, price) VALUES ('Margherita', 19.5), ('Pepperoni', 22.0)");
}
echo 'OK: pizza table ensured, rows=' . $pdo->query('SELECT COUNT(*) FROM pizza')->fetchColumn() . PHP_EOL;

