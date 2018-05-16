<?php 
  //session_register();
  include('server-registration.php');
  include('header.php');
  include 'connect.php';


  $query1 = "SELECT income from users where user_id = '" .$_SESSION['user_id']. "' ";
  $income = mysqli_query($con, $query1);

  $query2 = "SELECT sum(amount) as amount from daily where user_id = '" .$_SESSION['user_id']. "' ";
  $actual = mysqli_query($con, $query2);


 ?>
<!DOCTYPE html>
<html lang="en">



<head>
<title>Personal Finance Management</title>
</head>

<main><div style="padding: 30px; margin: auto;">
<center>

<div id="piechart" style=""></div>
  
</center>

 <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

<script type="text/javascript">
// Load google charts
google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawChart);

// Draw the chart and set the chart values
function drawChart() {
  var data = google.visualization.arrayToDataTable([
  ['Type', 'Amount(RM)'],
  ['Income', <?php echo $income; ?>],
  ['Actual Expenses', <?php echo $actual; ?>],
]);

  // Optional; add a title and set the width and height of the chart
  var options = {'title':'Summary Expenses', 'width':850, 'height':600};

  // Display the chart inside the <div> element with id="piechart"
  var chart = new google.visualization.PieChart(document.getElementById('piechart'));
  chart.draw(data, options);
}
</script>
</div></main>
</html>

<?php include('footer.php'); ?>