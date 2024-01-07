console.log("script.js Linked");

var navBar = document.getElementById("navbar");
var navDim = navBar.offsetTop;

window.onscroll = function () {
  // Sticky navbar
  if (window.pageYOffset >= navDim) {
    navBar.classList.add("sticky");
  } else {
    navBar.classList.remove("sticky");
  }
};

var menuButton = document.getElementById("menu-icon");
var navButtons = navBar.getElementsByClassName("button");
var navHidden = true;

menuButton.onclick = function () {
  if (navHidden) {
    navBar.style.width = "200px";
    navHidden = false;
    console.log(navButtons.length);
    for (let i = 0; i < navButtons.length; i++) {
      //navButtons[i].style.display = 'flex';
      //navButtons[i].style.width = '150px';
      navButtons[i].style.left = "0px";
    }
  } else {
    navBar.style.width = "50px";
    navHidden = true;
    for (let i = 0; i < navButtons.length; i++) {
      //navButtons[i].style.display = 'none';
      //navButtons[i].style.width = '0px';
      navButtons[i].style.left = "-200px";
    }
  }
};
