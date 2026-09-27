$(document).ready(function () {

    if(!sessionStorage.getItem("id")){
        window.location.href = "home.php";
    }

    let id = sessionStorage.getItem("id");
    let post_type = sessionStorage.getItem("post_type");

    sessionStorage.removeItem("id");
    sessionStorage.removeItem("post_type");

    if(post_type == "dashboard"){
    
        $(".col-lg-8").addClass("mx-auto mb-5");
        $(".col-lg-4").addClass("d-none");
        $(".comment-card").addClass("d-none");
    }

    /*      Format of Date       */
    function formatDate(dateString) {

        let date = new Date(dateString.replace(" ", "T"));

        let options = {
            day: "2-digit",
            month: "long",
            year: "numeric"
        };

        return date.toLocaleDateString("en-GB", options);
    }

    /*===========================================
            Single Post
    ===========================================*/

    $.ajax({
        url: "http://localhost/smartbook/API/post_template.php",
        type: "POST",

        contentType: "application/json; charset=utf-8",

        data: JSON.stringify({
            id: id,
            post_type : post_type
        }),

        dataType: "json",

        success: function (data) {

           $(".hero-image").attr("src",data[0].cover_image);
           $(".hero-content h1").html(data[0].title);
           $(".hero-content p").html(data[0].meta_description);
           $(".post-date").append("Published On : " + formatDate(data[0].created_at));
           $(".post-card").append(data[0].content);

        }
    });

    /*===========================================
            Add Comments
    ===========================================*/

        $(".comment-btn").click(function(){

            $.ajax({

                    url: "http://localhost/smartbook/API/add_comments.php",
                        
                    type: "POST",
                    
                    contentType: "application/json; charset=utf-8",

                    data: JSON.stringify({
                        
                        comment : $("#comment").val(),
                        email : localStorage.getItem("email"),
                        post_id : id
                        
                    }),

                    dataType: "json",
                    
                    success: function(data) {
                        
                        showAlert("Success",data.msg)
                        .then(function () {
                                $("#comment").val("");
                            }
                        );

                    }
                        
            });

    });

});