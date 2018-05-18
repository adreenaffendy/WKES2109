<?php 
  //session_register();
  include('server-registration.php');
  include('header.php');
  include 'connect.php';


  $query1 = "SELECT users.income, daily.category, SUM( daily.amount ) as amount FROM users JOIN daily WHERE MONTH( daily.DATE ) = MONTH( CURRENT_DATE( ) ) AND YEAR( daily.DATE ) = YEAR( CURRENT_DATE( ) ) and users.user_id = '" .$_SESSION['user_id']. "' ";
  $result = mysqli_query($con, $query1);

  if ($result->num_rows > 0) {
    while($row = mysqli_fetch_array($result))
  {



 ?>
<!DOCTYPE html>
<html lang="en">



<head>
<title>Personal Finance Management</title>
</head>

<body>

<div id="wrapper">

<main><div style="padding: 30px; margin: auto;">
<br><br>
<?php include 'back_btn.php'; ?>

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
  ['Income', <?php echo $row["income"]; ?>],
  ['Actual Expenses', <?php echo $row["amount"]; } }?>],
]);

  // Optional; add a title and set the width and height of the chart
  var options = {'title':'Summary Expenses', 'width':850, 'height':600};

  // Display the chart inside the <div> element with id="piechart"
  var chart = new google.visualization.PieChart(document.getElementById('piechart'));
  chart.draw(data, options);
}
</script>

</div></main></div>
</body>
</html>

<?php include('footer.php'); ?>