<?php 
  require_once("./db_login.php");

  if (isset($_GET["id_fakultas"])) {
    $id_fakultas = $_GET["id_fakultas"];

    $query = "SELECT * FROM jurusan WHERE id_fakultas='" . $id_fakultas . "'";
    $result = $db->query($query);

    if (!$result) {
      die("Could not query the database: <br />" . $db->error);
    }

    echo '<option value="" selected>Pilih Jurusan</option>';
    
    while ($row = $result->fetch_object()) {
      echo '<option value="' . $row->id . '">' . $row->nama . '</option>';
    }

    $result->free();
    $db->close();
  }
?>