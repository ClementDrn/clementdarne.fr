const nav = document.querySelector(".navigation-bar");
const navHome = document.querySelector("#nav-home");
const navProjects = document.querySelector("#nav-projects");
const navAbout = document.querySelector("#nav-about");
const navContact = document.querySelector("#nav-contact");

const sectionHome = document.querySelector("#start-page");
const sectionProjects = document.querySelector("#projects");
const sectionAbout = document.querySelector("#about");
const sectionContact = document.querySelector("#contact");

const header = document.querySelector('header.header-fixed');

// Add shadow to navbar after scrolling
window.addEventListener('scroll', function() {
  if (window.scrollY > 0) {
    header.classList.add('nav-shadow');
  } 
  else {
    header.classList.remove('nav-shadow');
  }
}, false);

// Update active (highlighted) section in navbar when scrolling
let wasNavClicked = false;
window.addEventListener('scroll', function() {
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
}, false);

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

// Set project cards as active when in the middle of the screen
document.addEventListener('DOMContentLoaded', function() {
  // Only enable card activation effect on mobile (max-width 768px)
  if (window.matchMedia('(max-width: 768px)').matches) {
    const cards = document.querySelectorAll('.card');
    const observer = new IntersectionObserver(entries => {
      entries.forEach(entry => {
        if (entry.intersectionRatio >= 0.5) {
          entry.target.classList.add('active');
        } else {
          entry.target.classList.remove('active');
        }
      });
    }, {
      threshold: [0.5],
      rootMargin: "0px 0px -25% 0px"
    });

    cards.forEach(card => observer.observe(card));
  }
});

// Adjust font size of h3 elements in cards to fit the content within the card
document.addEventListener('DOMContentLoaded', function(){
  document.querySelectorAll('.fallback-alt').forEach(fallback => {
    adjustFontSize(fallback);
  });
});

function adjustFontSize(text) {
  // Minimum font size in px
  const minFontSize = 12;
  // Get the computed style initially
  const computedStyle = window.getComputedStyle(text);
  const maxFontSize = parseFloat(computedStyle.fontSize) || 20;

  let low = minFontSize;
  let high = maxFontSize;
  let best = minFontSize;

  while(low <= high) {
    let mid = Math.floor((low + high) / 2);
    text.style.fontSize = mid + 'px';

    // Measure text width after forcing a reflow
    let currentWidth = text.scrollWidth;
    let containerWidth = text.offsetWidth;

    if(currentWidth <= containerWidth) {
      best = mid;
      low = mid + 1;
    } else {
      high = mid - 1;
    }
  }

  text.style.fontSize = best + 'px';
}
