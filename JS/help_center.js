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
            url: "http://localhost/smartbook/API/help_center.php",
            type: "POST",
            contentType: "application/json; charset=utf-8",

            dataType: "json",

            success: function (data) {

                let count_record = 0;
        
                $.each(data, function (index, value) {

                    count_record += 1;

                    output += `
                        
                        <tr>

                            <td class="help-id">
                                #${count_record}
                            </td>

                            <td>
                                <div class="help-user">

                                    <div class="help-avatar">
                                        <img src="${value.image_path}" alt="Profile">
                                    </div>

                                    <div class="help-user-info">
                                        <strong>${value.name ? value.name : "Unknown Person"}</strong>
                                        <span>${value.email}</span>
                                    </div>

                                </div>
                            </td>

                            <td>
                                <div class="help-subject">
                                    ${value.subject}
                                </div>
                            </td>

                            <td>
                                <div class="help-description">
                                    ${value.description}
                                </div>
                            </td>

                            <td>
                                <div class="help-date">
                                    ${formatDateTime(value.created_at)}
                                </div>
                            </td>

                            <td>
                                <button class="solve-btn" data-id="${value.id}">
                                    <i class="fa-solid fa-circle-check"></i>
                                    Resolve
                                </button>
                            </td>

                        </tr>

                    `;

                });

                $(".help-total span").html(count_record+" Requests");

                if(count_record == 0){

                    $(".help-table-card").hide();

                }

                $('#help-table-record').html(output);
            }
        });
    }

    request();

        /*==========================================
                Resolve Button
        ==========================================*/
   
        $(document).on("click", ".solve-btn", function () {

            let id = $(this).data("id");

            $.ajax({
                url: "http://localhost/smartbook/API/solve_issue.php",
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