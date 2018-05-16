<?php 

  include('server-registration.php');
  include('header.php');



 ?>

 <main><div style=" padding-top: 100px; margin: auto;">


    <div class="row">

      <div class="column" style="background-color:#A3E4D7; border: 1px solid white;">
        <h2>GOALS</h2>
        <p>Add new goals for this year</p>
        <center><i class="fa fa-key" style="font-size:80px;color:grey"></i></center>
        <br><br>
        <center><a href="goals.php"><button class="button" style="width: 40%">My Goals</button></a> &nbsp;
        <a href="addgoal.php"><button class="button" style="width: 40%">Add new goals</button></a></center>
      </div>

      <a href="daily.php"><div class="column" style="background-color:#D1F2EB; border: 1px solid white;">
        <h2>DAILY EXPENSES</h2>
        <p>Manage your daily expencess here</p>
        <center><i class="fa fa-calendar-check-o" style="font-size:80px;color:grey"></i></center>
      </div></a>

    </div>

    <div class="row">

      <a href="monthly.php"><div class="column" style="background-color:#D1F2EB; border: 1px solid white;">
        <h2>SUMMARY</h2>
        <p>See your summary of you expenditure</p>
        <center><i class="fa fa-bar-chart" style="font-size:80px;color:grey"></i></center>
      </div></a>

      <a href="features.php"><div class="column" style="background-color:#A3E4D7; border: 1px solid white;">
        <h2>FEATURES</h2>
        <p>Features of our system</p>
        <center><i class="fa fa-pencil" style="font-size:80px;color:grey"></i></center>
      </div></a>

    </div>

    </div></main>

<?php include('footer.php'); ?>