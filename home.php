<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>StudyHub Dashboard</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" rel="stylesheet">

<link href="css/dialog.css" rel="stylesheet">
<link href="css/comments.css" rel="stylesheet">
<link href="css/home.css" rel="stylesheet">
<link href="css/dashboard.css" rel="stylesheet">
<link href="css/profile.css" rel="stylesheet">
<link href="css/notification.css" rel="stylesheet">
<link href="css/withdraw.css" rel="stylesheet">
<link href="css/support_center.css" rel="stylesheet">
<link href="css/posts.css" rel="stylesheet">
<link href="css/users.css" rel="stylesheet">
<link href="css/help_center.css" rel="stylesheet">
<link href="css/withdrawal.css" rel="stylesheet">

</head>

<body class="user-select-none">

<!-- =========================
MOBILE SIDEBAR
========================= -->

<div class="offcanvas offcanvas-start" tabindex="-1" id="mobileSidebar">

    <div class="offcanvas-header">
        
       <div class="logo">
            <img src="IMG/logo.png" alt="SmartBook" width="60px"/><div id="mobile_logo_text">SmartBook</div>
        </div>

    </div>

    <div class="offcanvas-body">

        <div class="sidebar-menu site">

            <a href="#" class="active" data-page="home">
                <i class="fa-solid fa-house"></i>
                Home
            </a>

            <a href="#" data-page="about">
                <i class="fa-solid fa-info-circle"></i>
                About Us
            </a>

            <a href="#" data-page="contact">
                <i class="fa-solid fa-envelope"></i>
                Contact Us
            </a>

            <a href="#" data-page="term-conditions">
                <i class="fa-solid fa-file-contract"></i>
                Terms & Conditions
            </a>

            <a href="#" data-page="privacy-policy">
                <i class="fa-solid fa-user-shield"></i>
                Privacy Policy
            </a>

            <a href="#" data-page="my-dashboard">
                <i class="fa-regular fa-user"></i>
                My Dashboard
            </a>

            <a href="#" data-page="logout">
                <i class="fa-solid   fa-right-from-bracket"></i>
                Logout
            </a>

        </div>

        <div class="sidebar-menu admin d-none">

            <a href="#" data-page="dashboard">
                <i class="fa-solid fa-house"></i>
                Dashboard
            </a>

            <a href="#" data-page="withdraw">
                <i class="fa-solid fa-building-columns"></i>
                Withdraw
            </a>

            <a href="#" data-page="support">
                <i class="fa-solid fa-headset"></i>
                Support
            </a>

            <a href="#" data-page="profile-form">
                <i class="fa-solid fa-user-pen"></i>
                Profile
            </a>

            <a href="#" data-page="back-to-site">
                <i class="fa-solid fa-arrow-up-right-from-square"></i>
                Back to Site
            </a>

                <!--    Founder Menu    -->
            <hr class="founder">

            <a href="#" data-page="posts" class="founder">
                <i class="fa-solid fa-layer-group"></i>
                Posts
            </a>

            <a href="#" data-page="users" class="founder">
                <i class="fa-solid fa-users"></i>
                Users
            </a>

            <a href="#" data-page="withdrawals" class="founder">
                <i class="fa-solid fa-wallet"></i>
                Withdrawals
            </a>

            <a href="#" data-page="help_center" class="founder">
                <i class="fa-solid fa-headset"></i>
                Help Center
            </a>

            
        </div>

    </div>

</div>

<!-- =========================
DESKTOP SIDEBAR
========================= -->

