
<!DOCTYPE html>

<html lang="en">
<head>
	<title>LogIn</title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <style>
    	.container{
    		padding-top: 100px;
    		width: 300px; height: 300px; margin: 0 auto;
    	}
    </style>
</head>
<body>
<?php
include "database.php";
//include "sessionValue.php";
	$error = "";
	if(isset($_POST['submit']) && !empty($_POST['mail']) && !empty($_POST['pass']))
	{

	//if(isset($_POST['mail']) && isset($_POST['pass']))
		$a = stripcslashes($_POST['mail']);
		$b = stripcslashes($_POST['pass']);

		$sql = "SELECT * FROM users where email='$a' and password ='$b'";
		$result = $conn->query($sql);

		if ($result->num_rows > 0) {
		    // output data of each row
		    while($row = $result->fetch_assoc()) {
		        
		        //echo "id: ". $row["id"]. " - email: " . $row["email"]. " " . $row["password"]."<br>";
		        session_start();
		        $_SESSION['admin_id'] = $row['id'];
		        $_SESSION['admin_mail'] = $row['email'];
		        $_SESSION['admin_pass'] = $row['password'];
		        $_SESSION['type'] = 'admin';
		        header("location: home.php");
		    }
		} else {
			//echo "If";
		    $error = "*Invalid email or password!";
		    //echo "else";
		}
		$conn->close();
		
	}
?>

	<div class="container">
	<div  class="well well-lg">
		<form action="index.php" method="post" class="form-horizontal">

		<div class="form-group column">
			<div class="form-group">
				<div class="col-sm-12">
					<label style="color: red;"><?php echo $error; ?></label>
				</div>
			</div>
			<div class="form-group">
				<div class="col-sm-4">
					<h1>LogIn</h1>
				</div>
				
			</div>
			<div class="form-group">
				<div class="col-sm-12">
					<input type="textarea" class="form-control" required placeholder="E-mail"   name="mail">
				</div>
			</div>
			<div class="form-group">
				<div  class="col-sm-12">
					<input type="password" class="form-control" required placeholder="Password" name="pass">
				</div>
			</div>	
			<div>
				<button type="submit" name="submit" class="btn btn-primary">Enter</button>
			</div>
		</div>
		</form>
	</div>
	</div>
</body>
</html>
