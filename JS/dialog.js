    /*=================================================
      CUSTOM DIALOG   
    =================================================*/

    let dialogResolve = null;
    let dialogType = "";

    /*=========================
        Scroll Lock
    =========================*/

    function lockScreen(){
        $("body").css({
            overflow:"hidden",
            height:"100vh"
        });
    }

    function unlockScreen(){
        $("body").css({
            overflow:"",
            height:""
        });
    }

    /*=========================
        Open / Close
    =========================*/

    function openDialog(title,message){

        $(".dialog-title").html(title);
        $(".dialog-message").html(message);

        lockScreen();

        $(".dialog-overlay").css("display","flex");
    }

    function closeDialog(){

        $(".dialog-overlay").hide();

        unlockScreen();
    }

    /*=========================
            Alert
    =========================*/

    function showAlert(title,message){

        dialogType = "alert";

        $(".btn-cancel").hide();
        $(".dialog-input").hide();

        openDialog(title,message);

        return new Promise(function(resolve){

            dialogResolve = resolve;

        });
    }

    /*=========================
            Confirm
    =========================*/

    function showConfirm(title,message){

        dialogType = "confirm";

        $(".btn-cancel").show();
        $(".dialog-input").hide();

        openDialog(title,message);

        return new Promise(function(resolve){

            dialogResolve = resolve;

        });
    }

    /*=========================
            Prompt
    =========================*/

    function showPrompt(title,message,value=""){

        dialogType = "prompt";

        $(".btn-cancel").show();

        $(".dialog-input")
            .show()
            .val(value)
            .focus();

        openDialog(title,message);

        return new Promise(function(resolve){

            dialogResolve = resolve;

        });
    }

    /*=========================
            OK Button
    =========================*/

    $(".btn-ok").click(function(){

        closeDialog();

        if(dialogType === "alert"){
            dialogResolve(true);
        }

        if(dialogType === "confirm"){
            dialogResolve(true);
        }

        if(dialogType === "prompt"){
            dialogResolve($(".dialog-input").val());
        }
    });

    /*=========================
        Cancel Button
    =========================*/

    $(".btn-cancel").click(function(){

        closeDialog();

        if(dialogType === "confirm"){
            dialogResolve(false);
        }

        if(dialogType === "prompt"){
            dialogResolve(false);
        }
    });

    /*=========================
        ESC Key Close
    =========================*/

    $(document).keydown(function(e){

        if(e.key === "Escape" &&
        $(".dialog-overlay").is(":visible")){

            $(".btn-cancel").click();
        }
    });

    /*================================
            Format 
    ================================*/

    /*
    showAlert("Success","Profile saved successfully.");       or

    showAlert("Success", response)
    .then(function () {
        window.location = "admin.php";
    });

    showConfirm("Delete", "Are you sure?")
    .then(function(x){
        console.log("Value =", x);
    });

    showPrompt("Delete", "Are you sure?")
    .then(function(x){
        console.log("Value =", x);
    });

    */
