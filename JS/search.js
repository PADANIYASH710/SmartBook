$(document).ready(function(){

    /*=========================
        Search Filter of Site
    =========================*/

    $('.search-box input').on('keyup', function () {

        let value = $(this).val().toLowerCase().trim();

        $('.post-card').each(function () {

            let text = $(this).text().toLowerCase();

            if (text.includes(value)) {
                $(this).parent().show();
            } else {
                $(this).parent().hide();
            }

        });

    });

    /*=========================
        Search Filter of Dashboard
    =========================*/

    $('.search-box input').on('keyup', function () {

        let value = $(this).val().toLowerCase().trim();

        $('.admin-post-card').each(function () {

            let text = $(this).text().toLowerCase();

            if (text.includes(value)) {
                $(this).show();
            } else {
                $(this).hide();
            }

        });

    });

});    