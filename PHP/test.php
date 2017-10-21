<?php

print_r($_FILES);
$img="abc1576.jpeg";
move_uploaded_file($_FILES["file"]["tmp_name"],"images/".$_FILES["file"]["name"]);
echo  "<img src='http://dqlsll1234.centralus.cloudapp.azure.com/familyM/images/$img'></img>";
?>
