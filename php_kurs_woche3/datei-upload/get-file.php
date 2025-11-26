<!DOCTYPE html>
<html lang="de">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Datei-Upload</title>
  <link rel="stylesheet" href="css/style.css">
</head>

<body>
  <header>
    <h1>Datei<code>get-file.php</code></h1>
  </header>
  <main class="container">
<?php 

$upload_dir = __DIR__ . '/images/';
echo '<pre>', print_r($_POST, true), '</pre>';
echo '<pre>', print_r($_FILES, true), '</pre>';

?>
   
  </main>
</body>

</html>