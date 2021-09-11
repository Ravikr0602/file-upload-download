<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload_File</title>
    <link rel="stylesheet" href="style.css?v=<?php echo time(); ?>">
</head>
<body>

 

<?php

require 'conn.php';

if(isset($_POST['upload_file']))
{
    $filename = $_POST['File_Name'];
    $upload = $_FILES['upload']['name'];
    $upload_type = $_FILES['upload']['type'];
    $upload_size = $_FILES['upload']['size']; 
    $upload_tem_loc = $_FILES['upload']['tmp_name'];
    $upload_store ="pdf/".$upload;
    move_uploaded_file($upload_tem_loc,$upload_store);


    $uploads = "INSERT INTO `upload_files` ( `file_name`, `pdf`, `file_uploading_time`) VALUES ('$filename','$upload', CURRENT_TIMESTAMP)";

    $result = mysqli_query($conn, $uploads);

    if($result)
    {
        echo '<script>alert (" Your Files has been upload successfully.");
        </script>';
        header('location: view_file.php');
    }
    else {
        echo '<script>alert ("Sorry there are some problem Please try again.");
        </script>';
    }
}
?>


<div class="contanier">
<div class="box">   
<div class="upload_container">
    
    <div class="title">Upload  Files</div>
    <div class="upload-inputs">
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>"  method="POST" enctype="multipart/form-data">
        <label>File Name</label>
        <input type="text" id="upload_input" name="File_Name">
        <label>Upload File</label>
        <input type="file" id="upload_input" name="upload">
      

        <input type="submit" name="upload_file" value="Upload File" id="upload_btn">
        <button id="view_btn"><a href="view_file.php">View Upload File</a></button>
    </form>
    </div>
  </div>
  </div>

</div>    

</body>
</html>
