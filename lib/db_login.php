<?php 
  $db_host = "localhost";
  $db_username = "root";
  $db_password = "";
  $db_database = "pbp_variasi2";

  $db = new mysqli($db_host, $db_username, $db_password, $db_database);

  if ($db->connect_errno) {
    die("Could not connect to the database: <br />" . $db->connect_error);
  }

  function test_input($data) {
    global $db;

    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    $data = $db->real_escape_string($data);

    return $data;
  }
?>