<?php
require "../classes/DatabaseConnection.php";

$pdo = DatabaseConnection::getInstance();

echo "<p>" . DatabaseConnection::$numberOfInstances . "</p>";

$pdo = DatabaseConnection::getInstance();

echo "<p>" . DatabaseConnection::$numberOfInstances . "</p>";