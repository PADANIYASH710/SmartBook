<?php

if(isset($_FILES['image']))
{
    $folder = "UPLOADS/COVERS/";

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
            $_FILES['image']['name'],
            PATHINFO_EXTENSION
        )
    );

    $allowed = [
        "jpg",
        "jpeg",
        "png",
        "gif",
        "webp",
        "bmp",
        "tif",
        "tiff",
        "ico",
        "avif",
        "heic",
        "heif"
    ];

    if(!in_array($extension,$allowed))
    {
        exit("Invalid Image Format");
    }

    $filename =
        date("YmdHis") .
        "." .
        $extension;

    $target =
        $folder .
        $filename;

    if(
        move_uploaded_file(
            $_FILES['image']['tmp_name'],
            $target
        )
    )
    {
        echo "BACK-END/" . $target;
    }
    else
    {
        echo "Image Upload Failed";
    }
}
else
{
    echo "No Image Found";
}

?>