<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Upload File</title>
</head>
<body>
    <form action="/010_file_upload.php" method="POST" enctype="multipart/form-data">
        <label for="ISBN">ISBN</label>
        <input type="text" name="ISBN">

        <label for="file">Upload Image</label>
        <input type="file" name="file" id="file">

        <input type="submit" value="Upload File">
    </form>
</body>
</html>