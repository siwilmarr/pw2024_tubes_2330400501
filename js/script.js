const tombolCari = document.querySelector(".tombol-cari");
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

  xhr.open("get", "ajax/ajax_cari.php?keyword=" + keyword.value);
  xhr.send();

  // fetch
  //   fetch("ajax/ajax_cari.php?keyword=" + keyword.value);
  //   .then((response) => response.text());
  //   .then((response) => (container.innerHTML = response));
});

// preview Image untuk tambah dan ubah

function previewImage() {
  const gambar = document.querySelector(".gambar");
  const imgPreview = document.querySelector(".img-preview");

  const oFReader = new FileReader();
  oFReader.readAsDataURL(gambar.files[0]);

  oFReader.onload = function (oFREvent) {
    imgPreview.src = oFREvent.target.result;
  };
}
