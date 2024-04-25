// Code for navigation bar scroll effect
window.onscroll = function() {
    const header = document.querySelector('header.header-fixed');
    if (window.scrollY > 0) {
      header.classList.add('nav-shadow');
    } 
    else {
      header.classList.remove('nav-shadow');
    }
};
