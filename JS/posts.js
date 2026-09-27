$(document).ready(function(){
    /*==================================
        Time Format   
    ==================================*/

    function formatDateTime(dateTime) {

        let date = new Date(dateTime.replace(" ", "T"));

        let formattedDate = date.toLocaleDateString("en-GB", {
            day: "2-digit",
            month: "short",
            year: "numeric"
        });

        let formattedTime = date.toLocaleTimeString("en-US", {
            hour: "2-digit",
            minute: "2-digit",
            hour12: true
        });

        return `
            <strong>${formattedDate}</strong>
            <span>${formattedTime}</span>
        `;
    }


    /*=====================================
            Request Record            
    =====================================*/    
    function request(){

        let output = "";

        $.ajax({
            url: "http://localhost/smartbook/API/posts.php",
            type: "POST",
            contentType: "application/json; charset=utf-8",

            dataType: "json",

            success: function (data) {

                let count_record = 0;
        
                $.each(data, function (index, value) {

                    count_record += 1;

                    output += `
                        
                        <tr>

                            <td class="post-id">
                                #${count_record}
                            </td>

                            <td>
                                <div class="post-info">

                                    <div class="post-cover">
                                        <img
                                            src="${value.cover_image}"
                                            alt="Post Cover"
                                        >
                                    </div>

                                    <div class="post-content">

                                        <strong>
                                            ${value.title}
                                        </strong>

                                    </div>

                                </div>
                            </td>


                            <td>
                                <span class="post-category hardware">
                                    ${value.category}
                                </span>
                            </td>


                            <td>
                                <div class="email">
                                    ${value.email}
                                </div>
                            </td>


                            <td>
                                <div class="post-date">
                                    ${formatDateTime(value.created_at)}
                                </div>
                            </td>


                            <td>
                                <div class="post-actions">

                                    <button
                                        class="post-action-btn view"
                                        title="View" data-id="${value.id}"
                                    >
                                        <i class="fa-solid fa-eye"></i>
                                    </button>

                                    <button
                                        class="post-action-btn edit"
                                        title="Edit" data-id="${value.id}"
                                    >
                                        <i class="fa-solid fa-pen"></i>
                                    </button>

                                    <button
                                        class="post-action-btn delete"
                                        title="Delete" data-id="${value.id}"
                                    >
                                        <i class="fa-solid fa-trash"></i>
                                    </button>

                                    <button
                                        class="post-action-btn approval"
                                        title="Approve" data-id="${value.id}"
                                    >
                                        <i class="fa-solid fa-circle-check"></i>
                                    </button>

                                </div>
                            </td>

                        </tr>
                    `;

                });

                $(".posts-total span").html(count_record+" Posts");

                if(count_record == 0){

                    $(".posts-table-card").hide();

                }

                $('#posts-table-records').html(output);
            }
        });
    }

    request();

    /*=====================================
            Approval Post 
    =====================================*/

    $(document).on('click', '.approval', function (e) {

        e.preventDefault();

        let id = $(this).data('id');

        $.ajax({
            url: "http://localhost/smartbook/API/approval.php",
            type: "POST",
            contentType: "application/json; charset=utf-8",

            data: JSON.stringify({
                id : id 
            }),

            dataType: "json",

            success: function (data) {
                
                showAlert("Success",data.msg)
                .then(function () {
                    request();
                });
            }
        });                 

    });

});