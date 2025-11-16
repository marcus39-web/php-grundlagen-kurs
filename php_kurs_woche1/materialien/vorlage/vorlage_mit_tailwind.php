<?php
declare(strict_types=1);
session_start();
error_reporting(E_ALL);
ini_set('display_errors',true);
// include_once 'artikel.inc.php'; // Optional, nur falls benötigt
?>
<!DOCTYPE html>
<html lang="de">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Deiteiname</title>
  <link rel="stylesheet" href="../tailwind.css">
</head>
<body class="bg-gray-100 min-h-screen flex flex-col">
  <header class="bg-blue-600 text-white shadow-lg">
    <div class="container mx-auto px-4 py-6">
      <h1 class="text-3xl font-bold">Meine Website</h1>
    </div>
  </header>
  <main class="flex-grow container mx-auto px-4 py-8">
    <?php $name = "Marcus"; ?>
    <div class="max-w-md mx-auto bg-white rounded-xl shadow-md overflow-hidden md:max-w-2xl mt-8">
      <div class="p-8">
        <h2 class="text-2xl font-bold text-blue-600 mb-2">Hallo <?= htmlspecialchars($name) ?>!</h2>
        <p class="text-gray-700 mb-4">Dies ist ein kurzer PHP-Ausgabe-Test mit Tailwind.</p>
        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
          Klick mich
        </button>
      </div>
    </div>
  </main>
  <footer class="bg-gray-800 text-white mt-auto">
    <div class="container mx-auto px-4 py-6 text-center">
      <p>&copy; <?= date('Y') ?> Meine Website. Alle Rechte vorbehalten.</p>
    </div>
  </footer>
</body>
</html>