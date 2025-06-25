<!--Name: Adam Romanowicz
    UserId: C00297492
    Date: 27/01/2025
    Description: Updates database with new records
    Name: Amend_View_Customer
-->

<?php
include '../../Templates/db.inc1.php'; //links to php which connects to database

date_default_timezone_set('UTC'); //sets default timezone as utc 
$dbDate = date("Y-m-d", strtotime($_POST['amenddob'])); //grabs dob from form and formats it 

$sql = "UPDATE Customer SET Surname = '$_POST[amendsurname]',
        FirstName = '$_POST[amendfirstname]',
        DateOfBirth = '$dbDate',
        PhoneNumber = '$_POST[amendnumber]',
        Address = '$_POST[amendaddress]',
        Eircode = '$_POST[amendeircode]'
        WHERE CustomerID = '$_POST[amendid]'"; //sql statement which updates the database from inputs

if (!mysqli_query($con,$sql)) //if query is invalid
{
    die ("An Error in the SQL Query: " . mysqli_error($con) ); //prints error
}

mysqli_close($con); //closes database
header( 'Location: Amend_View_Customer.html.php');

?>
