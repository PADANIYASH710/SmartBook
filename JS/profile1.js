    
    function profile_data(){
        //   Email Save in DataBase and Fetch the Profile Data

        $.ajax({
            type: "POST",
            url: "http://localhost/smartbook/api/profile.php",

            contentType: "application/json",

            data: JSON.stringify({
                email: localStorage.getItem("email")
            }),

            success: function(response){
        
                //  home.php Profile
                $(".profile img").attr("src",response[0].image_path);

                // profile 
                $(".profile-img img").attr("src",response[0].image_path);

                $("#full_name").html(response[0].name);

                $("#bio").html(response[0].bio);

                $("#dob").html(formatDate(response[0].dob || ""));

                $("#gender").html(response[0].gender);

                $("#city").html(response[0].city);
                
                $("#state").html(response[0].state);

                $("#country").html(response[0].country);

                $("#preferred_language").html(response[0].language);

                $("#interests").html(response[0].interests);

                // admin profile    

                $(".profile-upload img").attr("src",response[0].image_path);

                $("#admin-fullName").val(response[0].name);

                $("#admin-bio").val(response[0].bio);

                $("#admin-dob").val(response[0].dob);

                $("#admin-gender").val(response[0].gender);

                $("#admin-city").val(response[0].city);

                $("#admin-state").val(response[0].state);

                $("#admin-country").val(response[0].country);

                $("#admin-language").val(response[0].language);

                $("#admin-interests").val(response[0].interests);
            }
        });
    }

    profile_data();

    /*==================================
            Format of Date
    ==================================*/
    function formatDate(dateString) {

        if(dateString == ""){
            return "";
        }
        
        let date = new Date(dateString);

        let day = String(date.getDate()).padStart(2, "0");

        let month = date.toLocaleString("en-US", {
            month: "short"
        }).toUpperCase();

        let year = date.getFullYear();

        return `${day} ${month} ${year}`;
    }

    /*============================================================
                Profile API
    ============================================================*/

        /*=========================
        Profile IMAGE UPLOAD
        ========================= */
        let profilePath = null;

        $("#profileImage").change(function () {

            let file = this.files[0];

            if (!file) {
                return;
            }

            let email = localStorage.getItem("email");

            let formData = new FormData();

            formData.append("image",file);
            formData.append("email", email);

            $.ajax({

                url:"BACK-END/upload_profile.php",
                type:"POST",
                data:formData,
                processData:false,
                contentType:false,
                success:
                function (path) {

                    path =path.trim();
                    console.log(path);
                    profilePath = path;

                    $("#previewImage").attr("src", path);

                },

                error:
                function () {
                    showAlert("Error","Cover Image Upload Failed");
                }
            });

        });
    
        //   Insert Data in Database 

        $("#save-profile-btn").click(function(){

            $.ajax({
                    type: "POST",
                    url: "http://localhost/smartbook/api/upload_profile.php",

                    contentType: "application/json",

                    data: JSON.stringify({
        
                        email: localStorage.getItem("email"),
                        image_path : $("#previewImage").attr("src"),
                        fullName : $("#admin-fullName").val(),
                        bio : $("#admin-bio").val(),
                        dob : $("#admin-dob").val(),
                        gender : $("#admin-gender").val(),
                        city : $("#admin-city").val(),
                        state : $("#admin-state").val(),
                        country : $("#admin-country").val(),
                        language : $("#admin-language").val(),
                        interests : $("#admin-interests").val()
                    }),

                    dataType: "json",

                    success : function(response){
                
                        showAlert("Success","Profile saved successfully.")
                        .then(function () {
                                profile_data();
                            }
                        );
                    }
            });

        });    