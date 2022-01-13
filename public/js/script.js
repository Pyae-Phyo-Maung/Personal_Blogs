window.onscroll = function () {
  myFun();
};

var navbar = document.getElementById("navbar");
var toppx = navbar.offsetTop;

function myFun() {
  if (window.pageYOffset >= toppx) {
    navbar.classList.add("fixMe");
  } else {
    navbar.classList.remove("fixMe");
  }
}
