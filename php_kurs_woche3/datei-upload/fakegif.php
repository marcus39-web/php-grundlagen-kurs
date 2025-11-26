<?php
declare(strict_types=1);
error_reporting(E_ALL);
ini_set('display_errors', '1');
?>

<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fake-Gif</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <header>
        <h1>Fake-Gif</h1>
    </header>
    <main class="container">
        <pre>
<?php

//Dateiname: fakegif.gif
$filename = tempnam('.', 'fakeimage');

file_put_contents($filename, 'GIF89a' . random_bytes(100));

echo "\nMIME-TYpe: ", mime_content_type($filename), "\n\n";
echo print_r(getimagesize($filename));
echo "\n";

unlink($filename);
?>
        </pre>
    </main>
    
</body>
</html>