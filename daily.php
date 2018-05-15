<?php 

  include('server-registration.php');
  include('header.php');
  include 'connect.php';
  $query = "SELECT amount, category FROM daily GROUP BY category";
  $result = mysqli_query($con, $query);



 ?>

<!DOCTYPE html>
<html lang="en">



<head>
<title>Personal Finance Management</title>
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
  <tr>
    <td>03/1/2018</td>
    <td>Groceries</td>
    <td>200</td>
    <td><a href="">Edit</a> |<a href="">Delete</a></td>
  </tr>
  <tr>
    <td>14/1/2018</td>
    <td>Transport</td>
    <td>120</td>
    <td><a href="">Edit</a> |<a href="">Delete</a></td>
  </tr>
  <tr>
    <td>15/1/2018</td>
    <td>Entertainment</td>
    <td>150</td>
    <td><a href="">Edit</a> |<a href="">Delete</a></td>
  </tr>
  <tr>
    <td>21/1/2018</td>
    <td>Food/Beverages</td>
    <td>170</td>
    <td><a href="">Edit</a> |<a href="">Delete</a></td>
  </tr>
  <tr>
    <td>28/1/2018</td>
    <td>Shopping</td>
    <td>150</td>
    <td><a href="">Edit</a> |<a href="">Delete</a></td>
  </tr>
</table>
</div>
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
    <input id="Amount" type="text" name="amount">
    
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
    while($row = mysqli_fetch_array($result))
  {
    echo "['" .$row["category"]. "', " .$row["amount"]. "],";
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
  if (empty($amount)) { array_push($errors, "Amount is required"); }

  
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