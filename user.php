<?php 

$dsn = "mysql:host=localhost;port=3306;dbname=mvc-tuto"; // mysql config 

$username = "root"; // mysql username 

$password = ""; // mysql password 

try { 

// PDO Library 

$pdo = new PDO($dsn, $username, $password); 

$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 

$sql = "CREATE TABLE IF NOT EXISTS users (  

id INT(11) NOT NULL  AUTO_INCREMENT , 

name VARCHAR(255) NOT NULL, 

email VARCHAR(255) NOT NULL, 

 password VARCHAR(255) NOT NULL,
 PRIMARY KEY (`id`),
        UNIQUE KEY `email` (`email`)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;";


$pdo->exec($sql); 

echo "Bog'lanish muvaffaqiyatli!"; 

} catch (PDOException $e) { 

echo "Bog'lanish xatosi: " . $e->getMessage(); 

} 