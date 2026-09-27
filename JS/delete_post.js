$(document).ready(function(){

    /*=====================================
            Delete Post 
    =====================================*/

    $(document).on('click', '.delete-btn, .delete', function (e) {

        e.preventDefault();

        let id = $(this).data('id');

        showConfirm("Delete","Are you sure you want to delete this post?")
        .then(function (data) {
            if(!data){
                return;
            }

            $.ajax({

                url: "http://localhost/smartbook/API/delete_post.php",
                type: "POST",
                contentType: "application/json; charset=utf-8",

                data: JSON.stringify({
                    id : id
                }),

                dataType: "json",

                success: function (data) {

                    showAlert("Success",data.msg)
                            .then(function () {
                                location.reload();
                            });

                }
             
            });

        });


    });
});
