<?php
require_once('dbcon.php');
$id = base64_decode($_GET['id']);
$sql_student_remove = "DELETE FROM `studentinformation` WHERE `id` = $id";
mysqli_query($dbcon, $sql_student_remove);
header ('location: index.php');
?>