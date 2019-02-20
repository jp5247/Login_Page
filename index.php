<?php
include_once "connect.php";
if(isset($_POST['submit'])){
  $email = $_POST['Email_Address'];
  $password = $_POST['Password'];
  $flag = 0;
  if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
    echo "<script> alert('Email-id incorrect') </script>";
    $flag = 1;
  }
  if(!preg_match('/[A-Za-z]{1,5}[@]{1}[0-9]{1,4}/', $password)){
    echo "<script> alert('password incorrect') </script>";
    $flag = 1;
  }
  if(!$flag){
    $query = "select * from login where Email_id = '$email' ";
    echo "$email  $password";
    $result = mysqli_query($conn,$query);

    if(!$result){
      echo "<script> alert('NonAuthorized email') </script>";
      echo "<script> window.location.href = 'index.php'</script>";
    } 
    else{ 
      $row = mysqli_fetch_assoc($result);
      if($row['Password'] == $password){
        session_start();
        $_SESSION['email'] = $email;
        $_SESSION['password'] = $password;
        echo "<script> window.location.href = 'welcome.php'</script>";
      }
      else echo "<script> alert('incorrect password') </script>";
    }
  }
  echo "<script> window.location.href = 'index.php'</script>"; 
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" type="text/css" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css">
  </head>
  <body>
<div class="login-box">
  <h1>Login</h1>
  <form action="" method="post">
  <div class="textbox">
    <i class="fas fa-user"></i>
    <input type="text" name="Email_Address" placeholder="Username">
  </div>

  <div class="textbox">
    <i class="fas fa-lock"></i>
    <input type="password" name="Password" placeholder="Password">
  </div>

  <input type="submit" class="btn" value="Sign In" name="submit">
</div>
</form>
  </body>
</html>
