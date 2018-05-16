<!DOCTYPE html>
<html lang="en">



<head>
<title>Personal Finance Management</title>
<link rel="stylesheet" href="style.css">
<link rel="stylesheet" href=https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css>
<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src=https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<meta charset="utf-8">
<link rel="stylesheet" href="copycss.css">
<div class="w3-top">
  <ul class="w3-navbar w3-white w3-wide w3-padding-8 w3-card-2">
    <li>
      <a href="" class="w3-margin-left"><b>WKES2109</b> Project</a>
    </li>
<!-- Float links to the right. Hide them on small screens -->



  <?php  if (isset($_SESSION['username'])) : ?>
    	<!--<p>Welcome <strong><?php echo $_SESSION['username']; ?></strong></p>
    	<p> <a href="index.php?logout='1'" style="color: red;">logout</a> </p>-->
    	<li class="w3-right w3-hide-small w3-dropdown-hover" style="padding-right: 10px;">
		          <p> <a href="index.php?logout='1'" style="color: red;">logout</a> </p>
		  </li>

    	<li class="w3-right w3-hide-small w3-dropdown-hover" style="padding-right: 10px;">
	         <p>Welcome <?php echo $_SESSION['username']; ?></p>
		  </li>
		  
    <?php endif ?>

    <?php  if (!isset($_SESSION['username'])) : ?>
	    <li class="w3-right w3-hide-small w3-dropdown-hover" style="padding-right: 10px;">
	          <a href="register.php" name="logout">Register</a>
		  </li>
		  <li class="w3-right w3-hide-small w3-dropdown-hover" style="padding-right: 10px;">
		          <a href="login.php" name="logout">Login</a>
		  </li>
	<?php endif ?>
</ul>
</div>
<div style="padding: 30px; padding-bottom: 100px; margin: auto;">
</head>
<?php
if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['username']);
  	header("location: index.php");
  }

  ?>