<div class="sidebar">

    <div class="logo">
        <img src="IMG/logo.png" alt="SmartBook" width="70px"/><div>SmartBook</div>
    </div>

    <div class="sidebar-menu site">

        <a href="#" class="first-home-menu active" data-page="home">
            <i class="fa-solid fa-house"></i>
            Home
        </a>

        <a href="#" data-page="about">
            <i class="fa-solid fa-info-circle"></i>
            About Us
        </a>

        <a href="#" data-page="contact">
            <i class="fa-solid fa-envelope"></i>
            Contact Us
        </a>

        <a href="#" data-page="term-conditions">
            <i class="fa-solid fa-file-contract"></i>
            Terms & Conditions
        </a>

        <a href="#" data-page="privacy-policy">
            <i class="fa-solid fa-user-shield"></i>
            Privacy Policy
        </a>

        <a href="#" data-page="my-dashboard">
            <i class="fa-regular fa-user"></i>
            My Dashboard
        </a>

        <a href="#" data-page="logout">
            <i class="fa-solid fa-right-from-bracket"></i>
            Logout
        </a>

    </div>

    <div class="sidebar-menu admin d-none">

        <a href="#" data-page="dashboard">
            <i class="fa-solid fa-house"></i>
            Dashboard
        </a>

        <a href="#" data-page="withdraw"> <!--     class="disabled"     -->
            <i class="fa-solid fa-building-columns"></i>
            Withdraw
        </a>

        <a href="#" data-page="support">
            <i class="fa-solid fa-headset"></i>
            Support
        </a>

        <a href="#" data-page="profile-form">
            <i class="fa-solid fa-user-pen"></i>
            Profile
        </a>

        <a href="#" data-page="back-to-site">
            <i class="fa-solid fa-arrow-up-right-from-square"></i>
            Back to Site
        </a>

        <!--    Founder Menu    -->
        <hr class="founder">

        <a href="#" data-page="posts" class="founder">
            <i class="fa-solid fa-layer-group"></i>
            Posts
        </a>

        <a href="#" data-page="users" class="founder">
            <i class="fa-solid fa-users"></i>
            Users
        </a>

        <a href="#" data-page="withdrawals" class="founder">
            <i class="fa-solid fa-wallet"></i>
            Withdrawals
        </a>

        <a href="#" data-page="help_center" class="founder">
            <i class="fa-solid fa-headset"></i>
            Help Center
        </a>

    </div>

</div>

<!-- =========================
MAIN CONTENT
========================= -->

<div class="main-content">

<!-- =========================
HEADER
========================= -->

<header class="topbar">

    <div class="d-flex justify-content-between align-items-center">

        <div class="d-flex align-items-center gap-3">

            <!-- Modern Hamburger -->

            <button class="mobile-toggle"
                data-bs-toggle="offcanvas"
                data-bs-target="#mobileSidebar">

                <i class="fa-solid fa-bars-staggered"></i>

            </button>

            <!-- Search -->

            <div class="search-box">

                <i class="fa-solid fa-magnifying-glass"></i>

                <input
                    type="text"
                    placeholder="Search posts ...">

            </div>

        </div>

        <!-- Right Side -->

        <div class="header-right">

            <!-- Only Profile Icon -->
            <a href="#" data-page="profile" class="icon-a site">
                <div class="profile">
                    <img src="BACK-END/UPLOADS/PROFILE/default_profile.png" alt="Profile">
                </div>
            </a>

            <div class="notification admin d-none">
                <a href="#" data-page="notification" class="icon-a admin"> 
                    <i class="fa-regular fa-bell"></i>
                    <span></span>
                </a>
            </div>

        </div>

    </div>

</header>

<!-- ====================================================
    Home Page 
