<?php
declare(strict_types=1);
error_reporting(E_ALL);
ini_set('display_errors',true);
session_start();
include_once 'artikel.inc.php';
/**
 * Aufgabe:
 * 1) Erstelle ein Formular mit Feldern: name, msg.
 * 2) Prüfe serverseitig, ob beide Felder gefüllt sind.
 * 3) Gib die Daten unterhalb des Formulars aus.
 */

$name = "";
$msg = "";
$error = "";
$success = false;

// Formular wurde abgeschickt
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST["name"] ?? "");
    $msg = trim($_POST["msg"] ?? "");
    
    // Validierung
    if (empty($name) && empty($msg)) {
        $error = "Bitte füllen Sie beide Felder aus!";
    } elseif (empty($name)) {
        $error = "Bitte geben Sie Ihren Namen ein!";
    } elseif (empty($msg)) {
        $error = "Bitte geben Sie eine Nachricht ein!";
    } else {
        $success = true;
    }
}
?>
<!doctype html>
<html lang="de">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Übung 5 – Kontaktformular</title>
  <link rel="stylesheet" href="../style/style.css">
</head>
<body>
  <header><h1>Übung 5 – Kontaktformular</h1></header>
  <main class="container">
    
    <?php if (!empty($error)): ?>
      <div class="error-message">
         <?= htmlspecialchars($error); ?>
      </div>
    <?php endif; ?>
    
    <?php if ($success): ?>
      <div class="success-message">
         Nachricht erfolgreich gesendet!
      </div>
    <?php endif; ?>
    
    <!-- Kontaktformular -->
    <form method="post" action="" class="contact-form">
      <div class="form-group">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" value="<?= htmlspecialchars($name); ?>" placeholder="Ihr Name">
      </div>
      
      <div class="form-group">
        <label for="msg">Nachricht:</label>
        <textarea id="msg" name="msg" rows="5" placeholder="Ihre Nachricht"><?= htmlspecialchars($msg); ?></textarea>
      </div>
     <tr>
          <td colspan="4">
            <button style="margin-bottom:0.5rem; background-color:blue;color:white;border:none;border-radius:10px;cursor:pointer;" type="submit">Senden 🏈</button>
            <button  style="background-color:red;color:white;border:none;border-radius:10px;cursor:pointer;"type="reset">Abbrechen👎</button>
          </td>
        </tr>
    </form>
    
    <?php if ($success): ?>
      <hr>
      <!-- Ausgabe der Daten -->
      <div class="output-box">
        <h2>Ihre Eingaben:</h2>
        <p><strong>Name:</strong> <?= htmlspecialchars($name); ?></p>
        <p><strong>Nachricht:</strong></p>
        <div class="message-box">
          <?= nl2br(htmlspecialchars($msg)); ?>
        </div>

      </div>
    <?php endif; ?>
    
  </main>
  
  <style>
    .container {
      max-width: 600px;
      margin: 0 auto;
    }
    .error-message {
      background-color: #f8d7da;
      color: #721c24;
      padding: 12px;
      border-radius: 4px;
      margin-bottom: 20px;
      border: 1px solid #f5c6cb;
    }
    .success-message {
      background-color: #d4edda;
      color: #155724;
      padding: 12px;
      border-radius: 4px;
      margin-bottom: 20px;
      border: 1px solid #c3e6cb;
    }
    .contact-form {
      background-color: #f8f9fa;
      padding: 20px;
      border-radius: 8px;
      margin-bottom: 20px;
    }
    .form-group {
      margin-bottom: 15px;
    }
    .form-group label {
      display: block;
      margin-bottom: 5px;
      font-weight: bold;
    }
    .form-group input,
    .form-group textarea {
      width: 100%;
      padding: 10px;
      font-size: 14px;
      border: 2px solid #ddd;
      border-radius: 4px;
      font-family: inherit;
    }
    .form-group textarea {
      resize: vertical;
    }
    button {
      padding: 10px 25px;
      font-size: 16px;
      background-color: #007bff;
      color: white;
      border: none;
      border-radius: 4px;
      cursor: pointer;
    }
    .output-box {
      background-color: #e9ecef;
      padding: 20px;
      border-radius: 8px;
    }
    .output-box h2 {
      margin-top: 0;
      color: #333;
    }
    .message-box {
      background-color: white;
      padding: 15px;
      border-radius: 4px;
      border: 1px solid #ddd;
      margin-top: 10px;
    }
  </style>
</body>
</html>
