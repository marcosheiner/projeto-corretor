<?php
  header("content-type: text/html;charset=utf-8");
  // Database credentials
  define('DB_SERVER', 'localhost');
  define('DB_USERNAME', 'root');
  define('DB_PASSWORD', '');
  define('DB_NAME', 'db_corretor');

  // Attempt to connect to MySQL database
  $conn = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

  if (!$conn) {
    die("Error: Unable to connect " . $conn->connect_error);
  }

  mysqli_set_charset($conn,"utf8");
?>