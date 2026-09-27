<?php

$files = $_POST['garbage'];

    foreach($files as $path)
    {
        if(file_exists($path))
        {   
            echo $path;
            unlink($path);
        }
      
    }

echo "Successfully remove files...";

?>