<?php
$path = __DIR__ . '/../data.db';
$pdo = new PDO('sqlite:' . $path);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$stmt = $pdo->query('SELECT id, name, price FROM pizza');
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
if (!$rows) {
    echo "No rows\n";
} else {
    foreach ($rows as $r) {
        echo "{$r['id']} | {$r['name']} | {$r['price']}\n";
    }
}

