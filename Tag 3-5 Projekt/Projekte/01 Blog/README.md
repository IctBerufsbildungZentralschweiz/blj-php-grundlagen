# Blog
Dein Auftrag ist es, ein Blog zu erstellen. Die Blog-Beiträge, die durch den Blogger erstellt werden, können von den Besuchern des Blogs gelesen werden. 

## Anforderungen 
Die Anforderungen an den Blog, d.h. welche Funktionen der Blog für den Benutzer anbieten soll, sind nachfolgend aufgeführt. Diese Anforderungen sind priorisiert: 
- 1 = must 
- 2 = should 
- 3 = nice to have 

Achte darauf, dass du zuerst die Anforderungen mit der höchsten Priorität erfüllst und erst am Schluss, wenn du noch Zeit hast, die tiefer priorisierten und damit nicht ganz so wichtigen Funktionen ausprogrammierst. 

| Nr   | Beschreibung                                                                                                                     | Prio |
|------|----------------------------------------------------------------------------------------------------------------------------------|------|
| A001 | Als Benutzer will ich Blog-Beiträge lesen können.                                                                                |   1  |
| A002 | Als Blogger will ich Blog-Beiträge schreiben können.                                                                             |   1  |
| A003 | Zu jedem Blog-Beitrag sollen der Name des Bloggers sowie Erstelldatum/-zeit angezeigt werden.                                    |   1  |
| A004 | Als Benutzer will ich eine Liste mit Links zu den Blogs meiner BLJ-Kollegen sehen.                                               |   1  |
| A005 | Als Benutzer will ich einen Blog-Beitrag bewerten können.                                                                        |   2  |
| A006 | Als Blogger will ich Bilder aus dem Internet verlinken können, um meine Beiträge interessanter zu machen.                        |   2  | 
| A007 | Als BLJ-Coach will ich, dass die Link-Liste aller BLJ-Blogs (siehe A004) zentral abgelegt und dynamisch erstellt wird.           |   2  |
| A008 | Als Blog-Entwickler will ich, dass andere Entwickler alle Beiträge meines Blogs über eine JSON-Schnittstelle abrufen können.     |   2  |
| A009 | Als Benutzer will ich auch die Blog-Beiträge aller anderen BLJ-Blogs sehen.                                                      |   2  |
| A010 | Als Blogger will ich mich einloggen, um Blog-Beiträge zu schreiben, damit niemand in meinem Namen bloggen kann.                  |   3  |
| A011 | Als Blogger will ich, das mein Passwort verschlüsselt in der Datenbank abgelegt wird.                                            |   3  |
| A012 | Als Blogger will ich mein Passwort ändern können.                                                                                |   3  |
| A013 | Als Benutzer will ich einen Blog-Beitrag kommentieren können.                                                                    |   3  |
| A014 | Als Blogger will ich per E-Mail informiert werden, wenn eine meiner Beiträge bewertet/kommentiert wurde.                         |   3  |
| A015 | Als Benutzer will ich mich registrieren können, um selber als Blogger Beiträge schreiben zu können.                              |   3  |

## Datenbank 
Die Blog-Beiträge sollen in einer Datenbank abgelegt werden. Dazu erstellst du eine Tabelle, z.B.
- **posts** mit Primärschlüssel **id** und den Feldern   **created_by**, **created_at**, **post_title**, **post_text** 

Sobald du die Anforderungen der 3.Prioriät implementieren willst, wirst du die Datenbank erweitern müssen, um Benutzername und Passwort des Bloggers ablegen zu können. Eine weitere Tabelle wird nötig, z.B. 
- **users** mit Primärschlüssel **id** und den Feldern **first_name**, **last_name**, **email**, **user_name**, **user_password**

Damit bei einem Blog-Beitrag der Vor- und der Nachname des Bloggers (die neu in der Tabelle **users** gespeichert werden), angezeigt werden kann, muss in der **posts**-Tabelle ein Fremdschlüssel **user_id** erstellt werden, der die Tabelle **users** referenziert. Das Feld **created_by** wird überflüssig

## Zusätzliche Anforderungen
### Fehlerbehandlung
Überprüfe die Eingaben, die der Benutzer macht und gib eine Fehlermeldung aus, wenn die Eingabe nicht valide ist. Dabei genügt es nicht, die Eingabevalidierung nur auf der Client-Seite zu machen (JavaScript könnte im Browser ausgeschaltet sein), sondern sie muss in jedem Fall serverseitig erfolgen.

#### Fehlerausgabe
Gib Fehler kontrolliert aus, das heisst, mit einer Fehlermeldung, die der Benutzer versteht. Formatiere die Fehlerausgabe mit CSS.

### Sicherheitsaspekte
Achte darauf, dass sämtliche SQL-Abfragen gegen SQL-Injection geschützt sind. Die Formulare müssen vor Cross-Site Scripting (XSS) sicher sein (Tipp: Escape HTML- und JS-Zeichen in Benutzereingaben). 

## Hinweise  

### JSON
JSON - JavaScript Object Notation - ist ein Datenformat in einer einfach lesbaren Form zum Zweck des Datenaustauschs zwischen Anwendungen.

Beispiel:
```javascript 
{
  "Kontonummer": "8270501",
  "Waehrung": "CHF", 
  "IBAN": "CHF6181458000008270501", 
  "Inhaber":
  {
    "Name": "Mustermann",
    "Vorname": "Max",
    "maennlich": true,
    "Hobbys": ["Reiten", "Golfen", "Lesen"],
    "Alter": 42,
    "Kinder": [],
    "Partner": null
  }
}
```
 JSON wird insbesondere bei Webapplikationen häufig zum Transfer von Daten zwischen dem Client und dem Server genutzt; denn ein Browser und ein Webserver können "nur" Text austauschen. Das bedeutet, dass z.B. Daten, die auf dem Server in einem PHP-Array gespeichert sind, in JSON umgewandelt werden können, bevor sie über Internet an den Browser (oder an einen anderen Server) übertragen werden. 

#### PHP-Array umwandeln in einen JSON-kodierten String
```php
json_encode($myArray)
```
#### Mit PHP Daten über eine JSON-Schnittstelle abholen
```php
$jsonString = file_get_contents('http://192.168.51.10/api/blog/get_posts.php');
json_decode($myArray)
```
### Passwort verschlüsseln  
Siehe: [Hashing passwords with password_hash()](http://www.phptherightway.com/#password_hashing)

### Weiterer Hinweis
Todo