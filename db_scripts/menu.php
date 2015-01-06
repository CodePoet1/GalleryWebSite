<?php

$servername = "localhost";
$username = "root";
$password = "monty123";

// Create connection
$conn = new mysqli($servername, $username, $password);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create database
$sql = "CREATE DATABASE AnthonyOrme_DB";
if ($conn->query($sql) == TRUE) {
    echo "Database created successfully\n";
    
    $conn = mysql_connect($servername, $username, $password);
    if(! $conn ){
        die('Could not connect: ' . mysql_error());
    }
    echo 'Connected successfully -> $conn->';
}




?>
