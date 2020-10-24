var typed_strings = $(".typed").data("typed-items");
typed_strings = typed_strings.split(",");
new Typed(".typed", {
  strings: typed_strings,
  loop: true,
  typeSpeed: 100,
  backSpeed: 50,
  backDelay: 2000,
});

function show() {
  var x = document.getElementById("hide");
  x.style.display = "block";
}

function hide() {
  var x = document.getElementById("hide");
  x.style.display = "none";
}

function changeClass(current) {
  if (current.className == "icofont-navigation-menu") {
    current.className = "icofont-error";
  } else if (current.className == "icofont-error") {
    current.className = "icofont-navigation-menu";
  }
}

$(document).ready(function () {});

function preview() {
  const nama = document.querySelector("#photo");
  const namaLabel = document.querySelector(".custom-file-label");
  const imgPreview = document.querySelector(".img-preview");

  namaLabel.textContent = nama.files[0].name;

  const fileNama = new FileReader();
  fileNama.readAsDataURL(nama.files[0]);

  fileNama.onload = function (e) {
    imgPreview.src = e.target.result;
  };
}
