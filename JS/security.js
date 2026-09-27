$(document).ready(function () {

    if(!localStorage.getItem("email")){
        window.location.href = "signin.php";
    }
});