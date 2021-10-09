<?php 
  require_once("./db_login.php");

  if (isset($_GET["nim"])) {
    echo false;
  } else {
    $nim = test_input($_GET["nim"]);

    $query = "SELECT * FROM user WHERE nim = '" . $nim . "'";
    $result = $db->query($query);

    echo $result->num_rows == 0;
  }
?>