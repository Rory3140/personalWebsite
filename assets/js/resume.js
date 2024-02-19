// ---------------- Checks script linking ----------------
console.log("script.js Linked");

// ---------------- Navbar opening on-click ----------------
var navMenu = document.getElementById("nav-menu");
var navButtons = navMenu.getElementsByClassName("button");
var navHidden = true;

function openCloseMenu() {
  if (navHidden) {
    openMenu();
  } else {
    closeMenu();
  }
}

function openMenu() {
  navMenu.style.width = "310px";
  navHidden = false;
  for (let i = 0; i < navButtons.length; i++) {
    navButtons[i].style.left = "50px";
  }
}

function closeMenu() {
  navMenu.style.width = "100px";
  navHidden = true;
  for (let i = 0; i < navButtons.length; i++) {
    navButtons[i].style.left = "-200px";
  }
}

// ---------------- Scroll Above Element----------------
function scrollAbove(id) {
  closeMenu();
  let margin = 50;
  var element = document.getElementById(id);
  let dims = element.getBoundingClientRect();
  window.scrollTo(window.scrollX, dims.top + window.scrollY - margin);
}

// ---------------- Card Flip ----------------
var card = document.querySelector(".card");
var codingContent = document.querySelectorAll(".coding-content");
var previous = null;
var flipped = false;

function flipCard(element) {
  var newCard = document.querySelector("." + element.id);
  if (newCard === previous) {
    flip();
    return;
  }

  if (!flipped) {
    previous = null;
    flip();
  }

  for (let i = 0; i < codingContent.length; i++) {
    codingContent[i].style.display = "none";
  }

  newCard.style.display = "flex";
  previous = newCard;
}

function flip() {
  card.classList.toggle("is-flipped");
  flipped = !flipped;
}
