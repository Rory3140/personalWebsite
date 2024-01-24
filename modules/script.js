// ---------------- Checks script linking ----------------
console.log("script.js Linked");

// ---------------- Sticky navbar ----------------
var navBar = document.getElementById("navbar");
var navDim = navBar.offsetTop;

window.onscroll = function () {
  if (window.pageYOffset >= navDim) {
    navBar.classList.add("sticky");
  } else {
    navBar.classList.remove("sticky");
  }
};

// ---------------- Navbar opening on-click ----------------
var menuButton = document.getElementById("menu-icon");
var navButtons = navBar.getElementsByClassName("button");
var navHidden = true;

menuButton.onclick = function () {
  // Display menu items
  if (navHidden) {
    navBar.style.width = "250px";
    navHidden = false;
    for (let i = 0; i < navButtons.length; i++) {
      navButtons[i].style.left = "25px";
    }
  // Hide menu items
  } else {
    navBar.style.width = "100px";
    navHidden = true;
    for (let i = 0; i < navButtons.length; i++) {
      navButtons[i].style.left = "-200px";
    }
  }
};

// ---------------- Delete Row Link ----------------
function deleteRow(todoid) {
    console.log("Deleting row with ID: " + todoid);
    var hiddenInput = document.querySelector('input[name="todoid"]');
    hiddenInput.value = todoid;
  }
