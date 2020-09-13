<?php
include_once 'inc/header.php';
include_once 'lib/Session.php';
include 'lib/users.php';
//Session::inti();
//Session::checkLogin();
?>
<?php
$mag=Session::get('loginmsg');
if(isset($mag))
{
  echo $mag;

}

Session::set("loginmsg",NULL); 

?>

<!DOCTYPE html>
<html lang="en">
<div class="container">
  <h2> <?php
  $name=Session::get('name');
  if (isset($name)) {
    echo $name;
  }
  
  ?></h2>
  <table class="table table-hover">
    <thead>
      <tr>
        <th>Name</th>
         <th>Id</th>
      </tr>
      <?php
    $user=new user();
   // $reg=$user->registation($_POST);
    $res=$user->GetData();
    foreach ($res as $data) {
    ?>
    </thead>
    <tr>
      <td><?php echo $data['name'];?></td>
      <td><?php echo $data['email'];?></td>
      <td>
        <a href="<?php?>"class="btn btn-info">view</a>
      </td>
    </tr>
<?php } ?>
  </table>

</body>
</html>
