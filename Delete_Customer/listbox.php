<!--Name: Adam Romanowicz
    UserId: C00297492
    Date: 09/03/2025
    Description: Creates a select box and lists existing records into input boxes
    Name: Listbox
-->

<?php
include '../../Templates/db.inc1.php'; //database connection
date_default_timezone_set('UTC'); 

$sql = "SELECT CustomerID, Surname, FirstName, DateOfBirth, Address, Eircode, PhoneNumber FROM Customer where DeleteFlag = 0";

if (!$result = mysqli_query($con, $sql)) //error check
{
    die ('Error in querying the database' . mysqli_error($con));
}

echo "<br><select name = 'listbox' id = 'listbox' onclick = 'populate()'>"; //creates select button that allows you to choose which person to view the records of

while ($row = mysqli_fetch_array($result)) //grabs records from database
{
    $id = $row['CustomerID'];
    $sname = $row['Surname'];
    $fname = $row['FirstName'];
    $dateofBirth = $row['DateOfBirth'];
    $dob = date_create($row['DOB']);
    $dob = date_format($dob,"Y-m-d");
    $address = $row['Address'];
    $eircode = $row['Eircode'];
    $number = $row['PhoneNumber'];
    $allText = "$id#$sname#$fname#$address#$eircode#$number#$dob";
    echo "<option value = '$allText'>$fname $sname</option>"; //prints records
}
echo "</select>";
mysqli_close($con);

?>