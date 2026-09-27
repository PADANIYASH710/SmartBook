$(document).ready(function(){

    /*=====================================
            Time Management
    =====================================*/

    function timeAgo(dateTime) {

        const now = new Date();
        const past = new Date(dateTime.replace(" ", "T"));

        const seconds = Math.floor((now - past) / 1000);

        if (seconds < 60) {
            return "Just now";
        }

        const minutes = Math.floor(seconds / 60);

        if (minutes < 60) {
            return `${minutes} min ago`;
        }

        const hours = Math.floor(minutes / 60);

        if (hours < 24) {
            return `${hours} hour${hours > 1 ? "s" : ""} ago`;
        }

        const days = Math.floor(hours / 24);

        if (days === 1) {
            return "Yesterday";
        }

        if (days < 7) {
            return `${days} days ago`;
        }

        return past.toLocaleDateString("en-GB", {
            day: "2-digit",
            month: "short",
            year: "numeric"
        });
    }

    /*=====================================
            Comments Section
    =====================================*/

    $(document).on('click', '.comments-btn', function(e){
        
        e.preventDefault();

        let page = $(this).data('page');

        $('.sidebar-menu a').removeClass('active'); 

        $('.main-content > .page').removeClass('active-page');

        $('#' + page + '-page').addClass('active-page');


        let id = $(this).data('id');

        /*      Fetch Comments       */

        $.ajax({

                url: "http://localhost/smartbook/API/fetch_comments.php",
                    
                type: "POST",
                
                contentType: "application/json; charset=utf-8",

                data: JSON.stringify({
                    
                    post_id : id
                    
                }),

                dataType: "json",
                
                success: function(data) {

                    let output = "";
                    let comment_count = 0;

                    $.each(data, function (index, value){

                        comment_count += 1;

                        let comment_unread_dot = value.unread == "true"
                        ? '<span class="comment-unread-dot"></span>'
                        : '';

                        output += `<div class="comment-item">

                                    <img src="${value.profile}" class="comment-avatar">

                                    <div class="comment-content">

                                        <div class="comment-top">

                                            <strong>${value.name}</strong>

                                            ${comment_unread_dot}

                                            <span class="comment-date">
                                                ${timeAgo(value.created_at)}
                                            </span>

                                        </div>

                                        <p>${value.comment}</p>

                                    </div>

                                </div>`;

                    });

                    $(".comment-count").html(comment_count);
                    $(".comments-list").html(output);

                }
                    
            });

    });


});
