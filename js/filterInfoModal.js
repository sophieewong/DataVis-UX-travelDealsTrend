var modal = document.getElementById("infoBox");
var btn = document.getElementsByClassName("more-info-icon");
var span = document.getElementsByClassName("close")[0];

function openInfoBox() {
  modal.style.display = "block";
}

span.onclick = function () {
  modal.style.display = "none";
};

window.onclick = function (event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
};
