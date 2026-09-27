$(document).ready(function () {
    
    /*=====================================
            Format of Date       
    =====================================*/
    function formatDate(dateString) {

        let date = new Date(dateString.replace(" ", "T"));

        let options = {
            day: "2-digit",
            month: "long",
            year: "numeric"
        };

        return date.toLocaleDateString("en-GB", options);
    }

    /*=====================================
            Format Views 
    =====================================*/
    
    function formatNumber(number){

        number = Number(number);

        if(number >= 1000000000){
            return (number / 1000000000).toFixed(1).replace(".0","") + "B";
        }

        if(number >= 1000000){
            return (number / 1000000).toFixed(1).replace(".0","") + "M";
        }

        if(number >= 1000){
            return (number / 1000).toFixed(1).replace(".0","") + "K";
        }

        return number.toString();
    }
    
    /*============================================================
                Category_Posts API
    ============================================================*/

    function category_post_api(category){    
        
        let output = "";

        $.ajax({
            url: "http://localhost/smartbook/API/post_list_home.php",
            type: "POST",
            contentType: "application/json; charset=utf-8",

            data: JSON.stringify({
                category 
            }),

            dataType: "json",

            success: function (obj) {
        
                $.each(obj, function (index, value) {

                    output += `
                        
                        <div class="col-md-6 col-xl-3 content_post" data-id="${value.id}">
                            <div class="card post-card">
                                <img src="${value.cover_image}" alt="">

                                <div class="card-body">

                                    <span class="post-category">
                                        ${value.category}
                                    </span>

                                    <h5>
                                        ${value.title}
                                    </h5>

                                    <p>
                                        ${value.meta_description}
                                    </p>

                                    <div class="post-meta">

                                        <span>
                                            <i class="fa-regular fa-calendar"></i>
                                            ${formatDate(value.created_at)}
                                        </span>

                                        <span>
                                            <i class="fa-regular fa-eye"></i>
                                            ${formatNumber(value.view)}
                                        </span>

                                    </div>
                                </div>
                            </div>
                        </div> 
                    `;

                });

                $('#'+category+'_post').html(output);
            }
        });

    }

    /* =========================
     Category Menu
    ==========================*/
    category_post_api('all');
    
    $('.category-nav a').click(function (e) {

        e.preventDefault();

        $('.category-nav a').removeClass('active');
        $(this).addClass('active');

        let page = $(this).data('page');

        // Only category pages hide/show
        $('#home-page .page').removeClass('active-page');

        $('#' + page + '-page').addClass('active-page');

        category_post_api(page);

    });

});