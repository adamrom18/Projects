<!--Name: Adam Romanowicz
    UserId: C00297492
    Date: 09/03/2025
    Description: Counter Sales cart system table update
    Name: order
-->

<?php session_start();?>
<?php
include '../../Templates/db.inc1.php'; //Link the php which connects to the database

$currentDate = date('Y-m-d');
$currentTime = date("H:i:s");

$sql = "INSERT INTO CounterSales (Date,Time) VALUES ('$currentDate','$currentTime')"; //inserts current date and time and creates a new entry in table
if (!mysqli_query($con,$sql)) //if query is invalid
{
    die ("An Error in the SQL Query: " . mysqli_error($con)); //prints error
}

$sql = "SELECT (CounterID) FROM CounterSales ORDER BY CounterID DESC LIMIT 1;"; //grabs the last/newest entry in table
if (!$result = mysqli_query($con, $sql)) //error check
{
    die ('Error in querying the database' . mysqli_error($con));
}
while ($row = mysqli_fetch_array($result)) //grabs records from database
{
    $counter = $row['CounterID'];
}

if (isset($_SESSION['cart']) && is_array($_SESSION['cart'])) //checks if cart session variable has an array inside it
{
    $products_in_cart = $_SESSION['cart'];
    foreach ($products_in_cart as $product => $quan) //goes through each entry in array
        {
           $sql = "INSERT INTO CounterSalesItems (CounterID,StockID,Quantity) VALUES ('$counter','$product','$quan')"; //enters the counterid, stockid and quantity purchased into table
           if (!mysqli_query($con,$sql)) //if query is invalid
            {
                die ("An Error in the SQL Query: " . mysqli_error($con)); //prints error
            }
        }
}

if (isset($_SESSION['cart']) && is_array($_SESSION['cart'])) //checks if cart session variable has an array inside it
{
    $products_in_cart = $_SESSION['cart'];
    foreach ($products_in_cart as $product => $quan) //goes through each entry in array
        {
           $sql = "SELECT (Quantity) FROM Stock WHERE StockID = '$product'"; //grabs quantity from stock table 
           if (!$result = mysqli_query($con, $sql)) //error check
                {
                    die ('Error in querying the database' . mysqli_error($con));
                }
            while ($row = mysqli_fetch_array($result)) //grabs records from database
                {
                    $quantity = $row['Quantity'];
                }
            $quanUpdate = $quantity - $quan;

            $sql = "UPDATE Stock SET Quantity = '$quanUpdate' WHERE StockID = '$product'"; //update stock quantity in stock table
            if (!mysqli_query($con,$sql)) //if query is invalid
                {
                    die ("An Error in the SQL Query: " . mysqli_error($con) ); //prints error
                }
        }   
}

session_destroy(); //destroys all session variables to reset cart
?>
<script>
    window.location = "Counter_Sales.html.php";
</script>

