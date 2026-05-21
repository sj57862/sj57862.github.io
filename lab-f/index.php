<?php

use lib\Serializer;

spl_autoload_register(function ($class) {
    $path = __DIR__ . '/' . str_replace('\\', '/', $class) . '.php';

    if (file_exists($path)) {
        require_once $path;
    }
});

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $serializer = new Serializer();

    setcookie('texta_l', $_POST['texta_l'] ?? '', time() + 3600 * 24 * 30);
    setcookie('type_l', $_POST['type_l'] ?? '', time() + 3600 * 24 * 30);
    setcookie('type_r', $_POST['type_r'] ?? '', time() + 3600 * 24 * 30);

    if (($_POST['convert'] ?? '') === 'convert') {

        $data2decode = $_POST['texta_l'] ?? '';
        $type2decode = $_POST['type_l'] ?? '';
        $type2encode = $_POST['type_r'] ?? '';

        $decoded = $serializer->decode($data2decode, $type2decode);
        $encoded = $serializer->encode($decoded, $type2encode);

        setcookie('texta_r', $encoded, time() + 3600 * 24 * 30);
    }

    header("Location: " . $_SERVER['PHP_SELF']);
    exit;
}

$outputText = $_COOKIE['texta_r'] ?? '';

?>
<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <title>Converter UI</title>

    <style>
        .container {
            display: flex;
            gap: 20px;
        }

        .panel {
            flex: 1;
            display: flex;
            flex-direction: column;
        }

        select {
            margin-bottom: 10px;
            padding: 5px;
        }

        textarea {
            width: 100%;
            height: 250px;
        }

        button {
            margin-top: 20px;
            padding: 10px;
            width: 100%;
        }
    </style>

</head>

<body>

<form method="POST">

    <div class="container">

        <div class="panel">

            <select name="type_l">
                <option value="CSV" <?= (($_COOKIE['type_l'] ?? '') == 'CSV') ? 'selected' : '' ?>>CSV</option>
                <option value="SSV" <?= (($_COOKIE['type_l'] ?? '') == 'SSV') ? 'selected' : '' ?>>SSV</option>
                <option value="TSV" <?= (($_COOKIE['type_l'] ?? '') == 'TSV') ? 'selected' : '' ?>>TSV</option>
                <option value="JSON" <?= (($_COOKIE['type_l'] ?? '') == 'JSON') ? 'selected' : '' ?>>JSON</option>
                <option value="YAML" <?= (($_COOKIE['type_l'] ?? '') == 'YAML') ? 'selected' : '' ?>>YAML</option>
            </select>

            <textarea name="texta_l"><?= htmlspecialchars($_COOKIE['texta_l'] ?? '') ?></textarea>

        </div>

        <div class="panel">

            <select name="type_r">
                <option value="CSV" <?= (($_COOKIE['type_r'] ?? '') == 'CSV') ? 'selected' : '' ?>>CSV</option>
                <option value="SSV" <?= (($_COOKIE['type_r'] ?? '') == 'SSV') ? 'selected' : '' ?>>SSV</option>
                <option value="TSV" <?= (($_COOKIE['type_r'] ?? '') == 'TSV') ? 'selected' : '' ?>>TSV</option>
                <option value="JSON" <?= (($_COOKIE['type_r'] ?? '') == 'JSON') ? 'selected' : '' ?>>JSON</option>
                <option value="YAML" <?= (($_COOKIE['type_r'] ?? '') == 'YAML') ? 'selected' : '' ?>>YAML</option>
            </select>

            <textarea id="texta_r" name="texta_r"><?= htmlspecialchars($outputText) ?></textarea>

        </div>

    </div>

    <button name="convert" value="convert">Convert</button>

</form>

</body>
</html>