# Arbeiten mit dem GitHub-Repository für den PHP-Kurs

Diese Anleitung beschreibt, wie Du das Kursmaterial von GitHub auf Deinen eigenen Server (VM) holst und Dein eigenes Repository daraus machst.

---

## 🧭 Ziel

Am Ende hast Du:

- eine **eigene Kopie** des Kurs-Repos in Deinem GitHub-Account
- das Material **lokal auf Deinem Server**
- die Möglichkeit, **eigene Änderungen zu pushen**

---

## ⚙️ Voraussetzungen

- Du hast einen **GitHub-Account** (https://github.com)
- Du bist auf Deiner **Ubuntu-Server-VM** eingeloggt
- `git` ist installiert (prüfen mit `git --version`)

---

## 🪄 Schritt 1: Kurs-Repository auf GitHub öffnen

Rufe das zentrale Kurs-Repository im Browser auf:

👉 `https://github.com/jaderbass/php-grundlagen-kurs`

Klicke oben rechts auf **„Fork“**.

GitHub erstellt nun **eine eigene Kopie** des Repos in Deinem Account, z. B.:  
`https://github.com/deinname/php-grundlagen-kurs`

---

## 💾 Schritt 2: Repository in der VM klonen

Wechsle in Dein Projektverzeichnis, z. B.:

```bash
cd ~/projects
```

Klon das Repository **aus Deinem eigenen Account**:

```bash
git clone https://github.com/<deinname>/php-grundlagen-kurs.git
```

Beispiel:

```bash
git clone https://github.com/maxmuster/php-grundlagen-kurs.git
```

Danach:

```bash
cd php-grundlagen-kurs
```

---

## 🧱 Schritt 3: Dateien prüfen

Zeige die Struktur an:

```bash
ls -l
```

Du solltest Ordner wie `Woche1`, `Woche2`, usw. sehen.

---

## ✏️ Schritt 4: Eigene Änderungen testen

Erstelle eine Testdatei:

```bash
echo "Testdatei von Max" > test.txt
```

Füge sie dem Commit hinzu:

```bash
git add test.txt
git commit -m "Test: erste eigene Datei"
```

Und push die Änderung zu Deinem eigenen Repo:

```bash
git push origin main
```

---

## 🧠 Tipp: Kursupdates erhalten

Wenn der Trainer das Hauptrepo aktualisiert, kannst Du es einfach nachziehen.

Einmalig:

```bash
git remote add upstream https://github.com/jaderbass/php-grundlagen-kurs.git
```

Dann später regelmäßig:

```bash
git pull upstream main
```

So bleibst Du auf dem neuesten Stand, ohne Deine eigenen Änderungen zu verlieren.

---

## ✅ Zusammenfassung

| Aktion | Befehl |
|--------|---------|
| Repo forken | im Browser über GitHub |
| Repo klonen | `git clone https://github.com/<deinname>/php-grundlagen-kurs.git` |
| Änderungen pushen | `git push origin main` |
| Updates vom Trainer holen | `git pull upstream main` |

---

Damit bist Du bereit, mit dem Kursmaterial zu arbeiten und eigene Lösungen zu entwickeln.
