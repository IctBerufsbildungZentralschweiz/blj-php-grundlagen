# Datenbankanbindung

Um mit PHP auf eine Datenbank zuzugreifen verwenden wir [`PHP Data Objects`](http://php.net/book.pdo) (kurz PDO).

Die von PHP zur Verfügung gestellte PDO-Klasse stellt ein einheitliches Interface zur Anbindung unterschiedlicher Datenbanktypen bereit.

## Verbindung herstellen

```php
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
$stmt = $dbh->query('INSERT INTO `tasks` (description) VALUES ("Geschirr abwaschen")');
$stmt->execute();
```

## Update

```php
$stmt = $dbh->query('UPDATE `tasks` SET done = 1 WHERE id = 50');
$stmt->execute();
```

## Delete

```php
$stmt = $dbh->query('DELETE FROM `tasks` WHERE done = 1');
$stmt->execute();
```

## Prepared-Statements

```php
$stmt = $dbh->prepare('SELECT * FROM `users` WHERE id = :id');
$stmt->execute([':id' => 1]);

foreach($stmt->fetchAll() as $x) {
    var_dump($x);
}
```
