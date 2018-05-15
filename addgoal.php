<?php 

  include('server-registration.php');
  include('header.php');
  if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: login.php');
  }


 ?>

<body>
  <div class="header">
  	<h2>Add new Goal</h2>
  </div>
	
  <form method="post">
  	<?php include('errors.php'); ?>

  	<div class="input-group">
  	  <label>Goal Name</label>
  	  <input type="goalName" name="goalName" >
  	</div>
    <div class="input-group">
      <label>Total Budget</label>
      <input type="totalBudget" name="totalBudget" >
    </div>
  	<div class="input-group">
  	  <label>Monnthly budget</label>
  	  <input type="monthlyBudget" name="monthlyBudget">
  	</div>
  	<div class="input-group">
      <label>Description</label>
      <input type="description" name="description">
    </div>
  	<div class="input-group">
  	  <button type="submit" class="btn" name="reg_goal">Add</button>
  	</div>
  
  </form>
</body>

<?php

if (isset($_POST['reg_goal'])) {
  // receive all input values from the form
  $name = mysqli_real_escape_string($db, $_POST['goalName']);
  $monthly_budget = mysqli_real_escape_string($db, $_POST['monthlyBudget']);
  $total_budget = mysqli_real_escape_string($db, $_POST['totalBudget']);
  $description = mysqli_real_escape_string($db, $_POST['description']);


  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($name)) { array_push($errors, "Goal name is required"); }
  if (empty($monthly_budget)) { array_push($errors, "Monthly budget is required"); }
  if (empty($total_budget)) { array_push($errors, "Total budget is required"); }
  if (empty($description)) { array_push($errors, "Description is required"); }
  

  
  if (count($errors) == 0) {
    
    $user_id= $_SESSION['user_id'];
    $query = "INSERT INTO goals (user_id, name, monthly_budget, total_budget, description) 
          VALUES('$user_id', '$name', '$monthly_budget', '$total_budget', 'description')";
    mysqli_query($db, $query);
    header('location: home.php');
  }
}



  ?>
  <?php include('footer.php'); ?>
