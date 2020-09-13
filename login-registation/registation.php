<?php
include_once 'inc/header.php';
include 'lib/users.php';

?>
<?php
$user=new user();
if ($_SERVER['REQUEST_METHOD']=='POST'&&isset($_POST['registation'])) {
  $reg=$user->registation($_POST);
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>login form</title>
</head>

<div class="container">
  <?php
  if(isset($reg))
  {
    echo $reg;
  }
  ?>
<body>
<form action="" method="post">
    <div class="card-body">
    	<div class="form-group">
      <label for="usr">Name:</label>
      <input type="text" class="form-control" id="usr" name="name">
    </div>
    <div class="form-group">
      <label>Email</label>
      <input type="email" class="form-control" name="email">
    </div>
    <div class="form-group">
      <label for="pwd">Password:</label>
      <input type="password" class="form-control" id="pwd" name="password">
    </div>
    <button type="submit" class="btn btn-primary" name="registation">Submit</button>
    </div>
</form>
</div>
</body>
</html>