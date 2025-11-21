<!DOCTYPE html>
<html lang="de">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Notiz-Manager DB - Startseite</title>
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
  <header>
    <div class="container">
      <h1>Notiz-Manager DB</h1>
    </div>
  </header>
  
  <main class="container">
    <section class="card">
      <h2>Willkommen beim Notiz-Manager</h2>
      <p>Verwalten Sie Ihre Notizen und Kategorien effizient.</p>
      
      <nav style="margin-top: 2rem;">
        <ul style="list-style: none; padding: 0;">
          <li style="margin: 1rem 0;">
            <a href="public/index.php" class="button" style="display: inline-block; padding: 1rem 2rem; text-decoration: none;">
              📝 Notizen verwalten
            </a>
          </li>
          <li style="margin: 1rem 0;">
            <a href="public/categ-manager.php" class="button" style="display: inline-block; padding: 1rem 2rem; text-decoration: none;">
              📁 Kategorien verwalten
            </a>
          </li>
          <li style="margin: 1rem 0;">
            <a href="public/login.php" class="button" style="display: inline-block; padding: 1rem 2rem; text-decoration: none;">
              🔐 Login
            </a>
          </li>
          <li style="margin: 1rem 0;">
            <a href="public/register.php" class="button" style="display: inline-block; padding: 1rem 2rem; text-decoration: none;">
              ✍️ Registrieren
            </a>
          </li>
        </ul>
      </nav>
    </section>
  </main>

  <footer style="text-align: center; padding: 2rem; margin-top: 2rem; color: #666;">
    <p>&copy; 2025 Notiz-Manager DB</p>
  </footer>
</body>
</html>
