<?php
declare(strict_types=1);
/**
 * Aufgabe:
 * 0) Einer von Euch legt ein öffentliches Git-Repo an von wo aus Ihr alle pushen und pullen könnt (optional aber hilfreich)
 * 1) Erstelle die Struktur: data/, inc/, class/, public/
 * 2) Lade Notizen aus data/notes.json und zeige sie in public/index.php.
 * 3) Implementiere add.php und delete.php (POST) Hinweis: verstecktes Formularfeld.
 * 4) index.php (Grundgerüst wie hier in dieser Datei):
 *    - Ausgabe der Notizen (wenn leeres Array: Info ausgeben)
 *    - Formular zum Hinzufügen neuer Notizen
 *    - Formular zum Löschen der entsprechenden Notiz (<input type="hidden">)
 * 5) inc/tools.php
 *    - Funktionen zum Laden, Speichern und Laden der Notizen
 * 6) add.php
 *    - Funktionalität zum Hinzufügen neuer Notizen
 * 7) delete.php
 *    - Funtionalität zum Löschen einer Notiz
 * 8) class/Note.php
 *    - Klasse für Notizen
 */
?>
<!doctype html>
<html lang="de">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Übung 5 – Notiz-Manager Light</title>
  <link rel="stylesheet" href="../style/style.css">
</head>
<body>
  <header><h1>Übung 5  – Notiz-Manager Light</h1></header>
  <main class="container" style="max-width:600px;margin:2rem auto;padding:2rem;background:#f9f9f9;border-radius:8px;box-shadow:0 2px 8px #0001;">
    <section style="margin-bottom:2rem;">
      <h2 style="margin-bottom:1rem;">Notizen</h2>
      <ul style="list-style:disc inside;padding-left:1rem;">
        <li style="margin-bottom:1rem;">Beispielnotiz: <span style="color:#555;">Das ist eine Beispielnotiz.</span></li>
        <li style="margin-bottom:1rem;">Noch eine Notiz: <span style="color:#555;">Mehr Inhalt hier.</span></li>
      </ul>
    </section>
    <section>
      <h2 style="margin-bottom:1rem;">Neue Notiz</h2>
      <form style="display:flex;flex-direction:column;gap:0.5rem;max-width:400px;">
        <input name="title" placeholder="Titel" required style="padding:0.5rem;border:1px solid #ccc;border-radius:4px;">
        <textarea name="content" placeholder="Inhalt" required style="padding:0.5rem;border:1px solid #ccc;border-radius:4px;"></textarea>
        <button type="submit" style="padding:0.5rem 1rem;background:#2563eb;color:#fff;border:none;border-radius:4px;cursor:pointer;">Hinzufügen</button>
      </form>
    </section>
  </main>
</body>
</html>
