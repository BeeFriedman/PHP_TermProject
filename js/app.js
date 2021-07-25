let images = ['assets/building.jpg', 'assets/campus.jpg', 'assets/graduation.jpg'];
let current = 0;
let transitionTime = 2000;

for (let i = 0; i < images.length; i++) {
  new Image().src = images[i];
}

$('.backgroundImage').css('background-image', 'url(' + images[current] + ')');
$('.backgroundImage').css('transition', 'background ' + transitionTime + 'ms ease-in-out')

$(document).ready(function() {
  let href = window.location.pathname.split("/").reverse()[0];

  if(href == "login.php" || href == "register.php" || href == "contact%20us.php"){
    href = "index.php";
  }

  $(`.menu a[href="${href}"]`).addClass('active');
  
  (function update(){
    current = (current + 1) % images.length;
    $('.backgroundImage').css('background-image', 'url(' + images[current] + ')');
    setTimeout(update, 3000);
  }())
});
  
