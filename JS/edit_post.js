$(document).ready(function () {

    /* =====================================================
       Fetch POST Data
    ===================================================== */

    if (sessionStorage.getItem("id")) {

        let id = sessionStorage.getItem("id");
        
        $.ajax({
            url: "http://localhost/smartbook/API/fetch_post_dashboard.php",
            type: "POST",
            contentType: "application/json; charset=utf-8",

            data: JSON.stringify({
                id: id
            }),

            dataType: "json",

            success: function (data) {

                $("#postTitle").val(data[0].title);

                $("#editor").html(data[0].content);

                $("#coverPreview").attr("src", data[0].cover_image);

                $("#postCategory").val(data[0].category);

                $("#metaDescription").val(data[0].meta_description);
            }
        });

        /* =====================================================
                    PUBLISH POST
        ===================================================== */

        $(".publish-btn").click(function () {
            
            let title = $(".title-input").val();

            let content = $("#editor").html();

            let coverImage = $("#coverPreview").attr("src");

            let category = $("#postCategory").val();

            let metaDescription = $("#metaDescription").val();

            /* =========================
               VALIDATION
            ========================= */

            if (title.trim() === "") {
                showAlert("Error", "Please enter title.");
                return;
            }

            if (content.trim() === "") {
                showAlert("Error", "Please enter content.");
                return;
            }

            if (category === "") {

                showAlert("Error", "Please select category.");

                $("#postSettingsBtn").click();

                return;
            }

            /* ====================================
               Post Save in Database API
            ==================================== */

            $.ajax({

                url: "http://localhost/Smartbook/API/edit_post.php",

                type: "POST",

                contentType: "application/json; charset=utf-8",

                data: JSON.stringify({

                    id: sessionStorage.getItem("id"),

                    title: title,

                    content: content,

                    cover_image: coverImage,

                    category: category,

                    meta_description: metaDescription
                }),

                dataType: "json",


                beforeSend: function () {

                    $(".publish-btn").html(
                        '<i class="bi bi-hourglass-split"></i> Publishing...'
                    );

                },

                success: function (response) {

                    showAlert("Success", response.msg)
                        .then(function () {

                            $(".title-input").val("");

                            $("#editor").html("");

                            $("#postCategory").val("");

                            $("#metaDescription").val("");

                            $("#coverPreview").attr(
                                "src",
                                "BACK-END/UPLOADS/COVERS/default_cover.png"
                            );

                            sessionStorage.removeItem("id");

                            window.location.href = "home.php";
                        });


                    $(".publish-btn").html(
                        '<i class="bi bi-cloud-upload"></i> Publish'
                    );

                }

            });

        });
    }

});