<?php

$success = false;
$errors = [];

$name    = $_POST['name']    ?? '';
$email   = $_POST['email']   ?? '';
$phone   = $_POST['phone']   ?? '';
$people  = $_POST['people']  ?? '';
$hotel   = $_POST['hotel']   ?? '';
$program = $_POST['program'] ?? '';
$note    = $_POST['note']    ?? '';

if($_SERVER['REQUEST_METHOD'] === 'POST') {

    $name    = trim($name);
    $email   = trim($email);
    $phone   = trim($phone);
    $people  = trim($people);
    $hotel   = trim($hotel);
    $program = trim($program);
    $note    = trim($note);
    
    if($name === '') {
        $errors[] = 'Bitte geben Sie einen Namen ein.';
    }

    if($email === '') {
        $errors[] = 'Bitte geben Sie eine Email ein.';
    } elseif(strpos($email, '@') === false) {
        $errors[] = 'Die Email-Adresse "' . $email . '" ist ungültig.';
    }

    if($phone === '') {
        $errors[] = 'Bitte geben Sie eine Telefonnummer ein.';
    } elseif( ! preg_match('/^[\+ 0-9]+$/', $phone)) {
        $errors[] = 'Die Telefonnummer "' . $phone . '" ist ungültig.';
    }

    if($people === '') {
        $errors[] = 'Bitte geben Sie die Anzahl teilnehmender Personen ein.';
    } elseif( ! is_numeric($people)) {
        $errors[] = 'Bitte geben Sie für die Anzahl Personen nur Zahlen ein.';
    }

    if($hotel === '') {
        $errors[] = 'Bitte wählen Sie ein Hotel für die Übernachtung aus.';
    }

    // Keine Fehler vorhanden
    if(count($errors) === 0) {
        $success = true;
    }

}
?><!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title>Formular</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <div class="wrapper">


        <?php if($success): ?>
			
            <h1 class="form-title">Anmeldung erfolgreich!</h1>
            
            <p>Vielen Dank für Ihre Anmeldung. Wir haben diese erfolgreich entgegengenommen.</p>
			
			<?php
				$file = 'Daten/anmeldungen.csv'; 
				$recordCsv = PHP_EOL; 
				
				// csv record zusammenstellen, dabei: 
				// - allfällige "\n" in der Note ersetzen mit "<br>"
				// - allfällige ";" in der Note ersetzen mit "," 
				$recordCsv .= $name . ';' . $email . ';' . $phone . ';' . $people . ';' . $hotel . ';' . $program . ';'; 
				$recordCsv .= str_replace(PHP_EOL, '<br>', str_replace(';', ',', $note)); 
				
				// falls Datei noch nicht exisitert...
				if (false === file_exists($file)) {
					// ...Header-Record erstellen
					$header = 'Name;Email;Phone;People;Hotel;Program;Note';
					$recordCsv = $header . $recordCsv;
				}
				
				// Datei zum Schreiben öffnen 
				$fileHnd = fopen($file,'a');
				
				// Record auf neue Zeile schreiben
				if (false === fwrite($fileHnd, $recordCsv)) {
					echo 'Daten konnten nicht gespeichert werden. Versuchen Sie es bitte noch einmal und kontaktieren Sie den Webmaster, falls der Fehler fortbesteht.';
				}
				
				// Datei-Handle schliessen
				fclose($fileHnd);
			?>

        <?php else: ?>
    
            <h1 class="form-title">Anmeldung für Kundenevent</h1>

            <p>Füllen Sie das folgende Formular aus um sich für unseren Kundenevent im kommenden Frühlung anzumelden.</p>

            <?php if(count($errors) > 0): ?>
                <div class="error-box">
                    <ul class="errors">
                        <?php foreach($errors as $error): ?>
                            <li><?= $error ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            <?php endif; ?>

            <form action="loesung.php" method="post">

                <fieldset>
                    <legend class="form-legend">Kontaktdaten</legend>
                    <div class="form-group">
                        <label class="form-label" for="name">Ihr Name</label>
                        <input class="form-control" type="text" id="name" name="name" value="<?= $name ?>">
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="email">Ihre Email-Adresse</label>
                        <input class="form-control" type="email" id="email" name="email" value="<?= $email ?>">
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="phone">Ihre Telefonnummer</label>
                        <input class="form-control" type="text" id="phone" name="phone" value="<?= $phone ?>">
                    </div>
                </fieldset>

                <fieldset>
                    <legend class="form-legend">Unterkunft</legend>
                    <div class="form-group">
                        <label class="form-label" for="people">Wie viele Personen werden von Ihrer Firma teilnehmen?</label>
                        <input class="form-control" min="0" type="number" id="people" name="people" value="<?= $people ?>">
                    </div>
                    <div class="form-group option-group">

                        <p class="form-label">In welchem Hotel möchten Sie übernachten?</p>

                        <div class="radio">
                            <label for="hotel1">
                                <input type="radio"
                                    name="hotel"
                                    id="hotel1"
                                    value="InterContinental Davos"
                                    <?= $hotel === 'InterContinental Davos' || $hotel === '' ? 'checked' : '' ?>
                                >
                                InterContinental Davos
                            </label>
                        </div>

                        <div class="radio">
                            <label for="hotel2">
                                <input type="radio"
                                    name="hotel"
                                    id="hotel2"
                                    value="Steinberger Grandhotel Belvédère"
                                    <?= $hotel === 'Steinberger Grandhotel Belvédère' ? 'checked' : '' ?>
                                >
                                Steinberger Grandhotel Belvédère
                            </label>
                        </div>
                    </div>
                </fieldset>

                <fieldset>
                    <legend class="form-legend">Ihr individuelles Programm</legend>

                    <div class="form-group">
                        <label class="form-label" for="program">Was möchten Sie am Abend unternehmen?</label>
                        <select class="form-control" id="program" name="program">
                            <?php
                            $options = [
                                'Kein Abendprogramm',
                                'Billardturnier',
                                'Bowlingturnier',
                                'Weindegustation',
                                'Asiatischer Kochkurs',
                                'Tankzurs für Webentwickler',
                                'Ying &amp; Yang Yoga Einsteigerkurs',
                            ];

                            foreach($options as $option): ?>
                            <option value="<?= $option ?>" <?= $program === $option ? 'selected' : '' ?>>
                                <?= $option ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                
                <div class="form-group">
                    <label for="note" class="form-label">Haben Sie sonst noch einen Wunsch oder eine Bemerkung?</label>
                    <textarea name="note" id="note" rows="3" class="form-control"><?= $note ?></textarea>
                </div>
                
            </fieldset>

            <div class="form-actions">
                <input class="btn btn-primary" type="submit" value="Anmelden">
                <a href="http://www.google.com" class="btn">Anmeldung abbrechen</a>
            </div>
        
        <?php endif; ?>

        </form>
    </div>
</body>
</html>