let href = window.location.pathname.split("/").reverse()[0];

$(document).ready(function() {
    $(`.menu a[href="${href}"]`).addClass('active');
});

if(href == "login.php" || href == "register.php" || href == "contact%20us.php"){
    href = "index.php";
}
