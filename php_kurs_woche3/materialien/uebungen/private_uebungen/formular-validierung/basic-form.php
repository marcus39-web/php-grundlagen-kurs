<?php
declare(strict_types=1);
error_reporting(E_ALL);
ini_set('display_errors',true);

$errors = array();
$spamcheck = false;

// Prüfen ob das Formular gesemdet wurde
if(isset($_POST['submit'])) {

	// Spamcheck
	if(!empty($_POST['repeat_email']) || isset($_POST['terms'])) {
		$errors[] = 'Zusatzfelder wurden ausgefüllt, wir vermuten Spam und brechen hier ab.';
	} else {
		$spamcheck = true;
	}
}

// Eingaben validieren
if($spamcheck === true) {

	if(empty($_POST['name'])) {
		// Wenn Name leer
		$errors[] = 'Bitte geben Sie Ihren Namen an!';
	}

	if(!empty($_POST['phone']) && is_numeric($_POST['phone']) === false) {
		// Wenn das Feld nicht leer ist, auf Ziffern prüfen
		$errors[] = 'Die Telefonnummer bitte nur mit Ziffern angeben!';
	}

	if(empty($_POST['email'])) {
		// Wenn das Email-Feld leer ist
		$errors[] = 'Bitte eine E-Mail-Adresse angeben!';
	} elseif(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) === false) {
		// Wenn die E-Mail-Syntax nicht korrekt ist
		$errors[] = 'Bitte geben Sie eine gültige E-Mail-Adresse an.';
	}

	if(!empty($_POST['url']) && filter_var($_POST['url'], FILTER_VALIDATE_URL) === false) {
		// Wenn das Feld nicht leer ist, prüfen wir auf korrekte URL-Systax
		$errors[] = 'Bitte geben Sie eine gültige URL ein (inkl. https://)!';
	}

	if(!empty($_POST['plz']) && !preg_match("/^[0-9]{5}$/", $_POST['plz'])) {
		$errors[] = 'Bitte geben Sie eine gültige PLZ ein!';
	}

	if(empty($_POST['message'])) {
		// Wenn das Nachrichten-Feld leer ist
		$errors[] = 'Bitte geben Sie Ihre Nachricht ein!';
	}

	if(!isset($_POST['gender'])) {
		// Wenn der Spamcheck nicht markiert wurde
		$errors[] = 'Bitte bestätigen Sie den Spamcheck!';
	}

}

?>
<!DOCTYPE html>
<html lang="de">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Tutorial: PHP Formular Spamschutz und Validierung – Spam Emails verhindern auch ohne Captcha</title>
		
	<link rel="stylesheet" href="css/style.css">
	<script>
		window.addEventListener("DOMContentLoaded", _=>{
			const terms = document.querySelector(".terms");
			terms.innerHTML += '<input type="text" name="repeat_email">'; 
		});
	</script> 
	<style>
		/*Demo Formular Styles*/
		label { display:inline-block; width:100px; }
		input,textarea {border-radius: 0;}
		input { padding:5px; width:300px; }
		input[name="plz"] { width:60px; }
		input[name="city"] { width:235px; }
		input[type="submit"] { width:160px; background:#09F; }
		input[type="checkbox"] { width:20px; margin-right:10px; }
		textarea { width:410px; }
		span { color: #c00; }
		
		.terms{ display:none; }
	</style>   
</head>

<body>	
	<header>
		<h1>Formular-Validierung - Honeypot</h1>
	</header>
	<main class="container">
		<?php if(isset($_POST['submit'])): ?>
			<?php if(!empty($errors) || $spamcheck === false): ?>
				<div class="bad">
					<strong>Bitte prüfen Sie Ihre Angaben!</strong><br>
					<ul>
						<li>
							<?= implode('</li><li>', $errors); ?>
						</li>
					</ul>
				</div>
			<?php else: ?>
				<div class="good">
					<p>Alles richtig gemacht 👍.</p>
				</div>
			<?php endif; ?>
		<?php endif; ?>
		<form id="phpform" method="post" action="basic-form.php">
	
			<p>
				<label for="name">Name<span>*</span></label>
				<input type="text" name="name" id="name" value="<?= $_POST['name'] ?? ''?>">
			</p>

			<p>
				<label for="phone">Telefon</label>
				<input type="text" name="phone" id="phone" value="<?= $_POST['phone'] ?? ''?>">
			</p>

			<p>
				<label for="email">Email<span>*</span></label>
				<input type="text" name="email" id="email" value="<?= $_POST['email'] ?? ''?>">
			</p>

			<p>
				<label for="url">Website</label>
				<input type="text" name="url" id="url" value="<?= $_POST['url'] ?? ''?>">
			</p>

			<p>
				<label for="street">Straße</label>
				<input type="text" name="street" id="street" value="<?= $_POST['street'] ?? ''?>">
			</p>

			<p>
				<label for="plz">PLZ/Stadt</label>
				<input type="text" name="plz" id="plz" value="<?= $_POST['plz'] ?? ''?>">
				<input type="text" name="city" value="<?= $_POST['city'] ?? ''?>">
			</p>

			<p>
				<label for="subject">Betreff</label>
				<input type="text" name="subject" id="subject" value="<?= $_POST['subject'] ?? ''?>">
			</p>

			<p>
				<label for="message">Nachricht<span>*</span></label><br />
				<textarea name="message" id="message" rows="8"><?= $_POST['message'] ?? ''?></textarea>
			</p>

			<p><input type="checkbox" name="gender" <?= (isset($_POST['gender'])) ? "checked" : ''?>><span>*</span> Ich versende keinen Spam</p>

			<p><input type="submit" name="submit" value="Absenden"></p>
	
			<div class="terms">
				Folgende Felder bitte frei lassen!
				<input type="checkbox" name="terms">
			</div>
		</form>
		<span>*</span>Pflichtangaben
	</main>
  

</body>
</html>