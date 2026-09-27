/*=========================================
        WITHDRAW PAGE
=========================================*/

$(document).ready(function(){

    let availableBalance = 0; 

    /*=========================================
    Withdrawal History
    =========================================*/

    function withdraw_history(){

        $.ajax({
                        
            url: "http://localhost/smartbook/API/withdraw_history.php",

            type: "POST",

            contentType: "application/json; charset=utf-8",

            data: JSON.stringify({
                email : localStorage.getItem("email"),
            }),

            dataType: "json",

            success:function(data){
                    
                if(data.length == 0){

                    $("#withdraw_page_earning").html("₹" + Number(sessionStorage.getItem("total_earnings")).toLocaleString());
                    $("#available").html("₹" + Number(sessionStorage.getItem("total_earnings")).toLocaleString());
                    $("#pending").html("₹ 0");
                    $("#paid").html("₹ 0");

                    $(".withdraw-history").hide();
                    return;
                }

                $(".withdraw-history").show();

                let rows = "";
                let pending = 0;
                let paid = 0;


                $.each(data, function(index, item){

                    let statusClass = "";

                    if(item.status == "Pending"){

                        pending +=  parseInt(item.amount);
                        statusClass = "pending";
                    }
                    
                    if(item.status == "Paid"){
                    
                        paid +=  parseInt(item.amount);
                        statusClass = "paid";
                    }
                    
                    if(item.status == "Rejected"){
                        statusClass = "rejected";
                    }

                    rows += `
                        <tr> 
                            <td>${formatDate(item.created_at)}</td>
                            <td>₹${Number(item.amount).toLocaleString()}</td>
                            <td>${item.method}</td>
                            <td>
                                <span class="status ${statusClass}">
                                    ${item.status}
                                </span>
                            </td>
                        </tr>
                    `;
                });

                availableBalance = Number(sessionStorage.getItem("total_earnings")) - paid - pending;
                
                $("#withdraw_page_earning").html("₹" + Number(sessionStorage.getItem("total_earnings")).toLocaleString());
                $("#available").html("₹" + Number(sessionStorage.getItem("total_earnings") - paid - pending).toLocaleString());
                $("#pending").html("₹" + Number(pending).toLocaleString());
                $("#paid").html("₹" + Number(paid).toLocaleString());

                $("#withdraw-history-body").html(rows);
                
            }
        });

    } 
    
    withdraw_history();

    /*=========================
        Payment Method Toggle
    =========================*/
    
    $('input[name="payment_method"]').change(function () {

        let method = $(this).val();

        if (method === "upi") {

            $("#upiBox").slideDown(250);

            $("#bankBox").slideUp(250);

        } else {

            $("#bankBox").slideDown(250);

            $("#upiBox").slideUp(250);

        }

    });

    /*=========================
        Withdraw Form
    =========================*/

    $(".withdraw-btn").click(function (e) {

        e.preventDefault();

        let method = $('input[name="payment_method"]:checked').val();

        let amount = parseFloat($("#withdrawAmount").val());

        let minimumWithdraw = 500;

        /*=====================
            Amount Validation
        =====================*/

        if (isNaN(amount)) {

            showAlert("Warning","Please enter withdrawal amount.");
            return;

        }

        if (amount < minimumWithdraw) {

            showAlert("Minimum Withdraw","Minimum withdrawal amount is ₹500.");
            return;

        }

        if (amount > availableBalance) {

            showAlert("Insufficient Balance","You don't have enough balance.");
            return;
        }

        /*=====================
            UPI Validation
        =====================*/

        if (method == "upi") {

            let upi = $("#upiId").val().trim();

            if (upi == "") {

                showAlert("UPI Required","Please enter your UPI ID.");

                return;

            }

        }

        /*=====================
            Bank Validation
        =====================*/

        if (method == "bank") {

            let holder = $("#accountName").val().trim();

            let bank = $("#bankName").val().trim();

            let account = $("#accountNumber").val().trim();

            let ifsc = $("#ifscCode").val().trim();


            if (
                holder == "" ||
                bank == "" ||
                account == "" ||
                ifsc == ""
            ) {

                showAlert("Missing Details","Please fill all bank details.");
                return;
            }

        }

        /*   Format of Date   */
        function formatDate(dateString){

            const months = [
                "JAN","FEB","MAR","APR","MAY","JUN",
                "JUL","AUG","SEP","OCT","NOV","DEC"
            ];

            const date = new Date(dateString);

            const day = String(date.getDate()).padStart(2, "0");
            const month = months[date.getMonth()];
            const year = date.getFullYear();

            return `${day} ${month} ${year}`;
        }

        /*=====================
            Confirmation
        =====================*/

        showConfirm("Confirm Withdrawal", "Are you sure you want to withdraw ₹" + amount + " ?")
        .then(function(val){
            if(val){
                    
                $.ajax({
                    
                    url: "http://localhost/smartbook/API/withdraw_request.php",

                    type: "POST",

                    contentType: "application/json; charset=utf-8",

                    data: JSON.stringify({
                        email : localStorage.getItem("email"),
                        method:method,
                        upi_id:$("#upiId").val(),
                        account_holder:$("#accountName").val(),
                        bank_name:$("#bankName").val(),
                        account_number:$("#accountNumber").val(),
                        ifsc:$("#ifscCode").val(),
                        amount:amount 
                    }),

                    dataType: "json",

                    success:function(data){
                
                        showAlert("Success", "Withdrawal request submitted successfully.")
                        .then(function () {

                                withdraw_history();

                                $('html, body').animate({
                                    scrollTop: $('.withdraw-history').offset().top  - 88
                                }, 500);

                                //   Reset Form Value
                                $("#upiId").val("");
                                $("#accountName").val("");
                                $("#bankName").val("");
                                $("#accountNumber").val("");
                                $("#ifscCode").val("");
                                $("#withdrawAmount").val("");

                        });
                    }

                });

            }

        });

    });

    
});