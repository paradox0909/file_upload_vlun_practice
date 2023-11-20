<?php
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "<div class='success'>The file ". htmlspecialchars(basename($_FILES["fileToUpload"]["name"])). " has been uploaded.</div>";
        echo "<img src='".$target_file."' />";
    } else {
        echo "<div class='error'>Sorry, there was an error uploading your file.</div>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<style>
body {
    font-family: Arial, sans-serif;
}

form {
    margin: 30px;
    padding: 20px;
    border: 1px solid #ccc;
    width: 300px;
}

input[type=file],
input[type=submit] {
    margin-top: 10px;
}

.success {
    color: green;
    margin: 20px;
}

.error {
    color: red;
    margin: 20px;
}

img {
    max-width: 300px;
    margin-top: 20px;
}
</style>
</head>
<body>

<form action="upload.php" method="post" enctype="multipart/form-data">
  Select image to upload:
  <input type="file" name="fileToUpload" id="fileToUpload">
  <input type="submit" value="Upload Image" name="submit">
</form>

</body>
</html>

