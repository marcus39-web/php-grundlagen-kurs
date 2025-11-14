<?php $start = 20; ?>
<!DOCTYPE html>
<html lang="de">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>for-Schleifen</title>
  <link rel="stylesheet" href="../style/style.css">
</head>
<body>
  <header>
    <h1><code>for</code>-Schleifen</h1>
  </header>
  <main class="container">
    <p>
      <?php
        for($i = 13; $i <= 29; $i+=4) {
          echo "$i ";
        }
      ?>
    </p>
    <p>
      <?php
        for($i = 2; $i >= -1; $i-=0.5) {
          echo "$i ";
        }
      ?>
    </p>
    <p>
      <?php
        for($i = 2000; $i <= 6000; $i+=1000) {
          echo "$i ";
        }
      ?>
    </p>
    <p>
      <?php
        for($i = 5; $i <= 13; $i+=2) {
          echo "Z$i ";
        }
      ?>
    </p>
    <p>
      <?php
        for($i = 1; $i <= 3; $i++) {
          echo "a b$i ";
        }
      ?>
    </p>
    <p>
      <?php
        for($i = 2; $i <= 22; $i+=10) {
          echo "c$i c" . ($i + 1) . ' ';
        }
      ?>
    </p>
    <p>
      <?php
        for($i = 13; $i <= 45; $i+=4) {
          if( $i > 21 && $i < 33) continue;
          echo "$i ";
        }
      ?>
    </p>

  </main>
</body>
</html>