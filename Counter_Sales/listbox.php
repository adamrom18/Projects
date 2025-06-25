<!--Name: Adam Romanowicz
    UserId: C00297492
    Date: 09/03/2025
    Description: Creates a select box and lists existing records into input boxes
    Name: Listbox
-->

<?php
include "../../Templates/db.inc1.php"; //database connection
date_default_timezone_set('UTC');

$sql = "SELECT StockID, Product, RetailPrice, Quantity FROM Stock WHERE DeleteFlag = false";

if (!$result = mysqli_query($con, $sql)) //error check
{
    die ('Error in querying the database' . mysqli_error($con));
}

echo "<br><select name = 'listbox' id = 'listbox' onclick = 'populate()'>"; //creates select button that allows you to choose which person to view the records of

while ($row = mysqli_fetch_array($result)) //grabs records from database
{
    $stock = $row['StockID'];
    $product = $row['Product'];
    $rprice = $row['RetailPrice'];
    $quant = $row['Quantity'];
    $allText = "$stock#$product#$rprice#$quant";
    echo "<option value = '$allText'>$product</option>"; //prints records
}
echo "</select>";
mysqli_close($con);

?>