// ---------------- Checks script linking ----------------
console.log("script.js Linked");

// ---------------- Navbar opening on-click ----------------
var menuButton = document.getElementById("menu-icon");
var navMenu = document.getElementById("nav-menu");
var navButtons = navMenu.getElementsByClassName("button");
var navHidden = true;

menuButton.onclick = function () {
  // Display menu items
  if (navHidden) {
    navMenu.style.width = "300px";
    navHidden = false;
    for (let i = 0; i < navButtons.length; i++) {
      navButtons[i].style.left = "50px";
    }
  // Hide menu items
  } else {
    navMenu.style.width = "100px";
    navHidden = true;
    for (let i = 0; i < navButtons.length; i++) {
      navButtons[i].style.left = "-200px";
    }
  }
};

// ---------------- Delete Row Link ----------------
function deleteRow(todoid) {
    console.log("Deleting row with ID: " + todoid);
    var hiddenInput = document.querySelector('input[name="todo-id"]');
    hiddenInput.value = todoid;
  }
