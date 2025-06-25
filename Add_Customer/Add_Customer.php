<!-- Name: Adam Romanowicz
     UserId: C00297492
     Date: 17/02/2025
     Description: Saves data inputted into the database as a record
-->

<?php 
include '../../Templates/db.inc1.php'; //Link the php which connects to the database

$sql = "Insert into Customer (Surname,FirstName,DateOfBirth,PhoneNumber,Address,Eircode) 
VALUES ('$_POST[surname]','$_POST[firstname]','$_POST[dob]','$_POST[number]','$_POST[address]','$_POST[eircode]')"; //inserts inputs into database

if (!mysqli_query($con,$sql)) //if query is invalid
{
    die ("An Error in the SQL Query: " . mysqli_error($con) ); //prints error
}
echo "<br>A record has been added for " . $_POST['firstname'] . " " . $_POST['surname'] . "."; //prints name 

mysqli_close($con); //closes database

header( 'Location: Add_Customer.html.php ');
?>

