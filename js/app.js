$(document).ready( () => {
  let href = window.location.pathname.split("/").reverse()[0];

  if(href === ""){
    href = "index.php"
  }

  $(`.menu a[href="${href}"]`).addClass('active');
});
  
