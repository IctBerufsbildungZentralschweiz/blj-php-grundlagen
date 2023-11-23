<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title>Formular</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/css/bootstrap.min.css">
    <style>
        .wrapper {
            margin-top: 2em;
            width: 80%;
            max-width: 550px;
            margin: 2em auto 0;
        }

        .form-title {
            margin-bottom: .7em;
        }

        .form-label {
            margin-top: .7em;
            margin-bottom: .3em;
        }

        fieldset {
            margin-top: 2em;
        }

        .form-legend {
            margin-bottom: .75em;
        }

        .form-legend + .form-group > .form-label:first-child {
            margin-top: 0;
        }

        .option-group {
            margin-top: 2em;
        }

        .form-actions {
            padding-top: 1em;
            border-top: 1px solid #eee;
            margin-top: 1em;
            margin-bottom: 2em;
        }

        .error-box {
            color: red;
            background-color: rgb(250, 220, 220);
            border: 1px solid red;
            border-radius: 10px;
            padding-top: 10px;
            padding-bottom: 10px;
        }
    </style>
</head>
<body>
    <div class="wrapper">

        <h1 class="form-title">Anmeldung für Kundenevent</h1>

        <p>Füllen Sie das Formular aus um sich für unseren Kundenevent im kommenden Frühling anzumelden.</p>

        <form action="index.php" method="post">

            <fieldset>
                <legend class="form-legend">Kontaktdaten</legend>
                <div class="form-group">
                    <label class="form-label" for="name">Ihr Name</label>
                    <input class="form-control" type="text" id="name" name="name">
                </div>
                <div class="form-group">
                    <label class="form-label" for="email">Ihre Email-Adresse</label>
                    <input class="form-control" type="email" id="email" name="email">
                </div>
                <div class="form-group">
                    <label class="form-label" for="phone">Ihre Telefonnummer</label>
                    <input class="form-control" type="text" id="phone" name="phone">
                </div>
            </fieldset>

            <fieldset>
                <legend class="form-legend">Unterkunft</legend>
                <div class="form-group">
                    <label class="form-label" for="people">Wie viele Personen werden von Ihrer Firma teilnehmen?</label>
                    <input class="form-control" min="0" type="number" id="people" name="people">
                </div>
                <div class="form-group option-group">

                    <p class="form-label">In welchem Hotel möchten Sie übernachten?</p>

                    <div class="radio">
                        <label for="hotel1">
                            <input type="radio" name="hotel" id="hotel1" value="InterContinental Davos" checked>
                            InterContinental Davos
                        </label>
                    </div>

                    <div class="radio">
                        <label for="hotel2">
                            <input type="radio" name="hotel" id="hotel2" value="Steinberger Grandhotel Belvédère">
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
                        <option value="">Kein Abendprogramm</option>
                        <option value="Billardturnier">Billardturnier</option>
                        <option value="Bowlingturnier">Bowlingturnier</option>
                        <option value="Weindegustation">Weindegustation</option>
                        <option value="Asiatischer Kochkurs">Asiatischer Kochkurs</option>
                        <option value="Tankzurs für Webentwickler">Tankzurs für Webentwickler</option>
                        <option value="Ying &amp; Yang Yoga Einsteigerkurs">Ying &amp; Yang Yoga Einsteigerkurs</option>
                    </select>
                </div>
                
                <div class="form-group">
                    <label for="note" class="form-label">Haben Sie sonst noch einen Wunsch oder eine Bemerkung?</label>
                    <textarea name="note" id="note" rows="3" class="form-control"></textarea>
                </div>

            </fieldset>
      
            <div class="form-actions">
                <input class="btn btn-primary" type="submit" value="Anmelden">
                <a href="http://www.google.com" class="btn">Anmeldung abbrechen</a>
            </div>

        </form>
    </div>
</body>
</html>