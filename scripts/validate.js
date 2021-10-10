function validateForm() {
  resetError();
  let isValid = true;

  if (document.forms["daftar"]["nama"].value == "") {
    document.getElementById("error_nama").innerHTML = "Nama harus diisi";

    isValid = false;
  }

  if (document.forms["daftar"]["nim"].value == "") {
    document.getElementById("error_nim").innerHTML = "NIM harus diisi";

    isValid = false;
  }

  if (document.forms["daftar"]["jk"].value == "") {
    document.getElementById("error_jk").innerHTML = "Jenis kelamin harus diisi";

    isValid = false;
  }

  if (document.forms["daftar"]["alamat"].value == "") {
    document.getElementById("error_alamat").innerHTML = "Alamat harus diisi";

    isValid = false;
  }

  if (
    document.forms["daftar"]["fakultas"].value == "" ||
    document.forms["daftar"]["fakultas"].value == 0
  ) {
    document.getElementById("error_fakultas").innerHTML =
      "Fakultas harus dipilih";

    isValid = false;
  }

  if (document.forms["daftar"]["jurusan"].value == "") {
    document.getElementById("error_jurusan").innerHTML =
      "Jurusan harus dipilih";

    isValid = false;
  }

  return isValid;
}

function resetError() {
  document.querySelectorAll("[id$='error_']").forEach((e) => {
    e.style.display = "none";
  });
  document.getElementById("success_nim").style.display = "none";
}

resetError();
