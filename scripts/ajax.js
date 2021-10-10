function getXMLHttpRequest() {
  if (window.XMLHttpRequest) {
    return new XMLHttpRequest();
  } else {
    return new ActiveXObject("Microsoft.XMLHTTP");
  }
}

function callAjax(url, inner) {
  const xmlHttp = getXMLHttpRequest();
  xmlHttp.open("GET", url, true);

  xmlHttp.onreadystatechange = function () {
    document.getElementById(inner).innerHTML =
      '<img src="../img/ajax_loader.png" alt="ajax_loader" />';

    if (xmlHttp.readyState == 4 && xmlHttp.status == 200) {
      document.getElementById(inner).innerHTML = xmlHttp.responseText;
    }

    return false;
  };

  xmlHttp.send(null);
}

function checkNim(nim) {
  const inner = "success_nim";
  const url = `./lib/check_nim.php?nim=${nim}`;

  if (nim == "") {
    document.getElementById(inner).innerHTML = "";
  } else {
    callAjax(url, inner);
  }
}

function getJurusan(id_fakultas) {
  const inner = "jurusan";
  const url = `./lib/get_jurusan.php?id_fakultas=${id_fakultas}`;

  if (id_fakultas == "") {
    document.getElementById(inner).innerHTML = "";
  } else {
    callAjax(url, inner);
  }
}
