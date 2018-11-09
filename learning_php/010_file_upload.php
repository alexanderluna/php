<?php
include('_helper/book_manager.php');
include('_helper/file_upload.php');

$file_error_code = $_FILES["file"]["error"];

if ($file_error_code > 0) {
    file_upload_error_message_for_code($file_error_code);
    die();
}

echo 'ISBN: ' . $_POST['ISBN'] . '<br>';
echo 'Image Name: ' . $_FILES["file"]["name"] . '<br>';
echo 'Image Type: ' . $_FILES["file"]["type"] . '<br>';
echo 'Image Size: ' . ($_FILES["file"]["size"]/1024) . '<br>';
echo 'Image Location: ' . $_FILES["file"]["tmp_name"] . '<br>';

save_uploaded_file();

?>