<?php
include 'connect.php'
$daily_id = $_GET["daily_id"];
if (isset($_POST['edit_daily'])) {
$sql = "DELETE FROM web.daily WHERE daily.daily_id =' ". $daily_id ." '";
$result = $conn->query($sql);
?>
<?php include 'daily.php'; ?> 