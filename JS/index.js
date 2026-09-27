$(document).ready(function(){

    $(".home").click(function(){
        
        if(localStorage.getItem("email")){

            window.location.href= "home.php";

        }else{

            window.location.href = "signin.php";
        
        }

    });

});