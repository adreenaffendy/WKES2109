<?php
//session_start();
include 'connect.php';
//if($_SERVER["REQUEST_METHOD"]=="POST")

if(isset($_POST['signup']))
	{
	include 'connect.php';

	if(!empty($_FILES['image']['name'])){
	$target = "images/ " . basename($_FILES['image']['name']);
	}else{
		$target = "";
	}

	$firstname = $_POST['firstname'];
	$lastname = $_POST['lastname'];
	$email = $_POST['email'];
	$phone = $_POST['phone'];
	$nric = $_POST['nric'];	
	$username = $_POST['username'];
	$password = $_POST['password'];
	$image = $_FILES['image']['name'];
	
	
	$result= "INSERT INTO user (firstname, lastname, email, phone, nric, username, password, photo) VALUES ('$firstname','$lastname', '$email', '$phone', '$nric','$username','$password', '$target')";

	if (mysqli_query($con, $result)) {
     		header('Location:home.php');
     		//echo('Could not enter data: ' . mysql_error());
  	}
  	else {
    		echo "Error: " . $result . "<br>" . mysqli_error($con);
  			}

  	if(move_uploaded_file($_FILES['image']['tmp_name'], $target)){
		$msg = "success";
	}else{
		$msg = "error";
	}
			
}

?>

<!DOCTYPE html>
<html lang="en">



<head>
<title>Personal Finance Management</title>
<link rel="stylesheet"
href=https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css>
<script src=https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js
</script>
<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<meta charset="utf-8">
<link rel="stylesheet" href="copycss.css">
</head>

<style>
body{
    margin-top: 50px; /* Add a top margin to avoid content overlay */
    margin-bottom: 50px;
}
* {
    box-sizing: border-box;
}
.myForm {
font-family: "Lucida Sans Unicode", "Lucida Grande", sans-serif;
font-size: 0.8em;
width: 80em;
padding: 1em;
border: 1px solid #ccc;
}

.myForm * {
box-sizing: border-box;
}

.myForm fieldset {
border: none;
padding: 0;
}

.myForm legend,
.myForm label {
padding: 0;
font-weight: bold;
}

.myForm label.choice {
font-size: 0.9em;
font-weight: normal;
}

.myForm label {
text-align: left;
display: block;
}

.myForm input[type="text"],
.myForm input[type="tel"],
.myForm input[type="email"],
.myForm input[type="datetime-local"],
.myForm input[type="password"],
.myForm select,
.myForm textarea {
float: right;
width: 60%;
border: 1px solid #ccc;
font-family: "Lucida Sans Unicode", "Lucida Grande", sans-serif;
font-size: 0.9em;
padding: 0.3em;
}

.myForm textarea {
height: 100px;
}

.myForm input[type="radio"],
.myForm input[type="checkbox"] {
margin-left: 40%;
}

.myForm button {
padding: 1em;
border-radius: 0.5em;
background: #eee;
border: none;
font-weight: bold;
margin-left: 40%;
margin-top: 1.8em;
}

.myForm button:hover {
background: #ccc;
cursor: pointer;
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

<body>

<div class="w3-top">
  <ul class="w3-navbar w3-white w3-wide w3-padding-8 w3-card-2">
    <li>
      <a href="index.php" class="w3-margin-left"><b>WKES2109</b> Project</a>
    </li>
    
<!-- Float links to the right. Hide them on small screens -->
	<li class="w3-right w3-hide-small w3-dropdown-hover" style="padding-right: 10px;">
      		<p onclick="document.getElementById('id01').style.display='block'">Login</p>
	</li>

</ul>
</div>

<div id="id01" class="w3-modal">
	<div class="w3-modal-content w3-card-4 w3-animate-zoom" style="padding: 32px; max-width: 600px">
		<center>
	<fieldset style="width: 80%">
		<form method="post" action="">
			<table cellpadding="2" cellspacing="2" border="0">
				<tr>
					<td>Username</td>
					<td> <input type="text" name="username"></td>

				</tr>
				<tr>
					<td>Password</td>
					<td><input type="password" name="password"></td>
				</tr>
				
				<tr>
					<td> &nbsp;</td>
					<td><input style="color:green" type="submit" name="login" value="Login"></td>
					<td><a href="sign_up.php">Not a member? Sign Up now</a></td>
				</tr>
			</table>
		</form></fieldset></center>
	</div>
</div>



<br><br>
	
	<center><form class="myForm" method="post" enctype="multipart/form-data" action="sign_up.php">

<legend style="background-color: #D1F2EB;"><br><br><h4><b><font face="Cursive" color="black">Not a user yet? Sign up here! </font></b></h4></legend>
<p>
<label> First Name
<input type="text" name="firstname" required>
</label> 
</p>

<p>
<label> Last Name
<input type="text" name="lastname" required>
</label> 
</p>

<p>
<label>Email 
<input type="email" name="email" required>
</label>
</p>

<p>
<label>Phone Number
<input type="tel" name="phone" required>
</label>
</p>

<p>
<label> NRIC Number
<input type="text" name="nric" required>
</label> 
</p>

<p>
<label> Username
<input type="text" name="username" required>
</label> 
</p>

<p>
<label> Password
<input type="password" name="password" required>
</label> 
</p>

<p>
<label> Your profile picture
<input type="hidden" name="size" value="1000000">
<br>
<input type="file" name="image">
</label> 
</p>


<p><button type="submit" class="btn" name="signup">Sign Up</button></p>
<br><br>
</form></center>

<br><br>
</body>

<br><br>
<div class="footer">
<br>
Copyright &copy; WKES2109
	<br> <a href="mailto:areen@fendy.com">areen@fendy.com</a>
<br>


<br>  
</div>
</html>