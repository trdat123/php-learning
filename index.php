<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>SignUpForm</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <h1>Sign Up</h1>
<form action="asd.php" method="POST">
  <div>

  <?php
    if (isset($_GET['first'])) {
      $first = $_GET['first'];
      echo '<input type="text" name="first" placeholder="First Name" value="'.$first.'"><br>';
    } else {
      echo '<input type="text" name="first" placeholder="First Name"><br>';
    }

    if (isset($_GET['last'])) {
      $last = $_GET['last'];
      echo '<input type="text" name="last" placeholder="Last Name" value="'.$last.'"><br>';
    } else {
      echo '<input type="text" name="last" placeholder="Last Name"><br>';
    }
  ?>
  
  <input type="text" name="email" placeholder="E-mail">
  <br>

  <?php
    if (isset($_GET['user'])) {
      $user = $_GET['user'];
      echo '<input type="text" name="username" placeholder="First Name" value="'.$user.'"><br>';
    } else {
      echo '<input type="text" name="username" placeholder="First Name"><br>';
    }
  ?>

  <input type="password" name="password" placeholder="Password">
  <br>
  <button type="submit" name="submit">Sign Up</button>
  </div>
</form>

<?php
  $fullUrl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
  
  if (strpos($fullUrl, "SignupEmpty") == true) {
    echo "<p class='error'>You did not fill in all field!</p>";
    exit();
  }

  elseif (strpos($fullUrl, "SignUpCharError") == true) {
    echo "<p class='error'>Invalid charater!</p>";
    exit();
  }

  elseif (strpos($fullUrl, "SignUpEmailError") == true) {
    echo "<p class='error'>Invalid E-mail!</p>";
    exit();
  }

  elseif (strpos($fullUrl, "SignupSuccess") == true) {
    echo "<p class='success'>Sign Up Success!</p>";
    exit();
  }
?>

</body>
</html> 

 
