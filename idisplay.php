<?php
include('session.php');
$sqlimage  = "SELECT image FROM image_table where `imagename` = director_mod.png";
    $result = mysqli_query($db, $sqlimage);

    while($row = mysqli_fetch_array($result, MYSQL_ASSOC))
{

    echo "<img src = 'Image/".$row['image'].'" />';


} 
?>