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

    function formatDate(date) {

        if(date == ""){
            return "";
        }

        const d = new Date(date);

        const day = String(d.getDate()).padStart(2, '0');

        const months = [
            "Jan", "Feb", "Mar", "Apr", "May", "Jun",
            "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"
        ];

        const month = months[d.getMonth()];
        const year = d.getFullYear();

        return `${day} ${month} ${year}`;
    }


    let output = "";

    $.ajax({
            url: "http://localhost/smartbook/API/users.php",
            type: "POST",
            contentType: "application/json; charset=utf-8",

            dataType: "json",

            success: function (data) {

                let count_records = 0;

                $.each(data, function (index, value) {
                    
                    count_records += 1;

                    output += `
                        <tr>
                            <td>#${count_records}</td>

                            <td>
                                <div class="user-info">
                                    <img src="${value.image_path}"
                                        class="user-avatar">

                                    <div>
                                        <strong>${value.name ? value.name : "Unknown Person"}</strong>
                                        <small>${value.email}</small>
                                    </div>
                                </div>
                            </td>

                            <td class="help-date">${formatDateTime(value.created_at)}</td>

                            <td>${formatDate(value.dob  || "")}</td>

                            <td>${value.gender  || ""}</td>

                            <td>${value.city  || ""}</td>

                            <td>${value.country  || ""}</td>

                            <td>${value.total_posts}</td>

                            <td>${value.total_views}</td>

                        </tr>

                    `;

                });

                $("#totalUsers").html(count_records);

                if(count_records == 0){
                    $(".users-table").hide();
                }

                $("#usersTableBody").html(output);

            }
        });

});