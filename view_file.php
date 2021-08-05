<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View File</title>
    <link rel="stylesheet" href="/view_file.css?v=<?php echo time(); ?>">
</head>
<body>

    
<div class="title_box">
    <h1>View Upload File & Download</h1>
</div>

<a id="add_file" href="index.php">
<div class="add_box">
  Add Files
</div>
</a>
<table class="view_table">
      <thead id="table_thead">
        <tr class="table_tr">
          <th class="table_th">Serial No</th>
          <th class="table_th">File Name</th>
          <th class="table_th">PDF File</th>
        </tr>
      </thead>
      <tbody id="table_tbody">

<?php
require 'conn.php';

$file_view = "SELECT * FROM `upload_files`";
$result = mysqli_query($conn, $file_view);

while($detail = mysqli_fetch_array($result))
{

?>     

      <tr class="table_tr">
          <td class="table_td" data-column="S_No"><?php echo $detail['sno'];?></td>
          <td class="table_td" data-column="File Name"><?php echo $detail['file_name'];?></td>
          <td class="table_td" data-column="PDF File"><a href="/pdf/<?php echo $detail['pdf'];?>"  target="_blank" id="download_link"><?php echo $detail['pdf']; ?></a></td>
        </tr>
 <?php
}
 ?>
        </tbody>
        </table>

</body>
</html>
