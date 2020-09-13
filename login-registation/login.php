
<?php
include_once 'inc/header.php';
include'lib/users.php';
?>
<?php
$user=new user();
if ($_SERVER['REQUEST_METHOD']=='POST'&&isset($_POST['log'])) {
  $log=$user->login($_POST);
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>login form</title>
</head>
<div class="container">
<body>
  <h2><a href=""></a> </h2>
<form action="" method="post">
    <div class="form-group">
      <label for="usr">Email:</label>
      <input type="email"  class="form-control form-control-sm"  id="usr" name="email">
    </div>
    <div class="form-group">
       <label for="pwd">Password:</label>
       <input type="password"  class="form-control form-control-sm"id="pwd" name="password">
    </div>
    <button type="submit" name="log" class="btn btn-primary">Submit</button>
</form>
</body>
</div>
</html>