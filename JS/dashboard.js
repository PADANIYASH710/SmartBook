$(document).ready(function () {

    /*=====================================
            Create Button 
    =====================================*/
    $(".create-post-btn").click(function(){
        window.location.href = "editor.php";
    });

    /*=====================================
            Edit Post 
    =====================================*/

    $(document).on('click', '.edit-btn , .edit', function (e) {

        e.preventDefault();

        sessionStorage.setItem("id",$(this).data('id'));

        window.location.href = "editor.php";

    });

    /*=====================================
            View Post 
    =====================================*/

    $(document).on('click', '.view-btn , .view', function (e) {

        e.preventDefault();

        sessionStorage.setItem("id",$(this).data('id'));

        sessionStorage.setItem("post_type","dashboard");

        window.location.href = "post_template.php";

    });

    /*=====================================
        Founder Menu
    =====================================*/

    if (localStorage.getItem("email") != "smartbook00001@gmail.com") {

        $(".founder").hide();
        
    }

    /*=====================================
            Format Date
    =====================================*/
    
    function formatDate(dateString) {

        let date = new Date(dateString);

        return date.toLocaleDateString("en-GB", {
            day: "2-digit",
            month: "short",
            year: "numeric"
        });
    }

    /*=====================================
            Format Views and Earnings
    =====================================*/
    
    function formatNumber(number){

        number = Number(number);

        if(number >= 1000000000){
            return (number / 1000000000).toFixed(1).replace(".0","") + "B";
        }

        if(number >= 1000000){
            return (number / 1000000).toFixed(1).replace(".0","") + "M";
        }

        if(number >= 1000){
            return (number / 1000).toFixed(1).replace(".0","") + "K";
        }

        return number.toString();
    }
    
    /*=====================================
            post_list_admin.php API
    =====================================*/

    let output = "";

        $.ajax({
            url: "http://localhost/smartbook/API/post_list_dashboard.php",
            type: "POST",
            contentType: "application/json; charset=utf-8",

            data: JSON.stringify({
                email : localStorage.getItem("email") 
            }),

            dataType: "json",

            success: function (obj) {

                let total_views = 0;
                let total_records = 0;

                $.each(obj, function (index, value) {
                    
                    total_views += parseInt(value.view,10);
                    total_records += 1;

                    output += `
                        <div class="admin-post-card">

                            <!-- Left Image -->

                            <div class="admin-post-image">
                                <img src="${value.cover_image}" alt="Post Image">
                            </div>

                            <!-- Right Content -->

                            <div class="admin-post-content">

                                <!-- Three Dot -->

                                <div class="admin-post-menu">

                                    <button class="admin-menu-btn">
                                        <i class="fa-solid fa-ellipsis-vertical"></i>
                                    </button>

                                    <div class="admin-menu-dropdown">

                                        <a href="#" class="view-btn" data-id="${value.id}">
                                            <i class="fa-solid fa-eye"></i>
                                            View Post
                                        </a>
                                        
                                        <a href="#" class="edit-btn" data-id="${value.id}">
                                            <i class="fa-solid fa-pen"></i>
                                            Edit Post
                                        </a>

                                        <a href="#" class="delete-btn" data-id="${value.id}">
                                            <i class="fa-solid fa-trash"></i>
                                            Delete Post
                                        </a>

                                        <a href="#" class="comments-btn" data-page="comments" data-id="${value.id}">
                                            <i class="fa-solid fa-comments"></i>
                                            Comments
                                        </a>

                                    </div>

                                </div>

                                <div class="admin-post-category-row">
                                    <!-- Category -->

                                    <span class="admin-post-category">
                                        ${value.category}
                                    </span>

                                    <!--  Approval -->

                                    ${value.approval == "true" ? `
                                        <span class="verified-badge" title="Verified">
                                            <i class="fa-solid fa-check"></i>
                                        </span>` : ""}
                                </div>
                                
                                <!-- Title -->

                                <h2 class="admin-post-title">
                                    ${value.title}            
                                </h2>

                                <!-- Description -->

                                <p class="admin-post-desc">
                                    ${value.meta_description}
                                </p>

                                <!-- Footer -->

                                <div class="admin-post-meta">

                                    <span>
                                        <i class="fa-regular fa-eye"></i>
                                        ${formatNumber(value.view)}            
                                    </span>

                                    <span>
                                        <i class="fa-regular fa-comment"></i>
                                        ${formatNumber(value.comment_count)} Comments
                                    </span>

                                    <span>
                                        <i class="fa-regular fa-clock"></i>
                                        ${formatDate(value.created_at)}
                                    </span>

                                </div>

                            </div>

                        </div>

                    `;

                });

                $("#total_posts").html(total_records);
                $("#total_views").html(formatNumber(total_views));
                $("#earning").html(formatNumber((total_views * 0.003).toFixed(2)));
                sessionStorage.setItem("total_earnings",(total_views * 0.003).toFixed(2));
                
                $(".posts-wrapper").html(output);
            }
        });

    /*========================= 
        Three Dot Menu 
    =========================*/ 

    $(document).on('click', '.admin-menu-btn', function(e){

        e.stopPropagation();

        $('.admin-menu-dropdown')
            .not($(this).siblings('.admin-menu-dropdown'))
            .slideUp(150);

        $(this)
            .siblings('.admin-menu-dropdown')
            .slideToggle(180);

    });

    // Close Menu

    $(document).on('click', function(){

        $('.admin-menu-dropdown').slideUp(150);

    });
    
});