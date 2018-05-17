<?php//Update Items

  include('server-registration.php');
  include('header.php');
  include 'connect.php';

 ?>

<!DOCTYPE html>
<html lang="en">



<head>
<title>Personal Finance Management</title>
<style>
body{
    margin-top: 50px; /* Add a top margin to avoid content overlay */
    margin-bottom: 50px;
}
* {
    box-sizing: border-box;
}

.footer {
   position: fixed;
   left: 0;
   bottom: 0;
   width: 100%;
   background-color: black;
   color: white;
   text-align: center;
}
button {
    background-color: #4CAF50;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    cursor: pointer;
    width: 100%;
}

button:hover {
    opacity: 0.8;
}
.container {
    padding: 16px;
}

span.psw {
    float: right;
    padding-top: 16px;
}

/* The Modal (background) */
.modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
    padding-top: 60px;
}

/* Modal Content/Box */
.modal-content {
    background-color: #fefefe;
    margin: 5% auto 15% auto; /* 5% from the top, 15% from the bottom and centered */
    border: 1px solid #888;
    width: 80%; /* Could be more or less, depending on screen size */
}

/* The Close Button (x) */
.close {
    position: absolute;
    right: 25px;
    top: 0;
    color: #000;
    font-size: 35px;
    font-weight: bold;
}

.close:hover,
.close:focus {
    color: red;
    cursor: pointer;
}

/* Add Zoom Animation */
.animate {
    -webkit-animation: animatezoom 0.6s;
    animation: animatezoom 0.6s
}

@-webkit-keyframes animatezoom {
    from {-webkit-transform: scale(0)} 
    to {-webkit-transform: scale(1)}
}
    
@keyframes animatezoom {
    from {transform: scale(0)} 
    to {transform: scale(1)}
}

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
    span.psw {
       display: block;
       float: none;
    }
    .cancelbtn {
       width: 100%;
    }
}
#daily {
    font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
    border-collapse: collapse;
    width: 100%;
}

#daily td, #daily th {
    border: 1px solid #ddd;
    padding: 8px;
}

#daily tr:nth-child(even){background-color: #f2f2f2;}

#daily tr:hover {background-color: #ddd;}

#daily th {
    padding-top: 12px;
    padding-bottom: 12px;
    text-align: left;
    background-color: #48C9B0;
    color: white;
}
</style>

?>

<main><div style="padding: 30px; margin: auto;">
<center>

	
</center>

<div class="container">
<table id="daily">
<tr>
    <th>Date</th>
    <th>Category</th>
    <th>Amount (RM)</th>
  </tr>
  <?php
$daily_id = $_GET["daily_id"];

$retrieve = "SELECT * from web.daily where daily.daily_id = '" .$daily_id. "'";
$table = mysqli_query($con, $retrieve);
while ($row = mysqli_fetch_assoc($table)) {
  # code...
?>
  
  	<tr>
    <td><?php echo $row["date"]?></td>
    <td><?php echo $row["category"]?></td>
    <td><form><input type="text" name="amount" placeholder="<?php echo $row["amount"]?>" required>
    <button type="submit" name="amount_edit">Save</button>
    <button type="reset">Cancel</button></form>
	</td>
	</tr>

	<?php } ?>
</table>
</div>
</div>
</main>
</head>
</html>



<?php
	if(isset($_POST['amount_edit'])){
		$amount = $_POST['amount'];
		$sql = "UPDATE web.daily SET daily.amount=' .$amount. ' WHERE daily.daily_id =' ".$daily_id. "'";
                            if ($conn->query($sql) === TRUE) {
                                echo '<script>window.location.href="daily.php"</script>';
                            } else {
                                echo "Error updating record: " . $conn->error;
                            }
                        }
include 'daily.php';
?>

<?php include('footer.php'); ?>