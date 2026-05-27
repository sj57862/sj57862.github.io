<?php
require __DIR__ . '/../autoload.php';

// Usage: php add_pizza.php "Name" 12.5 "Description"
$name = $argv[1] ?? 'Test Pizza';
$price = isset($argv[2]) ? (float)$argv[2] : 10.0;
$description = $argv[3] ?? 'Sample description';

$p = new \App\Model\Pizza();
$p->setName($name)->setPrice($price)->setDescription($description);
$p->save();

echo "Inserted pizza: {$p->getId()} | {$p->getName()} | {$p->getPrice()} | {$p->getDescription()}\n";

