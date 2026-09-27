    /*=========================================
        SUPPORT FORM
    =========================================*/

    $(document).on('click', '.support-btn', function(e){

        e.preventDefault();

        let subject = $("#subject").val().trim();
        let description = $("#description").val().trim();

        if (subject === "") {
            showAlert("Error","Please enter subject.");
            $("#subject").focus();
            return;
        }

        if (description === "") {
            showAlert("Error","Please enter description.");
            $("#description").focus();
            return;
        }

        $.ajax({
            url: "http://localhost/smartbook/API/support_center.php",
            type: "POST",
            contentType: "application/json; charset=utf-8",

            data: JSON.stringify({
                email : localStorage.getItem("email") ,
                subject: subject,
                description: description
            }),

            dataType: "json",

            success: function (obj) {

                showAlert("Success","Request submitted successfully.")
                .then(function () {
                    location.reload(); 
                });

            }
        });

    });