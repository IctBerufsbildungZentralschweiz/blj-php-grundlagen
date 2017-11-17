# Blog
Dein Auftrag ist es, ein Blog zu erstellen. Der Betreiber des Blogs soll in einem durch einen Benutzernamen und durch ein Passwort geschützen Bereich seine Beiträge erfassen können. Die erfassten Beiträge sollen dann im öffentlichen Bereich der Webseite für alle zu lesen sein. Es wäre toll, wenn die Leser einen Beitrag kommentieren und bewerten könnten.

## Anforderungen 
Die Anforderungen an den Blog, d.h. welche Funktionen der Blog für den Benutzer anbieten soll, sind nachfolgend aufgeführt. Diese Anforderungen sind priorisiert: 
- 1 = must 
- 2 = should 
- 3 = nice to have 

Achte darauf, dass du zuerst die Anforderungen mit der höchsten Priorität erfüllst und erst am Schluss, wenn du noch Zeit hast, die tiefer priorisierten und damit nicht ganz so wichtigen Funktionen ausprogrammierst. 

| Nr   | Beschreibung                                                                                                   | Prio |
|------|----------------------------------------------------------------------------------------------------------------|------|
| A001 | Jeder Benutzer kann die Blog-Beiträge lesen.                                                                   |   1  |
| A002 | Blog-Beiträge kann nur der Blogger schreiben.                                                                  |   1  |
| A003 | Als Blogger will ich mich einloggen, um Blog-Beiträge zu schreiben, damit niemand in meinem Namen bloggen kann.|   1  |
| A004 | Als Blogger will ich, das mein Passwort verschlüsselt in der Datenbank abgelegt wird.                          |   1  |
| A005 | Als Blogger will ich mein Passwort ändern können.                                                              |   1  |
| A006 | Zu jedem Blog-Beitrag sollen Vor-, Nachname des Bloggers sowie Erstelldatum/-zeit angezeigt werden.            |   1  | 
| A007 | Als Benutzer will ich einen Blog-Beitrag kommentieren können.                                                  |   3  |
| A008 | Als Benutzer will ich einen Blog-Beitrag bewerten können (gefällt mir/gefällt mir nicht).                      |   2  |
| A009 | Als Benutzer will ich mich registrieren können, um selber als Blogger Beiträge schreiben zu können.            |   3  |
| A010 | Als Blogger will ich per E-Mail informiert werden, wenn eine meiner Beiträge bewertet/kommentiert wurde.       |   3  |
| A011 | Als Blogger will ich Bilder aus dem Internet verlinken können, um meine Beiträge interessanter zu machen.      |   2  |
| A012 | Als Blogger will ich Bilder aus dem Internet verlinken können, um meine Beiträge interessanter zu machen.      |   2  |


## Datenbank 
Die Blog-Beiträge sollen in einer Datenbank abgelegt werden. Genauso der Benutzername sowie das Passwort des Administrators. Dazu erstellst du zwei Tabellen, z.B.
- **posts** mit Primärschlüssel **id** und den Feldern **created_at**, **post_title**, **post_text** 
- **users** mit Primärschlüssel **id** und den Feldern **first_name**, **last_name**, **email**, **user_name**, **user_password**

Damit bei einem Blog-Beitrag der Vor- und der Nachname des Erstellers angezeigt werden kann, muss in der **posts** Tabelle ein Fremdschlüssel **user_id** erstellt werden, der die Tabelle **users** referenziert. 

## Fehlerbehandlung
Überprüfe die Eingaben, die der Benutzer macht und gib eine Fehlermeldung aus, wenn die Eingabe nicht valide ist. Dabei genügt es nicht, die Eingabevalidierung nur auf der Client-Seite zu machen (JavaScript könnte im Browser ausgeschaltet sein), sondern sie muss in jedem Fall serverseitig erfolgen.

### Fehlerausgabe
Gib Fehler kontrolliert aus, das heisst, mit einer Fehlermeldung, die der Benutzer versteht. Formatiere die Fehlerausgabe mit CSS.

## Sicherheitsaspekte
Achte darauf, dass sämtliche SQL-Abfragen gegen SQL-Injection geschützt sind. Die Formulare müssen vor Cross-Site Scripting (XSS) sicher sein (Tipp: Escape HTML- und JS-Zeichen in Benutzereingaben). 

## BlPartner-Blogs  


### Code-Beispiele und Tipps 
Einen Array umwandeln in einen JSON-kodierten String: 
'''php
json_encode($myArray)
'''
Von einem Partner-Blog Blogbeiträge abholen: 
'''php
$jsonString =  file_get_contents('http://192.168.51.10/api/blog/get_posts.php');
json_decode($myArray)
'''
