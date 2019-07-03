<?php 
session_start();
session_destroy();
session_start();
include('configure.php');
if(!isset($_SESSION['username'])){}
if (isset($_POST['username'])) { $username = $_POST['username']; } 
elseif (isset($_SESSION['username'])) { $username = $_SESSION['username']; }
if (isset($_POST['password'])) { $password = $_POST['password']; } 
elseif (isset($_SESSION['password'])){ $password = $_SESSION['password']; }
if(!isset($username)) {
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KOJO MOTORS | ERP SYSTEM</title>
    <!-- Core CSS - Include with every page -->
    <link href="assets/plugins/bootstrap/bootstrap.css" rel="stylesheet" />
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href="assets/plugins/pace/pace-theme-big-counter.css" rel="stylesheet" />
   <link href="assets/css/style.css" rel="stylesheet" />
      <link href="assets/css/main-style.css" rel="stylesheet" />

</head>

<body class="body-Login-back" style="background: url(assets/img/bg.jpg) no-repeat fixed;  background-size:cover;">

    <div class="container">
       
        <div class="row">
            <div class="col-md-4 col-md-offset-4 text-center logo-margin ">
              <img src="assets/img/logo.png" alt="KOJO MOTORS" height="50" width="auto"/>
                </div>
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">                  
                    <div class="panel-heading">
                        <h3 class="panel-title">Admin Login</h3>
                    </div>
                    <div class="panel-body">

                        <form role="form" action="index.php" method="post">
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Username" name="username" type="text" autofocus>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Password" name="password" type="password" value="">
                                </div>
                               
                                <!-- Change this to a button or input when using this as a form -->
                                
								<input name="login" type="submit" value="login" class="btn btn-lg btn-success btn-block">
                            </fieldset>
                        </form>
					</div>
                </div>
            </div>
        </div>
    </div>

     <!-- Core Scripts - Include with every page -->
    <script src="assets/plugins/jquery-1.10.2.js"></script>
    <script src="assets/plugins/bootstrap/bootstrap.min.js"></script>
    <script src="assets/plugins/metisMenu/jquery.metisMenu.js"></script>

</body>

</html>

<?php
  exit;
}
$_SESSION['username'] = $username;
$_SESSION['password'] = $password;

$sql = "SELECT * FROM personnel WHERE staffid = '$username' AND password = '$password'";
$result = mysql_query($sql) or die(mysql_error());

if (mysql_num_rows($result) == 0) {

  unset($_SESSION['username']);
  unset($_SESSION['password']); ?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KOJO MOTORS | ERP SYSTEM</title>
    <!-- Core CSS - Include with every page -->
    <link href="assets/plugins/bootstrap/bootstrap.css" rel="stylesheet" />
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href="assets/plugins/pace/pace-theme-big-counter.css" rel="stylesheet" />
   <link href="assets/css/style.css" rel="stylesheet" />
      <link href="assets/css/main-style.css" rel="stylesheet" />

</head>

<body class="body-Login-back" style="background: url(assets/img/bg2.jpg) no-repeat fixed; background-size:cover;">

    <div class="container">
       
        <div class="row">
            <div class="col-md-4 col-md-offset-4 text-center logo-margin ">
              <img src="assets/img/logo.png" alt="KOJO MOTORS" height="50" width="auto"/>
                </div>
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">                  
                    <div class="panel-heading">
                        <h3 class="panel-title">Admin Login</h3>
                    </div>
                    <div class="panel-body">

						<form role="form" action="index.php" method="post">
							<div class="alert alert-warning">Your username or password is incorrect.</div>
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Username" name="username" type="text" autofocus>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Password" name="password" type="password" value="">
                                </div>
                               
                                <!-- Change this to a button or input when using this as a form -->
                                
								<input name="login" type="submit" value="login" class="btn btn-lg btn-success btn-block">
                            </fieldset>
                        </form>
									</div>
                </div>
            </div>
        </div>
    </div>

     <!-- Core Scripts - Include with every page -->
    <script src="assets/plugins/jquery-1.10.2.js"></script>
    <script src="assets/plugins/bootstrap/bootstrap.min.js"></script>
    <script src="assets/plugins/metisMenu/jquery.metisMenu.js"></script>

</body>

</html>
<?php  
exit;
}
while($data = mysql_fetch_array($result)){
if(isset($_SESSION['name'])){}else{
$username = $data['staffid'];
$staffid = $data['staffid'];
$password = $data['password'];
$name = $data['surname']." ".$data['firstname'];

$department = $data['department'];
$picture = $data['picture'];
$designation = $data['designation'];
$staffid = $data['staffid'];

$_SESSION['username']= $username;
$_SESSION['password']= $password;
$_SESSION['name']= $name;

$_SESSION['department']= $department;
$_SESSION['picture']= $picture;
$_SESSION['designation']= $designation;

$expire=time()+60*60*12;
setcookie("username", $username, $expire, "/");
setcookie("password", $password, $expire,  "/");

}
}
?>