===================================================== -->
<section id="home-page" class="page active-page">

    <!-- =========================
        HORIZONTAL MENU
    ========================= -->

    <div class="category-nav">
        
        <a href="#" data-page="all" class="active">
            All
        </a>

        <a href="#" data-page="education">
            <i class="fa-solid fa-graduation-cap"></i>
            Education
        </a>

        <a href="#" data-page="news">
            <i class="fa-solid fa-newspaper"></i>
            News
        </a>

        <a href="#" data-page="programming">
            <i class="fa-solid fa-code"></i>
            Programming
        </a>

        <a href="#" data-page="technology">
            <i class="fa-solid fa-microchip"></i>
            Technology
        </a>

        <a href="#" data-page="science">
            <i class="fa-solid fa-flask"></i>
            Science
        </a>

        <a href="#" data-page="history">
            <i class="fa-solid fa-book"></i>
            History
        </a>

        <a href="#" data-page="general_knowledge">
            <i class="fa-solid fa-brain"></i>
            General Knowledge
        </a>

        <a href="#" data-page="environment">
            <i class="fa-solid fa-leaf"></i>
            Environment
        </a>

        <a href="#" data-page="geography">
            <i class="fa-solid fa-earth-americas"></i>
            Geography 
        </a>

        <a href="#" data-page="sports">
            <i class="fa-solid fa-futbol"></i>
            Sports
        </a>

    </div>
 
    <!-- ====================================
                All
    ===================================== -->   
    <section id="all-page" class="page active-page">
        
        <!-- =========================
                 HERO 
        ========================= -->

        <div class="hero">

            <div class="row align-items-center">

                <div class="col-lg-6">

                    <span class="hero-badge">
                        🚀 Learning Platform
                    </span>

                    <h1>
                        Learn, Explore &
                        Share Knowledge
                    </h1>

                    <p>
                        Discover tutorials, videos,
                        articles and premium content
                        from creators around the world.
                    </p>

                    <div class="hero-buttons">

                        <button class="btn btn-light" id="explore_post">
                            Explore Posts
                        </button>

                        <button class="btn btn-outline-light">
                            Watch Videos
                        </button>

                    </div>

                </div>

                <div class="col-lg-6 text-center">

                    <img
                    src="https://images.unsplash.com/photo-1516321318423-f06f85e504b3?w=1200"
                    class="img-fluid hero-image">

                </div>

            </div>

        </div>
        <!-- =========================
        LATEST POSTS
        ========================= -->

        <div class="latest-posts">

            <div class="section-header">

                <h2 id="explore_post_title">Latest Posts</h2>

            </div>

            <div class="row g-4" id="all_post"></div>

        </div>

    </section>

    <!-- ====================================
                Education
    ===================================== -->
    <section id="education-page" class="page">
        <div class="latest-posts">
            <div class="row g-4" id="education_post"></div>
        </div>
    </section>

    <!-- ====================================
                News
    ===================================== -->
    <section id="news-page" class="page">
        <div class="latest-posts">
            <div class="row g-4" id="news_post"></div>
        </div>
    </section>

    <!-- ====================================
                Programming
    ===================================== -->
    <section id="programming-page" class="page">
        <div class="latest-posts">
            <div class="row g-4" id="programming_post"></div>
        </div>
    </section>

    <!-- ====================================
                Technology
    ===================================== -->
    <section id="technology-page" class="page">
        <div class="latest-posts">
            <div class="row g-4" id="technology_post"></div>
        </div>
    </section>

    <!-- ====================================
                Science
    ===================================== -->
    <section id="science-page" class="page">
        <div class="latest-posts">
            <div class="row g-4" id="science_post"></div>
        </div>
    </section>

    <!-- ====================================
                History
    ===================================== -->
    <section id="history-page" class="page">
        <div class="latest-posts">
            <div class="row g-4" id="history_post"></div>
        </div>
    </section>

    <!-- ====================================
                General Knowledge
    ===================================== -->
    <section id="general_knowledge-page" class="page">
        <div class="latest-posts">
            <div class="row g-4" id="general_knowledge_post"></div>
        </div>
    </section>

    <!-- ====================================
                Environment
    ===================================== -->
    <section id="environment-page" class="page">
        <div class="latest-posts">
            <div class="row g-4" id="environment_post"></div>
        </div>
    </section>

    <!-- ====================================
                Geography
    ===================================== -->
    <section id="geography-page" class="page">
        <div class="latest-posts">
            <div class="row g-4" id="geography_post"></div>
        </div>
    </section>

    <!-- ====================================
                Sports
    ===================================== -->
    <section id="sports-page" class="page">
        <div class="latest-posts">
            <div class="row g-4" id="sports_post"></div>
        </div>
    </section>

</section>

<!-- ====================================================
     About Us
===================================================== -->
<section id="about-page" class="page">
    <div class="my-4 text-justify static-page-container">
        <h1>About Us</h1>
        <?php include'StaticPage/about_us.php';?>
    </div>
</section>

<!-- ====================================================
     Contact Us
===================================================== -->
<section id="contact-page" class="page">
    <div class="my-4 text-justify static-page-container">
        <h1>Contact Us</h1>
        <?php include 'StaticPage/contact_us.php';?>
    </div>
</section>

<!-- ====================================================
     Terms & Conditions
===================================================== -->
<section id="term-conditions-page" class="page">
    <div class="my-4 text-justify static-page-container">
        <h1>Terms & Conditions</h1>
        <?php include 'StaticPage/t_c.php';?>
    </div>
</section>

<!-- ====================================================
     Privacy Policy
===================================================== -->
<section id="privacy-policy-page" class="page">
    <div class="my-4 text-justify static-page-container">
        <h1>Privacy Policy</h1>
        <?php include 'StaticPage/privacy_policy.php';?>
    </div>
</section>

<!-- ====================================================
     Profile
