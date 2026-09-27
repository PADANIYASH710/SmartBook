$(document).ready(function(){

    if(localStorage.getItem("email")){
        window.location.href = "home.php";
    }

    let countdown;
    let timeLeft = 120;
    let email = "";
    let gen_otp = "";


    // SEND OTP

    $("#btn1").click(function(){

        email = $("#email").val().trim();

        if(email == ""){

            showAlert("Error","Please Enter Email");

            return;
        }


        // EMAIL FORMAT CHECK

        let emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

        if(!emailPattern.test(email)){

            showAlert("Error","Please enter valid Email");

            return;
        }


        // LOADING START

        $("#btn1").html(`
            <i class="fa-solid fa-spinner fa-spin"></i>
            Processing...
        `);

        $("#btn1").prop("disabled", true);

        // OTP generation
        
        gen_otp = Math.floor(Math.random() * 9000) + 1000;
        console.log(gen_otp);

        // SEND OTP API

        $.ajax({

            type : "POST",

            url : "EMAIL/otp_send.php",

            data : {
                email : email,
                otp : gen_otp
            },


            success : function(response){

                    // SHOW EMAIL

                    $("#showEmail").text(email);


                    // Hide Title , SubTitle , Icon
                    
                    $(".auth-icon").addClass("hidden");                    
                    
                    $(".auth-title").addClass("hidden");
                    
                    $(".auth-subtitle").addClass("hidden");

                    // HIDE EMAIL BOX
                    
                    $("#EmailBox").addClass("hidden");

                    // SHOW OTP BOX

                    $("#OtpBox").removeClass("hidden");


                    // CLEAR OTP

                    $(".signin-otp").val("");


                    // ENABLE VERIFY

                    $("#btn2").prop("disabled", false);


                    // FOCUS FIRST OTP

                    $(".signin-otp:first").focus();


                    // START TIMER

                    startTimer();

            }

        });

    });



    // TIMER

    function startTimer(){

        clearInterval(countdown);

        timeLeft = 120;

        updateTimer();


        countdown = setInterval(function(){

            timeLeft--;

            updateTimer();


            if(timeLeft <= 0){

                clearInterval(countdown);

                $("#otpTimer").html("OTP Expired");

                $("#btn2").prop("disabled", true);

            }

        },1000);

    }



    // UPDATE TIMER

    function updateTimer(){

        let minutes = Math.floor(timeLeft / 60);

        let seconds = timeLeft % 60;


        $("#otpTimer").text(

            String(minutes).padStart(2,'0')
            +
            ":"
            +
            String(seconds).padStart(2,'0')

        );

    }



    // ONLY NUMBERS

    $(".otp-input").on("input", function(){

        this.value = this.value.replace(/[^0-9]/g,'');

    });



    // AUTO NEXT

    $(".otp-input").keyup(function(){

        if(this.value.length == 1){

            $(this).next(".otp-input").focus();

        }

    });


    // BACKSPACE

    $(".otp-input").keydown(function(e){

        if(
            e.key === "Backspace" &&
            this.value === ""
        ){

            $(this).prev(".otp-input").focus();

        }

    });



    // VERIFY OTP

    $("#btn2").click(function(){

        let user_otp = "";


        $(".signin-otp").each(function(){

            user_otp += $(this).val();

        });


        // VALIDATION

        if(user_otp.length != 4){

            $(".signin-otp").val("");
            $(".signin-otp").first().focus();
        
        }else{
            
            if(gen_otp == user_otp){

                localStorage.setItem("email", email);
                window.location.href = "home.php";
                
            }else{

                showAlert("Error","Invalid OTP");

                $(".signin-otp").val("");

                $(".signin-otp:first").focus();
            }
        }

    });



    // RESEND OTP

    $("#resendOtp").click(function(){

        if(email == ""){

            return;
        }


        $("#resendOtp")
            .prop("disabled", true)
            .text("Sending...");

        // OTP generation
        
        gen_otp = Math.floor(Math.random() * 9000) + 1000;

        $.ajax({

            type : "POST",
            url : "EMAIL/otp_send.php",
            data : {
                
                email : email,
                otp : gen_otp

            },


            success : function(response){
                    $("#resendOtp")
                    .prop("disabled", false)
                    .text("Resend OTP");

                    $(".signin-otp").val("");

                    $(".signin-otp:first").focus();

                    startTimer();

                    $("#btn2").prop("disabled", false);

                    showAlert(
                        "Success",
                        "New OTP has been sent"
                    );

            }

        });

    });



    // CHANGE EMAIL

    $("#changeEmail").click(function(){

        clearInterval(countdown);


        $("#OtpBox").addClass("hidden");

        // Hide Title , SubTitle , Icon
                    
        $(".auth-icon").removeClass("hidden");                    
        
        $(".auth-title").removeClass("hidden");
        
        $(".auth-subtitle").removeClass("hidden");

        $("#EmailBox").removeClass("hidden");


        $("#btn1")
            .html(`
                <span>
                    <i class="fa-solid fa-paper-plane"></i>
                    Generate OTP
                </span>
            `)
            .prop("disabled", false);


        $("#btn2").prop("disabled", true);


        $("#email").focus();

    });

});