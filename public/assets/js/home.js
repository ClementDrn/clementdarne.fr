const nav = document.querySelector(".navigation-bar");
const navHome = document.querySelector("#nav-home");
const navProjects = document.querySelector("#nav-projects");
const navAbout = document.querySelector("#nav-about");
const navContact = document.querySelector("#nav-contact");

const sectionHome = document.querySelector("#start-page");
const sectionProjects = document.querySelector("#projects");
const sectionAbout = document.querySelector("#about");
const sectionContact = document.querySelector("#contact");

let wasNavClicked = false;

// Update active (highlighted) section in navbar when scrolling
window.onscroll = function () {
  // Skip if the user has clicked on the navbar so we do not update multiple times
  if (wasNavClicked) {
    return;
  }

  // Home
  if (window.scrollY >= sectionHome.offsetTop && window.scrollY < sectionHome.offsetTop + sectionHome.offsetHeight) {
    navHome.classList.add("active");
  }
  else {
    navHome.classList.remove("active");
  }
  // Projects
  if (window.scrollY >= sectionProjects.offsetTop && window.scrollY < sectionProjects.offsetTop + sectionProjects.offsetHeight) {
    navProjects.classList.add("active");
  }
  else {
    navProjects.classList.remove("active");
  }
  // About
  if (window.scrollY >= sectionAbout.offsetTop && window.scrollY < sectionAbout.offsetTop + sectionAbout.offsetHeight) {
    navAbout.classList.add("active");
  }
  else {
    navAbout.classList.remove("active");
  }
  // Contact
  if (window.scrollY >= sectionContact.offsetTop && window.scrollY < sectionContact.offsetTop + sectionContact.offsetHeight) {
    navContact.classList.add("active");
  }
  else {
    navContact.classList.remove("active");
  }
};

var timer = null;
window.addEventListener('scroll', function() {
  if(timer !== null) {
    clearTimeout(timer);        
  }
  timer = setTimeout(function() {
    // Reset wasNavClicked
    wasNavClicked = false;
  }, 150);
}, false);

// When clicking a nav item, it must be set to active (highlited)
document.querySelectorAll('a').forEach(link => {
  link.addEventListener('click', function(event) {
    // 'this' is the link that was clicked
    var href = this.href;
    console.log("You're trying to go to " + href);
    switch (href.substring(href.lastIndexOf("#") + 1)) {  // get content after #
      case "start-page":
        wasNavClicked = true;
        navHome.classList.add("active");
        navProjects.classList.remove("active");
        navAbout.classList.remove("active");
        navContact.classList.remove("active");
        break;
      case "projects":
        wasNavClicked = true;
        navHome.classList.remove("active");
        navProjects.classList.add("active");
        navAbout.classList.remove("active");
        navContact.classList.remove("active");
        break;
      case "about":
        wasNavClicked = true;
        navHome.classList.remove("active");
        navProjects.classList.remove("active");
        navAbout.classList.add("active");
        navContact.classList.remove("active");
        break;
      case "contact":
        wasNavClicked = true;
        navHome.classList.remove("active");
        navProjects.classList.remove("active");
        navAbout.classList.remove("active");
        navContact.classList.add("active");
        break;
    }
  });
});
