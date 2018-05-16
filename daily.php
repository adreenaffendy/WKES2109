<?php 
  //session_register();
  include('server-registration.php');
  include('header.php');
  include 'connect.php';
  $query = "SELECT sum(amount) AS amount, category FROM daily WHERE user_id = '" .$_SESSION['user_id']. "' GROUP BY category";
  $result = mysqli_query($con, $query);



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
<body>



<div id="wrapper">


<main><div style="padding: 30px; margin: auto;">
<center>

<div id="piechart" style=""></div>
	
</center>

<div class="container">
<table id="daily">
<tr>
    <th>Date</th>
    <th>Category</th>
    <th>Amount (RM)</th>
    <th>Option</th>
  </tr>
<?php
$retrieve = "SELECT * from daily where user_id = '" .$_SESSION['user_id']. "'";
$table = mysqli_query($con, $retrieve);
while ($row = mysqli_fetch_assoc($table)) {
  # code...
?>
  
  <tr>
    <td><?php echo $row["date"]?></td>
    <td><?php echo $row["category"]?></td>
    <td><?php echo $row["amount"]?></td>
    <td><a href='' name="edit_daily">Edit</a> |<?php echo "<a href='delete_daily.php?daily_id=". $row["daily_id"]."' method='get'>";?>Delete</a></td>
  </tr>



<?php } ?>
</table>
<div id="result"></div>


<div class="container">

  <br><br><br>
  
  <form method="post" action="daily.php">
  Date: <span id="datetime"></span>
  &nbsp;
    Category:
      <select name="category">
        <option id="Groceries" value="Groceries">Groceries        </option>
        <option id="Food/Beverages" value="Food/Beverages">Food/Beverages </option>
        <option id="Transportation" value="Transportation">Transportation </option>
        <option id="Shopping" value="Shopping">Shopping       </option>
        <option id="Entertainment" value="Entertainment">Entertainment    </option>
      </select>
    &nbsp;
    Amount (RM):
    <input id="Amount" type="text" name="amount" required>
    
    <button style="color:green;margin: 0 10px;" type="submit" name="add_daily">Add</button></p>
</form>

</div>

</div></main>

</div>
</body>


<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

<script type="text/javascript">
// Load google charts
google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawChart);

// Draw the chart and set the chart values
function drawChart() {
  var data = google.visualization.arrayToDataTable([
  ['Category', 'Amount(RM)'],
  <?php
  if ($result->num_rows > 0) {
    while($row = mysqli_fetch_array($result))
  {
    echo "['" .$row["category"]. "', " .$row["amount"]. "],";
  } 
} else {
    echo "No chart to display. Add them first. Below ...";
    $user_id= $_SESSION['user_id'];
    $category = "Groceries";
    $amount = 0;

    $sql= "INSERT INTO daily (user_id, category, amount) VALUES ('$user_id','$category', '$amount')";

    $result = $con->query($sql);
    
}

?>
]);

  // Optional; add a title and set the width and height of the chart
  var options = {'title':'My Daily Expenses', 'width':850, 'height':600};

  // Display the chart inside the <div> element with id="piechart"
  var chart = new google.visualization.PieChart(document.getElementById('piechart'));
  chart.draw(data, options);
}
</script>
<script>
var dt = new Date();
document.getElementById("datetime").innerHTML = dt.toLocaleDateString();
</script>
	


<?php include('footer.php'); ?>

<?php
//session_start();
include 'connect.php';
//if($_SERVER["REQUEST_METHOD"]=="POST")

if(isset($_POST['add_daily']))
  {
  include 'connect.php';

  $user_id= $_SESSION['user_id'];
  $category = $_POST['category'];
  $amount = $_POST['amount'];
  
  $result= "INSERT INTO daily (user_id, category, amount) VALUES ('$user_id','$category', '$amount')";

  if(!mysqli_query($con, $result)) {
        echo('Could not enter data: ' . mysql_error());
    }
    else {
        echo "  <div class='w3-modal-content w3-card-4 w3-animate-zoom' style='padding:32px;max-width:600px'>
            <div class='w3-container w3-white w3-center'>
                <h1 class='w3-wide'>Awesome</h1>
                <p>You just add your daily expenses.</p>
                <div class='w3-row'>
                    <div class='w3-half'>
                      <a href='daily.php'><button onclick='document.getElementById('id01').style.display='none'' type='button' class='w3-button w3-block w3-green'>View Expenses Chart</button></a>
                    </div>
                    <div class='w3-half'>
                      <a href='home.php'><button onclick='document.getElementById('id01').style.display='none'' type='button' class='w3-button w3-block w3-red'>Back to Home Page</button></a>
                    </div>
                  </div>
            </div>
            </div>";
        }
      
}
?>