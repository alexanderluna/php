<?php
function file_upload_error_message_for_code($error_code) {
    switch ($error_code) {
        case 0:
            echo 'There is no error, the file uploaded with success';
            break;
        case 1:
            echo 'The uploaded file exceeds the upload_max_filesize directive in php.ini';
            break;
        case 2:
            echo 'The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form';
            break;
        case 3:
            echo 'The uploaded file was only partially uploaded';
            break;
        case 4:
            echo 'No file was uploaded';
            break;
        case 6:
            echo 'Missing a temporary folder';
            break;
        case 7:
            echo 'Failed to write file to disk.';
            break;
        case 8:
            echo 'A PHP extension stopped the file upload.';
    }
}

function save_uploaded_file() {
    $current_folder = getcwd();
    echo 'Running in ' . $current_folder . '<br>';

    $target = getcwd() . "/uploads/";
    echo 'File will be store in ' . $target . '<br>';

    $target = $target . basename($_FILES["file"]["name"]);
    $image_location = 'uploads/' . basename($_FILES["file"]["name"]);
    echo 'The file path is ' . $image_location . '<br>';

    if (move_uploaded_file($_FILES["file"]["tmp_name"], $target)) {
        echo 'Saved File Successfully<br>';
    }

    echo '<img src="' . $image_location . '">';
}
?>