===================================================== -->
<section id="profile-page" class="page">
    <div class="my-4 profile-container">
        
        <div class="profile-header">
            <h2>Profile</h2>
        </div>

        <!-- Profile Photo -->
        <div class="property-group profile-image">
            <span>Profile Photo</span>

            <div class="profile-img">
                <img src="BACK-END/UPLOADS/PROFILE/default_profile.png" alt="Profile Photo">
            </div>
        </div>

        <!-- Full Name -->
        <div class="property-group">
            <span>Full Name</span>
            <p id="full_name"></p>
        </div>

        <!-- Bio -->
        <div class="property-group">
            <span>Bio</span>
            <p class="large-text" id="bio"></p>
        </div>

        <!-- Date of Birth -->
        <div class="property-group">
            <span>Date of Birth</span>
            <p id="dob"></p>
        </div>

        <div class="property-group">
            <span>Gender</span>
            <p id="gender"></p>
        </div>

        <!-- City -->
        <div class="property-group">
            <span>City</span>
            <p id="city"></p>
        </div>

        <!-- State -->
        <div class="property-group">
            <span>State</span>
            <p id="state"></p>
        </div>

        <!-- Country -->
        <div class="property-group">
            <span>Country</span>
            <p id="country"></p>
        </div>

        <!-- Preferred Language -->
        <div class="property-group">
            <span>Preferred Language</span>
            <p id="preferred_language"></p>
        </div>

        <!-- Interests -->
        <div class="property-group">
            <span>Interests</span>
            <p class="large-text" id="interests"></p>
        </div>

    </div>
</section>

<!-- ====================================================
     dashboard
===================================================== -->
<section id="dashboard-page" class="page">
    <div class="dashboard-wrapper">

        <!-- ======================
        STATS CARDS
        ======================= -->

        <div class="row g-4">

            <!-- Total Posts -->

            <div class="col-lg-4 col-md-6">
                <div class="stats-card blue-card">
                    <div>
                        <span>Total Posts</span>
                        <h2 id="total_posts"></h2>
                    </div>

                    <div class="stats-icon">
                        <i class="fa-regular fa-newspaper"></i>
                    </div>

                </div>
            </div>

            <!-- Total Views -->

            <div class="col-lg-4 col-md-6">
                <div class="stats-card green-card">
                    <div>
                        <span>Total Views</span>
                        <h2 id="total_views"></h2>
                    </div>

                    <div class="stats-icon">
                        <i class="fa-regular fa-eye"></i>
                    </div>
                </div>
            </div>

            <!-- Earnings -->

            <div class="col-lg-4 col-md-12">
                <div class="stats-card orange-card">
                    <div>
                        <span>Earnings</span>
                        <h2 id="earning"></h2>
                    </div>

                    <div class="stats-icon">
                        <i class="fa-solid fa-indian-rupee-sign"></i>
                    </div>
                </div>
            </div>

        </div>

        <!-- ======================
        TOP ACTION BAR
        ======================= -->

        <div class="dashboard-action">

            <div>

                <h3 class="dashboard-title">
                    My Posts
                </h3>

                <p class="dashboard-subtitle">
                    Manage your published articles easily.
                </p>

            </div>

            <button class="create-post-btn">
                <i class="fa-solid fa-plus"></i>
                Create New Post
            </button>

        </div>

        <!-- ======================
        POSTS START
        ======================= -->

            <div class="posts-wrapper">            
            </div>
    </div>
</section>

<!-- ====================================================
     Notification
===================================================== -->
<section id="notification-page" class="page">
    <div class="notification-container">

        <div class="withdraw-header">
            <h2>Notifications</h2>
            <p>Stay updated with the latest announcements and account activities.</p>
        </div>

        <!-- Notification List -->

        <div class="notification-list"></div>

    </div>

</section>

<!-- ====================================================
     Profile-Form
