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

    
    
    function record(){

        let output_upi = "";
        let output_bank = "";

        $.ajax({
            url: "http://localhost/smartbook/API/withdrawal.php",
            type: "POST",
            contentType: "application/json; charset=utf-8",

            dataType: "json",

            success: function (data) {

                let count_upi_record = 0;
                let count_bank_record = 0;

                $.each(data, function (index, value) {

                    //   UPI Withdraw Request
                    
                    if(value.method == "upi"){


                        count_upi_record += 1;

                        output_upi += `
                            
                            <tr>

                                <td class="withdraw-id">
                                    #${count_upi_record}
                                </td>

                                <td>
                                    <div class="withdraw-user">

                                        <div class="withdraw-avatar">
                                            <img src="${value.image_path}" class="user-avatar">
                                        </div>

                                        <div class="withdraw-user-info">
                                            <strong>${value.name ? value.name : "Unknown Person"}</strong>
                                            <small>${value.email}</small>
                                        </div>

                                    </div>
                                </td>

                                <td>
                                    <span class="upi-value">
                                        ${value.upi_id}
                                    </span>
                                </td>

                                <td>
                                    <strong class="amount">
                                        ₹${Number(value.amount).toLocaleString()}
                                    </strong>
                                </td>

                                <td>
                                    <div class="withdraw-date">
                                        ${formatDateTime(value.created_at)}
                                    </div>
                                </td>

                                <td>
                                    <button class="withdraw-paid-btn" data-id="${value.id}" data-btn="Paid">
                                        <i class="fa-solid fa-indian-rupee-sign"></i>
                                        Paid    
                                    </button>

                                    <button class="withdraw-rejected-btn" data-id="${value.id}" data-btn="Rejected">
                                        <i class="fa-solid fa-circle-xmark"></i>
                                        Rejected
                                    </button>
    
                                </td>

                            </tr>`;
                    }

                    //     Bank Withdraw Request

                    if(value.method == "bank"){
                        
                        count_bank_record += 1;

                        output_bank += `
                                <tr>

                                    <td class="withdraw-id">
                                        #${count_bank_record}
                                    </td>

                                    <td>
                                        <div class="withdraw-user">

                                            <div class="withdraw-avatar">
                                                <img src="${value.image_path}" class="user-avatar">
                                            </div>

                                            <div class="withdraw-user-info">
                                                <strong>${value.name ? value.name : "Unknown Person"}</strong>
                                                <small>${value.email}</small>
                                            </div>

                                        </div>
                                    </td>

                                    <td>
                                        <span class="account-holder">
                                            ${value.account_holder}
                                        </span>
                                    </td>

                                    <td>
                                        <div class="bank-details">
                                            <strong>${value.bank_name}</strong>
                                            <span>A/C: ${value.account_number}</span>
                                            <small>IFSC: ${value.ifsc}</small>
                                        </div>
                                    </td>

                                    <td>
                                        <strong class="amount">
                                            ₹${Number(value.amount).toLocaleString()}
                                        </strong>
                                    </td>

                                    <td>
                                        <div class="withdraw-date">
                                            ${formatDateTime(value.created_at)}
                                        </div>
                                    </td>

                                    <td>
                                        <button class="withdraw-paid-btn" data-id="${value.id}" data-btn="Paid">
                                            <i class="fa-solid fa-indian-rupee-sign"></i>
                                            Paid
                                        </button>

                                        <button class="withdraw-rejected-btn" data-id="${value.id}" data-btn="Rejected">
                                            <i class="fa-solid fa-circle-xmark"></i>
                                            Rejected
                                        </button>
                                    </td>

                                </tr>
                        `;
                    }

                    
                });

                if(count_upi_record == 0){
                    $("#upi_record_table").hide();
                }

                if(count_bank_record == 0){
                    $("#bank_record_table").hide();
                }


                $("#upi_withdraw_count").html(count_upi_record + " Requests");
                $("#upi_withdraw_record").html(output_upi);

                $("#bank_withdraw_count").html(count_bank_record + " Requests");
                $("#bank_withdraw_record").html(output_bank);

            }
        
    
        });

    }

    record();

    /*=====================================
            Withdrawal Action
    =====================================*/

    $(document).on('click', '.withdraw-paid-btn , .withdraw-rejected-btn', function (e) {

        e.preventDefault();

        let id = $(this).data('id');
        let btn = $(this).data('btn');

        $.ajax({
            url: "http://localhost/smartbook/API/withdrawal_action.php",
            type: "POST",
            contentType: "application/json; charset=utf-8",

            data: JSON.stringify({
                id : id ,
                btn : btn
            }),

            dataType: "json",

            success: function (data) {
                
                showAlert("Success",data.msg)
                .then(function () {
                    record();
                });
            }
        });              

    });

});