-- Notiz‑Manager DB – Schema & Seed
-- Charset & Collation je nach Server ggf. anpassen
CREATE DATABASE IF NOT EXISTS notizmanager
  DEFAULT CHARACTER SET utf8mb4
  DEFAULT COLLATE utf8mb4_general_ci;
USE notizmanager;

DROP TABLE IF EXISTS notes;
CREATE TABLE notes (
  id INT AUTO_INCREMENT PRIMARY KEY,
  title VARCHAR(255) NOT NULL,
  content TEXT NOT NULL,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB;

DROP TABLE IF EXISTS users;
CREATE TABLE users (
  id INT AUTO_INCREMENT PRIMARY KEY,
  username VARCHAR(100) NOT NULL UNIQUE,
  password_hash VARCHAR(255) NOT NULL,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB;

-- Optional: Kategorien
DROP TABLE IF EXISTS categories;
CREATE TABLE categories (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(100) NOT NULL UNIQUE
) ENGINE=InnoDB;

ALTER TABLE notes ADD COLUMN category_id INT NULL;
ALTER TABLE notes ADD CONSTRAINT fk_notes_category
  FOREIGN KEY (category_id) REFERENCES categories(id)
  ON DELETE SET NULL ON UPDATE CASCADE;

-- Seed
INSERT INTO categories(name) VALUES ('Allgemein'), ('Arbeit'), ('Privat');

INSERT INTO notes(title, content, category_id) VALUES
('Willkommen', 'Das ist dein erster Eintrag.', 1),
('Tipps', 'Nutze Prepared Statements & htmlspecialchars.', 1);

-- Demo-User: admin / admin123 (Bitte Passwort direkt nach Import ändern!)
-- Hash erzeugt mit PHP password_hash('admin123', PASSWORD_DEFAULT)
INSERT INTO users(username, password_hash) VALUES
('admin', '$2y$10$0mH5QxNHj1l0XnqU.g2UuOx5y6s31YbKkk2m1X5X5aF2w/2GfZx8i');
