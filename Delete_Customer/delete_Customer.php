<!--Name: Adam Romanowicz
    UserId: C00297492
    Date: 09/03/2025
    Description: Flag delete a customer
    Name: Delete_Customer
-->

<?php session_start();?>
<?php
include '../../Templates/db.inc1.php';

$sql = "UPDATE Customer SET Deleteflag = true WHERE CustomerID = '$_POST[delid]'";

if (!mysqli_query($con,$sql))
{
    echo "Error ".mysqli_error($con);
}
//Set session variables
$_SESSION["customerid"] = $_POST['delid'];
$_SESSION["surname"] = $_POST['delsurname'];
$_SESSION["firstname"] = $_POST['delfirstname'];
$_SESSION["address"] = $_POST['deladdress'];
$_SESSION["eircode"] = $_POST['deleircode'];
$_SESSION["number"] = $_POST['delnumber'];
$_SESSION["dob"] = $_POST['deldob'];

mysqli_close($con);
//header('Location: delete.html.php');
//exit();
?>
<script>
    window.location = "Delete_Customer.html.php";
</script>