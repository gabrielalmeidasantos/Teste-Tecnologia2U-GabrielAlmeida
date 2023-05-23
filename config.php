<?php

session_start();

$db = "tecn2u";
$host = "localhost";
$user = "root";
$pass = "";

$conn = new PDO("mysql:dbname=$db;host=$host", $user, $pass);
