<?php

date_default_timezone_set('Asia/Kolkata');

if(isset($_FILES['video']))
{
    $folder = "UPLOADS/VIDEOS/";

    if(!file_exists($folder))
    {
        mkdir(
            $folder,
            0777,
            true
        );
    }

    $extension = strtolower(
        pathinfo(
            $_FILES['video']['name'],
            PATHINFO_EXTENSION
        )
    );

    $allowed = [

        "mp4",
        "webm",
        "mov",
        "avi",
        "mkv",
        "flv",
        "wmv",
        "mpeg",
        "mpg",
        "m4v",
        "3gp",
        "ogv",
        "ogg"

    ];

    if(!in_array($extension,$allowed))
    {
        exit("Invalid Video Format");
    }

    $filename = date("YmdHis") . "." . $extension;

    $target = $folder . $filename;

    if( move_uploaded_file( $_FILES['video']['tmp_name'], $target ))
    {
        
        echo "BACK-END/" . $target;
    }
    else
    {
        echo "Video Upload Failed";
    }
}
else
{
    echo "No Video Found";
}

?>