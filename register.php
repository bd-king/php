<?php
    session_start();
    if(!isset($_SESSION['admin_id']))
    {
        session_destroy();
        header("location: index.php");
    }
?>
<!DOCTYPE html>
<html>  
<head lang="en">  
     
    <title>Registration</title>  
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

<?php
  $nameError ="";
  $passError ="";
  $mailError ="";
  $addressError = "";
  $contactError = "";
  $designationError ="";
  $getError = 0;
  
  include "database.php";

  if(isset($_POST["register"]))
  {
    //echo $_POST['designation'];
    $name1 = $_POST['name'];
    $name = stripcslashes($_POST['name']);
    $name = strip_tags($name);
    if(strcmp($name, $name1)!==0)
    {
        $nameError = "Please skip slashes or tags";
        $getError  = 1;
    }
    $pass1 = ($_POST['pass1']);
    $pass2 = ($_POST['pass2']);
    if(strcmp($pass2, $pass1)!==0 && $getError==0)
    {
        $passError = "*Password does not match!";
        $getError = 1;
    }
    $mail1= $_POST['email'];
    $mail = stripcslashes($_POST['email']);
    $mail = strip_tags($mail);
    if (strcmp($mail, $mail1)!==0 && $getError==0) {
        $mailError = "Please skip slashes or tags";
        $getError = 1;
    }
    $address1 = $_POST['address'];
    $address = stripcslashes($_POST['address']);
    $address = strip_tags($address);
    if(strcmp($address, $address1)!==0 && $getError==0)
    {
        $addressError = "Please skip slashes or tags";
        $getError = 1;
    }
    $contact1  = $_POST['contact'];
    $contact = stripcslashes($_POST['contact']);
    $contact = strip_tags($contact);
    if (strcmp($contact, $contact1)!==0 && $getError==0) {
        $contactError = "Please skip slashes or tags";
        $getError = 1;
    }
    if($getError==0)
    {
        $_SESSION['name'] = $name;
        $_SESSION['password'] = $pass1;
        $_SESSION['email'] = $mail;
        $_SESSION['address'] = $address;
        $_SESSION['contact'] = $contact;
        $im = $_POST['image'];
        $im = base64_encode($im);
        $_SESSION['photo'] = $im;
        header("location: up_register.php");
    }
  }


  
?>

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
  
<div class="container"><!-- container class is used to centered  the body of the browser with some decent width-->  
    <div class="row"><!-- row class is used for grid system in Bootstrap-->  
        <div class="col-md-4 col-md-offset-4"><!--col-md-4 is used to create the no of colums in the grid also use for medimum and large devices-->  
            <div class="login-panel panel panel-success">  
                <div class="panel-heading">  
                    <h3 class="panel-title">Registration</h3>  
                </div>  
                <div class="panel-body">  
                    <form role="form" method="post" action="register.php">  
                        <fieldset>  
                            <div class="form-group">  
                                <input class="form-control" placeholder="Username" name="name" type="text" autofocus value="" required>  
                            </div>  
  
                            <div class="form-group">  
                                <input class="form-control" placeholder="Password" name="pass1" type="password" autofocus value="" required>
                                <label style="color: red;"><?php echo $passError; ?></label>  
                            </div>

                            <div class="form-group">  
                                <input class="form-control" placeholder="Confirm password" name="pass2" type="password" value="" required>
                            </div>  
                            <div class="form-group">  
                                <input class="form-control" placeholder="E-mail" name="email" type="email" autofocus value="" required>
                                <label style="color: red;"><?php echo $mailError; ?></label> 
                            </div>  
  
                            <div class="form-group">  
                                <input class="form-control" placeholder="Address" name="address" type="text" autofocus value="" required>
                                <label style="color: red;"><?php echo $addressError; ?></label>
                            </div>
                            <div class="form-group">
                                <label for="sel1">Selec-one:</label>
                                <select class="form-control" id="sel1" name="designation">
                                    <option value="none">None</option>
                                    <option value="senior">Senior-officer</option>
                                    <option value="junior">Junior-officer</option>
                                </select>
                            </div>  
                            <div class="form-group">  
                                <input class="form-control" placeholder="Contact" name="contact" type="text" value="" required>
                                <label style="color: red;"><?php echo $contactError; ?></label> 
                            </div>
                            <div class="checkbox">
                                <b>Gender:</b><br>
                                <input type="radio" name="gender" value="male"/>Male
                                <input type="radio" name="gender" value="female"/>Female
                                <input type="radio" name="gender" value="others"/>Others
                            </div>
                            <div class="form-group">
                                <input class="form-control" placeholder="Upload an image" name="image" type="file" required>
                            </div>
  
                            <input class="btn btn-lg btn-success btn-block" type="submit" value="**Register**" name="register">
  
                        </fieldset>  
                    </form>  
                    
                </div>  
            </div>  
        </div>  
    </div>  
</div>  
  
</body>  
  
</html>  
  
