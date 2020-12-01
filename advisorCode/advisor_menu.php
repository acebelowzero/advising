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

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>CS 4342 Advisor Menu</title>

    <!-- Bootstrap CSS library https://getbootstrap.com/ -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

</head>

<body>
    <!-- Displaying a menu for CRUD operations in Student table -->
    <div class="container">
        <h1>Advisor Menu: </h1>

        <a href="advisor_times.php">Create Advisor Schedule</a><br>
        <a href="view_advisor.php">View, Modify, and Delete Advisor Schedule</a><br>
        <h3>Appointments: </h3>
        <?php
        $ADid = $_COOKIE["USER_ID"];
        $sql = "SELECT * FROM appointments where ADid = $ADid";
        if ($result = $conn->query($sql)) {
        ?>
            <table class="table" width=50%>
                <thead>
                    <td> Day</td>
                    <td> Time </td>
                </thead>
                <tbody>
                    <?php
                    while ($row = $result->fetch_row()) {
                    ?>
                        <tr>
                            <td><?php printf("%s", $row[1]); ?></td>
                            <td><?php printf("%s", $row[2]); ?></td>
                            <td><a href="update_advisor_interface.php?Sid=<?php echo $row[0] ?>">Update</a></td>
                            <td><a href="delete_advisor.php?Sid=<?php echo $row[0] ?>">Delete</a></td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        <?php
        }
        ?>


    </div>

    <!-- jQuery and JS bundle w/ Popper.js -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

</body>

</html>