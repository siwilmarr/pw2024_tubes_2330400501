const tombolCari = document.querySelector(".tombol-cari-user");
const keyword = document.querySelector(".keyword");
const container = document.querySelector(".container");

// hilangkan tombol cari

// event ketika kita menuliskan keyrword
keyword.addEventListener("keyup", function () {
  //   ajax
  // xmlhttpreuqest
  const xhr = new XMLHttpRequest();

  xhr.onreadystatechange = function () {
    if (xhr.readyState == 4 && xhr.status == 200) {
      container.innerHTML = xhr.responseText;
    }
  };

  xhr.open("get", "ajax/ajax_cari_user.php?keyword=" + keyword.value);
  xhr.send();

  // fetch
  //   fetch("ajax/ajax_cari.php?keyword=" + keyword.value);
  //   .then((response) => response.text());
  //   .then((response) => (container.innerHTML = response));
});
