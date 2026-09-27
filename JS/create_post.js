$(document).ready(function () {

    /* =====================================================
       GLOBAL
    ===================================================== */

    let postCategory = "";
    let postTags = "";
    let seoTitle = "";
    let metaDescription = "";

    let savedRange = null;

    /* =====================================================
       EDITOR
    ===================================================== */

    const editor = document.getElementById("editor");


    /* =====================================================
       SAVE SELECTION
    ===================================================== */

    function saveSelection() {

        const selection =
            window.getSelection();

        if (
            selection.rangeCount > 0 &&
            editor.contains(selection.anchorNode)
        ) {

            savedRange =
                selection.getRangeAt(0).cloneRange();

        }
    }


    /* =====================================================
       RESTORE SELECTION
    ===================================================== */

    function restoreSelection() {

        if (!savedRange) {
            editor.focus();
            return;
        }

        const selection =
            window.getSelection();

        selection.removeAllRanges();

        selection.addRange(
            savedRange
        );

        editor.focus();
    }


    /* =====================================================
       SELECTION TRACKING
    ===================================================== */

    $("#editor").on(
        "mouseup keyup input",
        function () {

            saveSelection();

            updateToolbarState();

        }
    );


    /* =====================================================
       TOOLTIP
    ===================================================== */

    const tooltipTriggerList =
        document.querySelectorAll(
            '[title]'
        );


    /* =====================================================
       EXECUTE COMMAND
    ===================================================== */

    function executeCommand(
        command,
        value = null
    ) {

        restoreSelection();

        document.execCommand(
            command,
            false,
            value
        );

        saveSelection();

        updateToolbarState();

        editor.focus();
    }


    /* =====================================================
       TOOLBAR COMMANDS
    ===================================================== */

    $(".toolbar button[data-cmd]").on(
        "mousedown",
        function (e) {

            e.preventDefault();

            let command =
                $(this).data("cmd");

            executeCommand(
                command
            );

        }
    );


    /* =====================================================
       FONT FAMILY
    ===================================================== */

    $("#fontFamily").on(
        "change",
        function () {

            let value =
                $(this).val();

            if (!value) {
                return;
            }

            executeCommand(
                "fontName",
                value
            );

        }
    );

    /* =====================================================
       HEADING
    ===================================================== */

    $("#heading").on(
        "change",
        function () {

            let value =
                $(this).val();

            if (!value) {
                return;
            }

            executeCommand(
                "formatBlock",
                value
            );

        }
    );


    /* =====================================================
       TEXT COLOR
    ===================================================== */

    $("#textColor").on(
        "input",
        function () {

            executeCommand(
                "foreColor",
                $(this).val()
            );

        }
    );


    /* =====================================================
       HIGHLIGHT COLOR
    ===================================================== */

    $("#highlightColor").on(
        "input",
        function () {

            restoreSelection();

            let color =
                $(this).val();

            try {

                document.execCommand(
                    "hiliteColor",
                    false,
                    color
                );

            } catch (error) {

                document.execCommand(
                    "backColor",
                    false,
                    color
                );

            }

            saveSelection();

            editor.focus();

        }
    );

    /* =====================================================
       LINK
    ===================================================== */

    $("#addLink").on(
        "click",
        function () {

            saveSelection();
        
            showPrompt("Add Link", "Enter URL")
            .then(function(url){
                
                if (!url) {
                    return;
                }

                restoreSelection();

                document.execCommand(
                    "createLink",
                    false,
                    url
                );

                saveSelection();

                editor.focus();
            
            });

        }
    );


    /* =====================================================
       BLOCKQUOTE
    ===================================================== */

    $("#blockquote").on(
        "click",
        function () {

            executeCommand(
                "formatBlock",
                "BLOCKQUOTE"
            );

        }
    );


    /* =====================================================
       HORIZONTAL LINE
    ===================================================== */

    $("#horizontalLine").on(
        "click",
        function () {

            executeCommand(
                "insertHorizontalRule"
            );

        }
    );


    /* =====================================================
       UPDATE TOOLBAR ACTIVE STATE
    ===================================================== */

    function updateToolbarState() {

        const commands = [

            "bold",
            "italic",
            "underline",
            "strikeThrough",
            "superscript",
            "subscript",
            "insertUnorderedList",
            "insertOrderedList"

        ];


        commands.forEach(
            function (command) {

                let button =
                    $(
                        '.toolbar button[data-cmd="' +
                        command +
                        '"]'
                    );

                if (
                    document.queryCommandState(
                        command
                    )
                ) {

                    button.addClass(
                        "active-tool"
                    );

                } else {

                    button.removeClass(
                        "active-tool"
                    );

                }

            }
        );


        /* =========================
           ALIGNMENT
        ========================= */

        const alignments = [

            "justifyLeft",
            "justifyCenter",
            "justifyRight",
            "justifyFull"

        ];


        alignments.forEach(
            function (command) {

                let button =
                    $(
                        '.toolbar button[data-cmd="' +
                        command +
                        '"]'
                    );

                if (
                    document.queryCommandState(
                        command
                    )
                ) {

                    button.addClass(
                        "active-tool"
                    );

                } else {

                    button.removeClass(
                        "active-tool"
                    );

                }

            }
        );

    }


    /* =====================================================
       KEYBOARD SHORTCUTS
    ===================================================== */

    $("#editor").on(
        "keydown",
        function (e) {

            /* CTRL + B */

            if (
                e.ctrlKey &&
                e.key.toLowerCase() === "b"
            ) {

                e.preventDefault();

                executeCommand(
                    "bold"
                );

                return;

            }


            /* CTRL + I */

            if (
                e.ctrlKey &&
                e.key.toLowerCase() === "i"
            ) {

                e.preventDefault();

                executeCommand(
                    "italic"
                );

                return;

            }


            /* CTRL + U */

            if (
                e.ctrlKey &&
                e.key.toLowerCase() === "u"
            ) {

                e.preventDefault();

                executeCommand(
                    "underline"
                );

                return;

            }


            /* CTRL + Z */

            if (
                e.ctrlKey &&
                !e.shiftKey &&
                e.key.toLowerCase() === "z"
            ) {

                e.preventDefault();

                document.execCommand(
                    "undo"
                );

                updateToolbarState();

                return;

            }


            /* CTRL + Y */

            if (
                e.ctrlKey &&
                e.key.toLowerCase() === "y"
            ) {

                e.preventDefault();

                document.execCommand(
                    "redo"
                );

                updateToolbarState();

                return;

            }


            /* CTRL + SHIFT + Z */

            if (
                e.ctrlKey &&
                e.shiftKey &&
                e.key.toLowerCase() === "z"
            ) {

                e.preventDefault();

                document.execCommand(
                    "redo"
                );

                updateToolbarState();

            }

        }
    );


    /* =====================================================
       IMAGE UPLOAD
       WIDTH = 100%
    ===================================================== */

   /* let uploadedImageName = [];*/

    $("#imageUpload").change(
        function () {

            let file = this.files[0];
            
            if (!file) {
                return;
            }

            let formData = new FormData();

            formData.append("image",file);

            $.ajax({

                url:"BACK-END/upload_image.php",
                type:"POST",
                data:formData,
                processData:false,
                contentType:false,
                success:
                function (path) {

                    path =path.trim();

                    //  Add Image Name
                    //uploadedImageName.push(path);

                    restoreSelection();

                    document.execCommand(
                        "insertHTML",
                        false,

                        `<p>
                            <img src="${path}" style="width:100%;max-width:100%;height:auto;display:block;" alt="Image">
                        </p>`
                    );

                    saveSelection();
                }

            });

        });                

    /* =====================================================
       VIDEO UPLOAD
       WIDTH = 100%
    ===================================================== */

    //let uploadedVideoName = [];

    $("#videoUpload").change(
        function () {

        let file = this.files[0];

        if (!file) {
            return;
        }

        let formData = new FormData();

        formData.append("video",file);

        $.ajax({

            url:"BACK-END/upload_video.php",
            type:"POST",
            data:formData,
            processData:false,
            contentType:false,
            success: function (path) {

                path =path.trim();

                //  Add Video Name
                //uploadedVideoName.push(path);

                restoreSelection();

                document.execCommand(
                    "insertHTML",
                    false,

                    `<p>
                        <video controls style="width:100%; max-width:100%; height:auto; display:block;">
                            <source src="${path}">
                        </video>
                    </p>`
                );

                saveSelection();

            }
        });

    });


    /* =====================================================
       COVER IMAGE UPLOAD
    ===================================================== */

    //let uploadedCoverImageName = [];
    let coverImage = "BACK-END/UPLOADS/COVERS/default_cover.png";

    $("#coverImageUpload").change(
        function () {

            let file = this.files[0];

            if (!file) {
                return;
            }

            let formData = new FormData();

            formData.append("image",file);

            $.ajax({

                url: "BACK-END/upload_cover.php",

                type: "POST",

                data: formData,

                processData: false,

                contentType: false,

                success: function (path) {

                        coverImage = path.trim();
                        //  Add CoverImage Name
                        //uploadedCoverImageName.push(path);

                        $("#coverPreview").attr("src",coverImage);
                }
            });

        }
    );


    /* =====================================================
       POST SETTINGS OPEN
    ===================================================== */

    $("#postSettingsBtn").click(
        function () {

            $(".settings-overlay")
                .fadeIn(200);

            $(".settings-modal")
                .fadeIn(250);

        }
    );


    /* =====================================================
       POST SETTINGS CLOSE
    ===================================================== */

    $("#closeSettings, .settings-overlay")
        .click(
            function () {

                $(".settings-modal")
                    .fadeOut(200);

                $(".settings-overlay")
                    .fadeOut(200);

            }
        );


    /* =====================================================
       HTML TOGGLE
    ===================================================== */

    $("#htmlToggle").click(
        function () {

            $(".html-box")
                .slideToggle();

        }
    );


    /* =====================================================
       INSERT HTML
    ===================================================== */

    $("#insertHTML").click(
        function () {

            let code =
                $("#htmlInput").val();


            if (
                code.trim() === ""
            ) {
                return;
            }


            restoreSelection();


            document.execCommand(
                "insertHTML",
                false,
                code
            );


            saveSelection();


            $("#htmlInput")
                .val("");


            editor.focus();

        }
    );


    /* =====================================================
       CLEAR EDITOR
    ===================================================== */

    $("#clearEditor").click(
        function () {

            showConfirm(
                "Delete",
                "Are you sure?"
            )
            .then(
                function (val) {

                    if (!val) {
                        return;
                    }


                    $("#editor")
                        .html("");


                    coverImage =
                        "BACK-END/UPLOADS/COVERS/default_cover.png";


                    $("#coverPreview")
                        .attr(
                            "src",
                            "BACK-END/UPLOADS/COVERS/default_cover.png"
                        );


                    $("#postCategory")
                        .val("");


                    $("#metaDescription")
                        .val("");


                    savedRange =
                        null;


                    $(".toolbar button")
                        .removeClass(
                            "active-tool"
                        );

                }
            );

        }
    );


    /* =====================================================
       PUBLISH POST
    ===================================================== */
    
    $(".publish-btn").click(
            function () {

        if(!sessionStorage.getItem("id")){   //  Create Post in Database
                
                let title = $(".title-input").val();

                let content = $("#editor").html();

                let category = $("#postCategory").val();

                let metaDescription = $("#metaDescription").val();


                /* =========================
                VALIDATION
                ========================= */

                if (title.trim() === "") {

                    showAlert(
                        "Error",
                        "Please enter title."
                    );

                    return;

                }


                if (content.trim() === "") {

                    showAlert(
                        "Error",
                        "Please enter content."
                    );

                    return;

                }

                if (category === "") {

                    showAlert(
                        "Error",
                        "Please select category."
                    );


                    $("#postSettingsBtn")
                        .click();

                    return;

                }

                /*======================
                Garbage Collection
                ======================*/

            /*  $("#editor img").each(function () {

                    let src = $(this).attr("src");
                    uploadedImageName.splice(uploadedImageName.indexOf(src), 1);

                });

                $("#editor video source").each(function () {

                    let src = $(this).attr("src");
                    uploadedVideoName.splice(uploadedVideoName.indexOf(src), 1);

                });

                uploadedCoverImageName.splice(uploadedCoverImageName.indexOf(coverImage),1);

                $.ajax({
                    url: "BACK-END/garbage_remover.php",
                    type: "POST",
                    data: {
                        garbage : [...uploadedImageName, ...uploadedVideoName, ...uploadedCoverImageName]
                
                    },
                    success: function(response) {
                        console.log(response);
                    }
                });
            */

                /* ====================================
                Post Save in Database API
                ==================================== */

                $.ajax({

                    url:"http://localhost/Smartbook/API/upload_post.php",

                    type:"POST",

                    contentType: "application/json; charset=utf-8",

                    data: JSON.stringify({
                        email : localStorage.getItem("email"),

                        title : title,

                        content:content,

                        cover_image:coverImage,

                        category:category,

                        meta_description:metaDescription
                    }),

                    dataType: "json",

                    beforeSend:
                        function () {

                            $(".publish-btn")
                                .html(
                                    '<i class="bi bi-hourglass-split"></i> Publishing...'
                                );

                        },


                    success: function (response) {

                            showAlert("Success",response.msg)
                            .then(function () {

                                    $(".title-input").val("");

                                    $("#editor").html("");

                                    $("#postCategory").val("")

                                    $("#metaDescription").val("");

                                    coverImage = "BACK-END/UPLOADS/COVERS/default_cover.png";

                                    $("#coverPreview")
                                        .attr(
                                            "src",
                                            "BACK-END/UPLOADS/COVERS/default_cover.png"
                                        );
                                    
                                    window.location.href = "home.php";
                                }
                            );

                            $(".publish-btn")
                                .html(
                                    '<i class="bi bi-cloud-upload"></i> Publish'
                                );

                        },


                    error:
                        function () {

                            showAlert(
                                "Error",
                                "Server Error"
                            );


                            $(".publish-btn")
                                .html(
                                    '<i class="bi bi-cloud-upload"></i> Publish'
                                );

                        }

                });
            }
            
    });

    /* =====================================================
       INITIAL
    ===================================================== */

    updateToolbarState();


});