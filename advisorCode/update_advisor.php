<!--
/**
 * CS 4342 Database Management
 * @author Instruction team Spring and Fall 2020 with contribution from L. Garnica
 * @version 2.0
 * Description: The purpose of these file is to provide PhP basic elements for an interface to access a DB. 
 * Resources: https://getbootstrap.com/docs/4.5/components/alerts/  -- bootstrap examples
 *
 */
-->

<?php

// Accessing the information for the DB connection from the configuration file and validating that a user is logged in.
session_start();
require_once('../config.php');
require_once('../validate_session.php');

if (isset($_POST['ADid'])){

    $ADid = isset($_POST['ADid']) ? $_POST['ADid'] : " ";
    $firstName = isset($_POST['first_name']) ? $_POST['first_name'] : " ";
    
    $lastName = isset($_POST['last_name']) ? $_POST['last_name'] : " ";

    $query = "UPDATE Advisor SET ADFirstName='$firstName', ADLastName='$lastName' WHERE ADid = $ADid";
    echo $query;

    if (mysqli_query($conn, $query)) {
        echo "Record updated successfully";
        header("Location: view_advisor.php");
      } else {
        echo "Error updating record: " . mysqli_error($conn);
      }

}
else {
  echo "No advisor id received on request at update advisor";
  die();
}

?>