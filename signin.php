<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Sign In</title>

    <!-- Font Awesome -->
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap"
          rel="stylesheet">

    <!-- CSS -->
    <link rel="stylesheet" href="CSS/signin.css">

    <!-- Dialog CSS -->
    <link rel="stylesheet" href="CSS/dialog.css">

</head>

<body>


    <!-- =========================
         ANIMATED BACKGROUND
    ========================== -->

    <div class="background">

        <div class="circle circle1"></div>
        <div class="circle circle2"></div>
        <div class="circle circle3"></div>

        <div class="floating-icon icon1">
            <i class="fa-solid fa-envelope"></i>
        </div>

        <div class="floating-icon icon2">
            <i class="fa-solid fa-shield-halved"></i>
        </div>

        <div class="floating-icon icon3">
            <i class="fa-solid fa-lock"></i>
        </div>

        <div class="floating-icon icon4">
            <i class="fa-solid fa-key"></i>
        </div>

    </div>


    <!-- =========================
         AUTH CONTAINER
    ========================== -->

    <div class="auth-container">

        <!-- TOP ICON -->

        <div class="auth-icon">

            <i class="fa-solid fa-envelope"></i>

        </div>


        <!-- TITLE -->

        <h1 class="auth-title">
            Sign In
        </h1>

        <p class="auth-subtitle">
            Sign in securely using your email and OTP
        </p>


        <!-- =========================
             EMAIL BOX
        ========================== -->

        <div id="EmailBox">

            <div class="input-label">
                Email Address
            </div>

            <div class="input-group">

                <i class="fa-solid fa-envelope input-icon"></i>

                <input
                    type="email"
                    id="email"
                    placeholder="Enter your email"
                    autocomplete="email"
                >

            </div>


            <button
                type="button"
                id="btn1"
                class="main-btn"
            >

                <span>
                    <i class="fa-solid fa-paper-plane"></i>
                    Generate OTP
                </span>

            </button>


            <div class="security-info">

                <i class="fa-solid fa-shield-halved"></i>

                <span>
                    Your email is securely protected
                </span>

            </div>

        </div>


        <!-- =========================
             OTP BOX
        ========================== -->

        <div id="OtpBox" class="hidden">

            <div class="otp-message">

                <div class="otp-small-icon">

                    <i class="fa-solid fa-envelope-circle-check"></i>

                </div>

                <h3>
                    Check Your Email
                </h3>

                <p>
                    We have sent a 4-digit OTP to
                </p>

                <strong id="showEmail">
                    your email
                </strong>

            </div>


            <!-- OTP INPUTS -->

            <div class="otp-container">

                <input
                    type="text"
                    maxlength="1"
                    class="otp-input signin-otp"
                    inputmode="numeric"
                >

                <input
                    type="text"
                    maxlength="1"
                    class="otp-input signin-otp"
                    inputmode="numeric"
                >

                <input
                    type="text"
                    maxlength="1"
                    class="otp-input signin-otp"
                    inputmode="numeric"
                >

                <input
                    type="text"
                    maxlength="1"
                    class="otp-input signin-otp"
                    inputmode="numeric"
                >

            </div>


            <!-- TIMER -->

            <div class="timer-box">

                <i class="fa-regular fa-clock"></i>

                <span id="otpTimer">
                    02:00
                </span>

            </div>


            <!-- VERIFY BUTTON -->

            <button
                type="button"
                id="btn2"
                class="main-btn"
                disabled
            >

                <span>
                    <i class="fa-solid fa-circle-check"></i>
                    Verify OTP
                </span>

            </button>


            <!-- RESEND -->

            <div class="resend-box">

                Didn't receive the OTP?

                <button
                    type="button"
                    id="resendOtp"
                >
                    Resend OTP
                </button>

            </div>


            <!-- CHANGE EMAIL -->

            <button
                type="button"
                id="changeEmail"
                class="change-email"
            >

                <i class="fa-solid fa-arrow-left"></i>

                Change Email

            </button>

        </div>


        <!-- BOTTOM -->

        <div class="auth-footer">
            <i class="fa-solid fa-lock"></i>
            Secure OTP Authentication
        </div>

    </div>


    <!-- DIALOG -->

    <?php include 'dialog.php'; ?>


    <!-- JQUERY -->

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

    <!-- Dialog JS -->

    <script src="JS/dialog.js"></script>

    <script src="JS/signin1.js"></script>

</body>

</html>