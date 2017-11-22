# Datenbankanbindung

Um mit PHP auf eine Datenbank zuzugreifen verwenden wir [`PHP Data Objects`](http://php.net/book.pdo) (kurz PDO).

Die von PHP zur Verfügung gestellte PDO-Klasse stellt ein einheitliches Interface zur Anbindung unterschiedlicher Datenbanktypen bereit.

## Verbindung herstellen

```php
$user = 'root';
$pass = '';
$dbh = new PDO('mysql:host=localhost;dbname=test', $user, $pass);
```

## Select

```php
$stmt = $dbh->query('SELECT * FROM `users`');
foreach($stmt->fetchAll() as $x) {
    var_dump($x);
}
```

## Insert

```php
$count = $dbh->exec("INSERT INTO `tasks` (description) VALUES ('Geschirr abwaschen')");
echo "$count Datensätze wurden eingefügt.";
```

## Update

```php
$count = $dbh->exec("UPDATE `tasks` SET done = 1 WHERE id = 50");
echo "$count Datensätze wurden geändert.";
```

## Delete

```php
$count = $dbh->exec("DELETE FROM `tasks` WHERE done = 1");
echo "$count Datensätze wurden gelöscht.";
```

## Prepared-Statements
Um SQL-Injection zu verhindern, sollte ausschliesslich mit  [`Prepared-Statements`](https://de.wikipedia.org/wiki/Prepared_Statement) gearbeitet werden. 
### Select
```php
$stmt = $dbh->prepare('SELECT * FROM `users` WHERE id = :id');
$stmt->execute([':id' => 1]);

foreach($stmt->fetchAll() as $x) {
    var_dump($x);
}
```
### Insert
```php
$stmt = $dbh->prepare("INSERT INTO `users` (first_name, last_name) VALUES(:first, :last) ");
$stmt->execute([':first' => $firstname, ':last' => $lastname]);
```