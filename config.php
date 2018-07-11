<?php

/**
 * Configuration for database connection
 *
 */

$host       = "localhost";
$username   = "root";
$password   = "pangot";
$dbname     = "orthalis";
$dsn        = "mysql:host=$host;dbname=$dbname;charset=utf8";
$options    = array(
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
              );
