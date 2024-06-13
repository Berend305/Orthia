<?php
$host = 'db'; // Dit moet hetzelfde zijn als de servicenaam van de database in docker-compose.yml
$db   = 'ticketsystem'; // Dit moet overeenkomen met MYSQL_DATABASE in docker-compose.yml
$user = 'user'; // Dit moet overeenkomen met MYSQL_USER in docker-compose.yml
$pass = 'userpassword'; // Dit moet overeenkomen met MYSQL_PASSWORD in docker-compose.yml
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

try {
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (\PDOException $e) {
    throw new \PDOException($e->getMessage(), (int)$e->getCode());
}
?>
