console.log("script.js Linked");

var navbar = document.querySelector("#navbar");
var navDim = navbar.offsetTop;

window.onscroll = function () {
  // Sticky navbar
  if (window.pageYOffset >= navDim) {
    navbar.classList.add("sticky");
  } else {
    navbar.classList.remove("sticky");
  }
};

// Links scrollAbove function to link elements
var homeElement = document.getElementById("home-link");
homeElement.onclick = function () {
  scrollAbove("title");
};

var skillsElement = document.getElementById("skills-link");
skillsElement.onclick = function () {
  scrollAbove("skills");
};

var educationElement = document.getElementById("education-link");
educationElement.onclick = function () {
  scrollAbove("education");
};

var workElement = document.getElementById("work-experience-link");
workElement.onclick = function () {
  scrollAbove("work-experience");
};

var aboutElement = document.getElementById("about-link");
aboutElement.onclick = function () {
  scrollAbove("about");
};

var contactElements = document.getElementsByClassName("contact-link");
for (let i = 0; i < contactElements.length; i++) {
  contactElements[i].onclick = function () {
    scrollAbove("contact");
  };
}

// Scroll on link click
function scrollAbove(id) {
  let margin = 49;
  var element = document.getElementById(id);
  let dims = element.getBoundingClientRect();
  window.scrollTo(window.scrollX, dims.top + window.scrollY - margin);
}

// Links icon and overlay to show and hide function
var overlayElement = document.getElementById("overlay");
overlayElement.onclick = function () {
  hideOverlay();
};

var javaElement = document.getElementById("java");
javaElement.onclick = function () {
  showOverlay("java-content");
};

var javascriptElement = document.getElementById("javascript");
javascriptElement.onclick = function () {
  showOverlay("javascript-content");
};

var cplusElement = document.getElementById("cplus");
cplusElement.onclick = function () {
  showOverlay("cplus-content");
};

var htmlElement = document.getElementById("html");
htmlElement.onclick = function () {
  showOverlay("html-content");
};

var cssElement = document.getElementById("css");
cssElement.onclick = function () {
  showOverlay("css-content");
};

var sqlElement = document.getElementById("sql");
sqlElement.onclick = function () {
  showOverlay("sql-content");
};

var pythonElement = document.getElementById("python");
pythonElement.onclick = function () {
  showOverlay("python-content");
};

var seleniumElement = document.getElementById("selenium");
seleniumElement.onclick = function () {
  showOverlay("selenium-content");
};

var nodeElement = document.getElementById("node");
nodeElement.onclick = function () {
  showOverlay("node-content");
};

function showOverlay(id) {
  overlayElement.style.display = "flex";
  document.getElementById(id).style.display = "block";
}

function hideOverlay() {
  overlayElement.style.display = "none";

  var contentElements = overlayElement.getElementsByClassName("content");
  for (let i = 0; i < contentElements.length; i++) {
    contentElements[i].style.display = "none";
  }
}
