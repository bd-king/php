<?php
	session_start();
	if(!isset($_SESSION['admin_id']))
	{
		session_destroy();
		header("location: index.php");
	}
	//session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>uploaddata</title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <style>
    .search{
    	padding-top: 10px;
    	display: flex;
    	width: 200px; height: 40px; margin: 0 auto;
    }
    </style>
	
</head>
<body>


<div>
	<nav class="navbar navbar-inverse">
  		<div class="container-fluid">
    		<div class="navbar-header">
      			<a class="navbar-brand" href="#"></a>
    		</div>
    			<ul class="nav navbar-nav">
      				<li>
      					<a href="register.php">Add new employee?</a>
      				</li>
      				<li>
      					<a href="deleteprofile.php">Delete employee profile?</a>
      				</li>
      				<li>
      					<a href="editprofile.php">Edit employee profile?</a>
      				</li>
      				<li>
      					<a href="salaryprofile.php">Employee's salary profile?</a>
      				</li>
      				<li>
      					<a href="allemployee.php">All employee list?</a>
      				</li>
      				<li>
      					<a href="paysalary.php">Pay employee's salary?</a>
      				</li>
      				<li>
      					<a href="logout.php">Logout</a>
      				</li>
      				<li>
      					<form  action=checkid.php method="post" class="search">
      						<input class="form-control" placeholder=" Search people by Id" name="person">
      					</form>
      				</li>
    			</ul>
  		</div>
	</nav>
</div>

</body>
</html>