===================================================== -->
<section id="profile-form-page" class="page">
    <div class="my-4 profile-container">
        
        <div class="profile-header">
            <h2>Profile</h2>
        </div>

       <!-- Profile Photo -->
        <div class="form-group profile-image">
            <label for="profileImage">Profile Photo</label>

            <div class="profile-upload">
                <img src="" alt="Profile Photo" id="previewImage">

                <input
                    type="file"
                    id="profileImage"
                    name="profile_image"
                    accept="image/*">
            </div>
        </div>

        <!-- Full Name -->
        <div class="form-group">
            <label for="fullName">Full Name</label>

            <input
                type="text"
                id="admin-fullName"
                placeholder="Enter your full name">
        </div>

        <!-- Bio -->
        <div class="form-group">
            <label for="bio">Bio</label>

            <textarea
                id="admin-bio"
                rows="4"
                placeholder="Tell something about yourself..."></textarea>
        </div>

        <!-- Date of Birth -->
        <div class="form-group">
            <label for="dob">Date of Birth</label>

            <input
                type="date"
                id="admin-dob"
                name="dob">
        </div>

        <!-- Gender -->

        <div class="form-group">
            <label for="gender">Gender</label>

            <select id="admin-gender" name="gender">
                <option value="">Select Gender</option>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
                <option value="Other">Other</option>
                <option value="Prefer not to say">Prefer not to say</option>
            </select>
        </div>

        <!-- City -->
        <div class="form-group">
            <label for="city">City</label>

            <input
                type="text"
                id="admin-city"
                value=""
                placeholder="Enter city">
        </div>


        <!-- State -->
        <div class="form-group">
            <label for="state">State</label>

            <input
                type="text"
                id="admin-state"
                value=""
                placeholder="Enter state">
        </div>

        <!-- Country -->
        <div class="form-group">
            <label for="country">Country</label>

            <input
                type="text"
                id="admin-country"
                value=""
                placeholder="Enter country">
        </div>

        <!-- Preferred Language -->
        <div class="form-group">
            <label for="language">Preferred Language</label>

            <input
                type="text"
                id="admin-language"
                value=""
                placeholder="e.g. English, Hindi, Gujarati">
        </div>

        <!-- Interests -->
        <div class="form-group">
            <label for="interests">Interests</label>

            <textarea
                id="admin-interests"
                rows="3"
                value=""
                placeholder="e.g. Technology, AI, Cricket, Finance, Travel"></textarea>
        </div>

        <!-- Save Button -->
        <div class="form-group">
            <button type="button" class="save-profile-btn" id="save-profile-btn">
                Save Changes
            </button>
        </div>

        <p class="profile-note">
            All fields are optional. Only the information you provide will be saved to your profile. You can update or remove it anytime.
        </p>

    </div>
</section>

<!-- ===========================================
Support CONTENT
=========================================== -->
<section id="support-page" class="page">
    
    <div class="support-container">

        <div>
            <h2>Support Center</h2>
            <p>Need help? Submit your request and our support team will review it.</p>
        </div>

        <div class="form-group">

            <label>Subject</label>

            <input
                type="text"
                id="subject"
                placeholder="Enter subject"
                maxlength="100"
                required>

        </div>

        <div class="form-group">

            <label>Description</label>

            <textarea
                id="description"
                rows="7"
                placeholder="Describe your issue..."
                maxlength="1000"
                required></textarea>

        </div>

        <button type="button" class="support-btn">
            <i class="fa-solid fa-paper-plane"></i>
            Submit Request
        </button>

    </div>

</section>

