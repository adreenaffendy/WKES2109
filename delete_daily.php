<?php
include 'connect.php';
$daily_id = $_GET["daily_id"];
$sql = "DELETE FROM web.daily WHERE daily.daily_id =' ". $daily_id ." '";
$result = $con->query($sql);
?>
<?php include 'daily.php'; ?> 