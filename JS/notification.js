/*=========================================
    NOTIFICATIONS
=========================================*/

    /*    Time Management     */

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

    $(".notification span").hide();

    $.ajax({

        url: "http://localhost/smartbook/API/notification.php",
            
        type: "POST",
        
        contentType: "application/json; charset=utf-8",

        data: JSON.stringify({
            email : localStorage.getItem("email"),
            notification : true
        }),

        dataType: "json",
        
        success: function(data) {
    
            let rows = "";

            let unreadMessage = 0;

            $.each(data, function(index, item){
                
                if(item.unread === 'true'){
                    unreadMessage += 1;
                }

                rows += `
                        <div class="notification-card ${item.unread == 'true' && "unread"}">

                            <div class="notification-icon">
                                <i class="${item.icon}"></i>
                            </div>

                            <div class="notification-content">
                                <div class="notification-top">
                                    <h4>${item.title}</h4>
                                    <span class="notification-time">${timeAgo(item.created_at)}</span>
                                </div>

                                <p>${item.description}</p>

                            </div>

                            ${item.unread == 'true' ? "<span class='unread-dot'></span>" : ""}

                        </div>    
                    `;
            });

            $(".notification-list").html(rows);

            /*      Unread Message Number       */
            
            if(unreadMessage != 0){
                $(".notification span").show().text(unreadMessage);                
            }
        }
    });

    /*      Mark As Read        */

    $(document).on("click", ".notification-card", function () {

        $(this).removeClass("unread");

        $(this).find(".unread-dot").fadeOut(200, function () {

            $(this).remove();

        });

    });

    /*        Notification Icon Click         */

    $(".notification .icon-a").click(function (e) {

        e.preventDefault();

        $(".notification span").hide();

        $.ajax({

            url: "http://localhost/smartbook/API/notification.php",
            
            type: "POST",
            
            contentType: "application/json; charset=utf-8",

            data: JSON.stringify({
                email : localStorage.getItem("email"),
                unread : true
            }),

            dataType: "json",

        });

    });