<!-- ===========================================
WITHDRAW CONTENT
=========================================== -->
<section id="withdraw-page" class="page">

    <div class="withdraw-container">

        <!-- Heading -->
        <div class="withdraw-header">
            <h2>Withdraw Earnings</h2>
            <p>Withdraw your available earnings securely.</p>
        </div>

        <!--==================================
                Earnings Summary
        ===================================-->

        <div class="earning-cards">

            <div class="earning-card">
                <h5>Total Earnings</h5>
                <h2 id="withdraw_page_earning"></h2>
            </div>

            <div class="earning-card">
                <h5>Available Balance</h5>
                <h2 id="available"></h2>
            </div>

            <div class="earning-card">
                <h5>Pending Earnings</h5>
                <h2 id="pending"></h2>
            </div>

            <div class="earning-card">
                <h5>Withdrawn</h5>
                <h2 id="paid"></h2>
            </div>

        </div>  

        <!--==================================
                Withdraw Form
        ===================================-->

        <form id="withdrawForm">

            <div class="withdraw-box">

                <h3>Payment Method</h3>

                <div class="payment-method">

                    <label>

                        <input
                            type="radio"
                            name="payment_method"
                            value="upi"
                            checked>

                        UPI

                    </label>

                    <label>

                        <input
                            type="radio"
                            name="payment_method"
                            value="bank">

                        Bank Account

                    </label>

                </div>

            </div>

            <!--==============================
                    UPI DETAILS
            ==============================-->

            <div class="withdraw-box" id="upiBox">

                <h3>UPI Details</h3>

                <div class="form-group">

                    <label>UPI ID</label>

                    <input
                        type="text"
                        id="upiId"
                        placeholder="example@upi">

                </div>

            </div>

            <!--==============================
                    BANK DETAILS
            ==============================-->

            <div class="withdraw-box" id="bankBox">

                <h3>Bank Details</h3>

                <div class="form-group">

                    <label>Account Holder Name</label>

                    <input
                        type="text"
                        id="accountName"
                        placeholder="Account Holder Name">

                </div>

                <div class="form-group">

                    <label>Bank Name</label>

                    <input
                        type="text"
                        id="bankName"
                        placeholder="Bank Name">

                </div>

                <div class="form-group">

                    <label>Account Number</label>

                    <input
                        type="text"
                        id="accountNumber"
                        placeholder="Account Number">

                </div>

                <div class="form-group">

                    <label>IFSC Code</label>

                    <input
                        type="text"
                        id="ifscCode"
                        placeholder="IFSC Code">

                </div>

            </div>

            <!--==============================
                Withdraw Amount
            ==============================-->

            <div class="withdraw-box">

                <h3>Withdraw Amount</h3>

                <div class="form-group">

                    <label>Amount (₹)</label>

                    <input
                        type="number"
                        id="withdrawAmount"
                        placeholder="Enter Amount">

                </div>

                <div class="withdraw-info">

                    <p></p>

                    <p><strong>Minimum Withdraw:</strong> ₹500</p>

                </div>

            </div>

            <!-- Button -->

            <button type="button" class="withdraw-btn">
                Request Withdrawal
            </button>

        </form>

        <!--==================================
            Withdrawal History
        ===================================-->

        <div class="withdraw-history">

            <h3>Withdrawal History</h3>

            <table>
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Amount</th>
                        <th>Method</th>
                        <th>Status</th>
                    </tr>
                </thead>

                <tbody id="withdraw-history-body">
                </tbody>
            </table>

        </div>

    </div>

</section>

<!-- ====================================================
     comments
===================================================== -->
<section id="comments-page" class="page">
    <div class="my-4 text-justify static-page-container">
        
        <!-- ================================
                HEADER
        ================================= -->

        <div class="comments-header">

            <h3>Comments</h3>

            <span class="comment-count"></span>

        </div>


        <!-- ================================
                COMMENT LIST
        ================================= -->

        <div class="comments-list"></div>

    </div>
</section>

<!-- ====================================================
        Posts
===================================================== -->
<section id="posts-page" class="page">
   
    <div class="posts-page">

        <!-- Header -->
        <div class="posts-header">

            <div>
                <h2>
                    <i class="fa-solid fa-layer-group"></i>
                    Posts
                </h2>

                <p> 
                    Manage all published posts
                </p>
            </div>

            <div class="posts-total">
                <i class="fa-solid fa-file-lines"></i>
                <span></span>
            </div>

        </div>


        <!-- =================================
                POSTS TABLE
        ================================= -->

        <div class="posts-table-card">

            <div class="table-responsive">

                <table class="posts-table">

                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Post</th>
                            <th>Category</th>
                            <th>Email</th>
                            <th>Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>


                    <tbody id="posts-table-records"></tbody>

                </table>

            </div>

        </div>

    </div>

</section>

<!-- ====================================================
    Users
===================================================== -->
<section id="users-page" class="page">

    <div class="users-container">

        <div class="users-header">
            <div>
                <h2>Users</h2>
                <p>Manage all registered users</p>
            </div>

            <div class="users-count">
                <i class="fa-solid fa-users"></i>
                <span id="totalUsers"></span> Users
            </div>
        </div>


        <div class="users-table-wrapper">

            <table class="users-table">

                <thead>
                    <tr>
                        <th>#</th>
                        <th>User</th>
                        <th>Joined On</th>
                        <th>DOB</th>
                        <th>Gender</th>
                        <th>City</th>
                        <th>Country</th>
                        <th>Total Posts</th>
                        <th>Total View</th>
                    </tr>
                </thead>

                <tbody id="usersTableBody"></tbody>

            </table>

        </div>

    </div>
</section>

<!-- ====================================================
        Withdrawals
