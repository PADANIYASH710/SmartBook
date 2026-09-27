$(document).ready(function () {

    /*===========================
            Page Refress No Menu Change
    ===========================*/

    if(sessionStorage.getItem("current_page") == "my-dashboard"){

        $(".site").addClass("d-none");
        $(".admin").removeClass("d-none");

        $(".admin a[data-page='dashboard']").addClass("active");

        $('.main-content > .page').removeClass('active-page');
        $('#dashboard-page').addClass('active-page');

    }

    if(sessionStorage.getItem("current_page") == "site"){

            $(".admin").addClass("d-none");
            $(".site").removeClass("d-none");

            $(".sidebar-menu a").removeClass("active");
            $(".site a[data-page='home']").addClass("active");

            $(".main-content > .page").removeClass("active-page");
            $("#home-page").addClass("active-page");

    }

    /*history.pushState(null, null, location.href);

    window.onpopstate = function () {
        history.go(1);
        location.href = "404.php";
    };*/
    
    /*===========================
            Explore Post
    ===========================*/
    $('#explore_post').click(function () {

        $('html, body').animate({
            scrollTop: $('#explore_post_title').offset().top  - 88
        }, 500);

    });

    /*===========================
         Scroll Top Button
    ===========================*/

    $(window).scroll(function () {

        if ($(this).scrollTop() > 300) {
            $('.scroll-top').fadeIn();
        } else {
            $('.scroll-top').fadeOut();
        }

    });

    $('.scroll-top').click(function () {

        $('html, body').animate({
            scrollTop: 0
        }, 600);

    });

    /*============================
        When User Click Any Link Then Close
         The SideMenu in Mobile Menu
    ============================*/
    $(document).on("click", "#mobileSidebar .sidebar-menu a", function () {

        const sidebar = document.getElementById("mobileSidebar");
        const offcanvas = bootstrap.Offcanvas.getInstance(sidebar);

        if (offcanvas) {
            offcanvas.hide();
        }

    });

    /*============================
         Sidebar Menu
    ============================*/

    $('.sidebar-menu a').click(function (e) {

        e.preventDefault();

        $('.sidebar-menu a').removeClass('active');
        $(this).addClass('active');

        let page = $(this).data('page');

        // Hide main pages
        $('.main-content > .page').removeClass('active-page');

        // Show selected page
        $('#' + page + '-page').addClass('active-page');

        //  Site to Admin    
        if (page === 'my-dashboard') {

            sessionStorage.setItem("current_page","my-dashboard");
            location.reload();
            
        }

        //   Admin to Site
        if (page === 'back-to-site') {

            sessionStorage.setItem("current_page","site");
            location.reload();

        }

        if(page === 'logout'){
            localStorage.clear();
            window.location.href = "index.php";
        }

    });
    
    /*===========================
         Profile
    ===========================*/

    $('.icon-a').click(function (e) {

        e.preventDefault();

        let page = $(this).data('page');

        $('.sidebar-menu a').removeClass('active'); 

        $('.main-content > .page').removeClass('active-page');

        $('#' + page + '-page').addClass('active-page');

    });

    /*============================================================
                 View Post 
    ============================================================*/

    $(document).on('click', '.content_post', function () {

        let id = $(this).data('id');
        sessionStorage.setItem("post_type","site");
        sessionStorage.setItem("id",id);
        window.location.href = "post_template.php";
    });

});