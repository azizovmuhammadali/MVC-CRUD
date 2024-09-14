<?php 

$dsn = "mysql:host=localhost;port=3306;dbname=mvc-tuto"; // mysql config 

$username = "root"; // mysql username 

$password = ""; // mysql password 

try { 

// PDO Library 

$pdo = new PDO($dsn, $username, $password); 

$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 

$sql = "CREATE TABLE posts (
    id SERIAL PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    content TEXT NOT NULL,
    image VARCHAR(255),
    author_name VARCHAR(25) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

$pdo->exec($sql); 

echo "Bog'lanish muvaffaqiyatli!"; 

} catch (PDOException $e) { 

echo "Bog'lanish xatosi: " . $e->getMessage(); 

} 