===================================================== -->
<section id="withdrawals-page" class="page">
    
    <div class="withdrawals-page">
        <!-- Page Header -->
        <div class="withdrawals-header">

            <div>
                <h2>
                    <i class="fa-solid fa-wallet"></i>
                    Withdrawals
                </h2>

                <p>
                    Manage user withdrawal requests
                </p>
            </div>

        </div>


        <!-- =================================
                UPI WITHDRAWALS
        ================================= -->

        <div class="withdraw-section">

            <div class="withdraw-section-header">

                <div class="withdraw-title">
                    <div class="withdraw-icon upi-icon">
                        <i class="fa-solid fa-mobile-screen-button"></i>
                    </div>

                    <div>
                        <h3>UPI Withdrawals</h3>
                        <p>Withdrawal requests made through UPI</p>
                    </div>
                </div>

                <span class="withdraw-count" id="upi_withdraw_count"></span>

            </div>


            <div class="withdraw-table-card">

                <div class="table-responsive">

                    <table class="withdraw-table" id="upi_record_table">

                        <thead>
                            <tr>
                                <th>#</th>
                                <th>User</th>
                                <th>UPI ID</th>
                                <th>Amount</th>
                                <th>Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>


                        <tbody id="upi_withdraw_record"></tbody>

                    </table>

                </div>

            </div>

        </div>



        <!-- =================================
                BANK WITHDRAWALS
        ================================= -->

        <div class="withdraw-section">

            <div class="withdraw-section-header">

                <div class="withdraw-title">

                    <div class="withdraw-icon bank-icon">
                        <i class="fa-solid fa-building-columns"></i>
                    </div>

                    <div>
                        <h3>Bank Account Withdrawals</h3>
                        <p>Withdrawal requests made through bank account</p>
                    </div>

                </div>

                <span class="withdraw-count" id="bank_withdraw_count"></span>

            </div>


            <div class="withdraw-table-card">

                <div class="table-responsive">

                    <table class="withdraw-table bank-table" id="bank_record_table">

                        <thead>
                            <tr>
                                <th>#</th>
                                <th>User</th>
                                <th>Account Holder</th>
                                <th>Bank Details</th>
                                <th>Amount</th>
                                <th>Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>


                        <tbody id="bank_withdraw_record"></tbody>

                    </table>

                </div>

            </div>

        </div>
    
    </div>
    
</section>

<!-- ====================================================
        Help Center
===================================================== -->
<section id="help_center-page" class="page">

    <!-- HELP CENTER  -->
    
    <div class="help-center">

        <!-- Header -->
        <div class="help-header">

            <div class="help-header-content">
                <h2>
                    <i class="fa-solid fa-circle-question"></i>
                    Help Center
                </h2>

                <p>
                    Manage and respond to user help requests
                </p>
            </div>

            <div class="help-total">
                <i class="fa-solid fa-inbox"></i>
                <span></span>
            </div>

        </div>


        <!-- ================================
                REQUEST TABLE
        ================================= -->

        <div class="help-table-card">

            <div class="table-responsive">

                <table class="help-table">

                    <thead>
                        <tr>
                            <th>#</th>
                            <th>User</th>
                            <th>Subject</th>
                            <th>Description</th>
                            <th>Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody id="help-table-record"></tbody>

                </table>

            </div>

        </div>

    </div>

</section>

<!-- =========================
SCROLL TO TOP BUTTON
========================= -->

<button class="scroll-top">

    <i class="fa-solid fa-chevron-up"></i>

</button>

</div>
<!-- END MAIN CONTENT -->


<!--  Custom Dialog Box  -->
<?php include'dialog.php';?>

<!-- =========================
BOOTSTRAP JS
========================= -->

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<script src="js/security.js"></script>
<script src="js/dialog.js"></script>
<script src="js/support_center.js"></script>
<script src="js/profile1.js"></script>
<script src="js/notification.js"></script>
<script src="js/category.js"></script>
<script src="js/delete_post.js"></script>
<script src="js/home.js"></script>
<script src="js/fetch_comments.js"></script>
<script src="js/dashboard.js"></script>
<script src="js/withdraw.js"></script>
<script src="js/search.js"></script>
<script src="js/posts.js"></script>
<script src="js/users1.js"></script>
<script src="js/withdrawal.js"></script>
<script src="js/help_center.js"></script>

</body>
</html>