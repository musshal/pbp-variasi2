<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">

    <title>Daftar</title>

  </head>
  <body>
    <div class="container mt-5">
      <div class="card">
        <div class="card-header">Daftar</div>
        <div class="card-body">
          <?php 
            if (isset($_POST["submit"])) {
              $nama = test_input($_POST["nama"]);
              $nim = test_input($_POST["nim"]);
              $jk = test_input($_POST["jk"]);
              $alamat = test_input($_POST["alamat"]);
              $fakultas = test_input($_POST["fakultas"]);
              $jurusan = test_input($_POST["jurusan"]);

              $result = $db->query("INSERT INTO user(nama, nim, jenis_kelamin, alamat, id_fakultas, id_jurusan) VALUES('$nama', '$nim', '$jk', '$alamat', '$fakultas', '$jurusan')");

              if ($result) {
                echo '<div class="alert alert-success">Data berhasil disimpan</div>';
              } else {
                echo '<div class="alert alert-error">Data gagal disimpan</div>';
              }
            }
          ?>
          <form method="POST" name="daftar" id="daftar" onsubmit="return validateForm()" autocomplete="on">
            <div class="mb-3">
              <label for="nama" class="form-label">Nama</label>
              <input type="name" class="form-control" name="nama" id="nama" autofocus>
              <small class="form-text text-danger" id="error_nama"></small>
            </div>
            <div class="mb-3">
              <label for="nim" class="form-label">NIM</label>
              <input type="text" class="form-control" name="nim" id="nim" onkeyup="checkNim(this.value)">
              <small class="form-text text-danger" id="error_nim"></small>
              <small class="form-text text-success" id="success_nim"></small>
            </div>
            <div class="mb-3">
              <div class="form-check">
                <input class="form-check-input" type="radio" name="jk" id="laki_laki">
                <label class="form-check-label" for="laki">Laki-Laki</label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="jk" id="perempuan">
                <label class="form-check-label" for="perempuan">Perempuan</label>
              </div>
              <small class="form-text text-danger" id="error_jk"></small>
            </div>
            <div class="mb-3">
              <label for="alamat" class="form-label">Alamat</label>
              <textarea class="form-control" id="alamat"></textarea>
              <small class="form-text text-danger" id="error_alamat"></small>
            </div>
            <div class="mb-3">
              <label for="fakultas" class="form-label">Fakultas</label>
              <select class="form-select" name="fakultas" id="fakultas" onchange="getJurusan(this.value)">
                <option value="0" selected>Pilih Fakultas</option>
                <?php 
                  require_once("./lib/db_login.php");

                  $query = "SELECT * FROM fakultas";
                  $result = $db->query($query);

                  if (!$result) {
                    die("Could not query the database: <br />" . $db->error);
                  }

                  while ($row = $result->fetch_object()) {
                    echo '<option value="' . $row->id . '">' . $row->nama . '</option>';
                  }

                  $result->free();
                  $db->close();
                ?>
              </select>
              <small class="form-text text-danger" id="error_fakultas"></small>
            </div>
            <div class="mb-3">
              <label for="jurusan" class="form-label">Jurusan</label>
              <select class="form-select" name="jurusan" id="jurusan">              
                <option value="" selected>Pilih Jurusan</option>
              </select>
              <small class="form-text text-danger" id="error_jurusan"></small>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
        </div>
      </div>
    </div>
    
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-W8fXfP3gkOKtndU4JGtKDvXbO53Wy8SZCQHczT5FMiiqmQfUpWbYdTil/SxwZgAN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.min.js" integrity="sha384-skAcpIdS7UcVUC05LJ9Dxay8AXcDYfBJqt1CJ85S/CFujBsIzCIv+l9liuYLaMQ/" crossorigin="anonymous"></script>
    -->

    <script src="scripts/validate.js" type="text/javascript"></script>
    <script src="scripts/ajax.js" type="text/javascript"></script>
    
  </body>
</html>