<!--
/**
 * CS 4342 Database Management
 * @author Instruction team Spring and Fall 2020 with contribution from L. Garnica
 * @version 2.0
 * Description: The purpose of these file is to provide PhP basic elements for an interface to access a DB. 
 * Resources: https://getbootstrap.com/docs/4.5/components/alerts/  -- bootstrap examples
 * Include your name here - ex. Modified by Villanueva for Assignment 2
 */
-->

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>CS 4342 User Login</title>

  <!-- Bootstrap CSS library https://getbootstrap.com/ -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

</head>

<body>
  <div style="margin-top: 20px" class="container">

    <h1>User Login</h1>
    <form action="index.php" method="post">
      <div class="form-group">
        <label for="username">User Name</label>
        <input class="form-control" type="text" id="username" name="username">
      </div>
      <div class="form-group">
        <label for="password">Password</label>
        <input class="form-control" type="password" id="password" name="password">
      </div>
      <div class="form-group">
        <input class="btn btn-primary" name='Submit' type="submit" value="Submit">
      </div>
    </form>
    <a href="create_user.php">Don't have an account? Create one now!</a><br><br>

  </div>

  <!-- jQuery and JS bundle w/ Popper.js -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>


</body>

</html>


<?php

session_start();
require_once("config.php");
$_SESSION['logged_in'] = false;

if (!empty($_POST)) {
  if (isset($_POST['Submit'])) {

    $input_username = isset($_POST['username']) ? $_POST['username'] : " ";
    $input_password = isset($_POST['password']) ? $_POST['password'] : " ";
    $resultUser = NULL;
    if ($input_username[0] == "7") {
      //header("Location: studentsCode/student_menu.php");
      $queryUser = "SELECT * FROM Admin WHERE Aid='" . $input_username . "' AND Password='" . $input_password . "';";
      $resultUser = $conn->query($queryUser);
      echo ("you are a admin");
    } else if ($input_username[0] == "8") {
      $queryUser = "SELECT * FROM Student WHERE Sid='" . $input_username . "' AND Password='" . $input_password . "';";
      $resultUser = $conn->query($queryUser);
    }else if ($input_username[0] == "9") {
      $queryUser = "SELECT * FROM Advisor WHERE ADid='" . $input_username . "' AND Password='" . $input_password . "';";
      $resultUser = $conn->query($queryUser);
    }else {
      echo "Nothing was entered ";
    }

    if ($resultUser->num_rows > 0) {
      //if there is a result, that means that the user was found in the database
      $_SESSION['user'] = $input_username;
      $_SESSION['logged_in'] = true;

      echo "Session logged_in is: " . $_SESSION['logged_in'];

      // You can comment the next line (header) to check if the user was successfully logged in. 
      // But it will not redirect to the student_menu file automatically.
      if ($input_username[0] == "7") {
        //header("Location: studentsCode/student_menu.php");
        echo ("you are a admin");
      } else if ($input_username[0] == "8") {
        echo ("student");
        header("Location: studentsCode/student_schedule.php");
      } else if ($input_username[0] == "9") {
        echo ("you are a advisor");
      } else {
        echo ("student does not exist");
      }
    }
    die();
  }
}
?>