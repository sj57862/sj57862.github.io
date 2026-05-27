<?php
$path = __DIR__ . '/../data.db';
$pdo = new PDO('sqlite:' . $path);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$cols = $pdo->query("PRAGMA table_info('pizza')")->fetchAll(PDO::FETCH_ASSOC);
$has = false;
foreach ($cols as $c) {
    if ($c['name'] === 'description') {
        $has = true;
        break;
    }
}
if ($has) {
    echo "Column 'description' already exists\n";
    exit(0);
}
$pdo->exec("ALTER TABLE pizza ADD COLUMN description TEXT");
$pdo->exec("UPDATE pizza SET description = '' WHERE description IS NULL");
echo "Added column 'description' and initialized values\n";

