<?php 

  include('server-registration.php');
  include('header.php');
  if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: login.php');
  }


 ?>


<div class="row">

  <?php
    $db = mysqli_connect('localhost', 'root', '', 'web'); 
    $user_id = $_SESSION['user_id'];
    $sql = "SELECT * from goals where goals.user_id =$user_id;";
    
    $result = mysqli_query($db, $sql);
    if (mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {
            
    ?>
  <div class="column">
    <div class="card">

        <h2><?php echo $row['name']; ?></h2>
        <p class="title">TOTAL: RM <?php echo $row['total_budget']; ?></p>
        <p>Monthly: RM <?php echo $row['monthly_budget']; ?></p>
        <p>Description <?php echo $row['description']; ?></p>
        <a href="goal_details.php?id=<?php echo $row['id']; ?>"><p><button class="button">View</button></p></a>
      
    </div>
  </div>
<?php }
}
else{
  echo "No goals yet. Add !";
  } ?>

<!--   <div class="column">
    <div class="card">

        <h2>2019 Japan Travel</h2>
        <p class="title">TOTAL: RM3000</p>
        <p>Monthly: RM50</p>
        <p><button class="button">View</button></p>
      
    </div>
  </div>

  <div class="column">
    <div class="card">

        <h2>2020 Ireland Trip</h2>
        <p class="title">TOTAL: RM10,000</p>
        <p>Monthly: RM100</p>
        <p><button class="button">View</button></p>
      
    </div>
  </div>

<div class="column">
    <div class="card">

        <h2>My Own Car</h2>
        <p class="title">TOTAL: RM50,000</p>
        <p>Monthly: RM50</p>
        <p><button class="button">View</button></p>
      
    </div>
  </div> -->

</div>

<?php include('footer.php'); ?>


<style>
body{
    margin-top: 50px; /* Add a top margin to avoid content overlay */
    margin-bottom: 50px;
    font-family: Arial, Helvetica, sans-serif;
}
html {
  box-sizing: border-box;
}

*, *:before, *:after {
  box-sizing: inherit;
}

.column {
  float: left;
  width: 33.3%;
  margin-bottom: 16px;
  padding: 0 8px;
}

@media screen and (max-width: 650px) {
  .column {
    width: 100%;
    display: block;
  }
}

.card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
}

.container {
  padding: 0 16px;
}

.container::after, .row::after {
  content: "";
  clear: both;
  display: table;
}

.title {
  color: grey;
}

.button {
  border: none;
  outline: 0;
  display: inline-block;
  padding: 8px;
  color: white;
  background-color: #A3E4D7;
  text-align: center;
  cursor: pointer;
  width: 100%;
}

.button:hover {
  background-color: #555;
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
</style>