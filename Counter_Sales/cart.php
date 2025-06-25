<!--Name: Adam Romanowicz
    UserId: C00297492
    Date: 09/03/2025
    Description: Counter Sales cart system
    Name: cart
-->

<?php session_start();?>
<?php include '../../Templates/db.inc1.php'; //connect to database

$product_id = $_POST['stock']; //saves stockid input as variable
$quantity = $_POST['pquan']; //saves purchase quantity as variable 
$sql = "SELECT (Quantity) FROM Stock WHERE StockID = '$product_id'"; //grabs quantity from stock table 
if (!$result = mysqli_query($con, $sql)) //error check
     {
         die ('Error in querying the database' . mysqli_error($con));
     }
 while ($row = mysqli_fetch_array($result)) //grabs quantity
     {
         $Squan = $row['Quantity'];
     }

if ($product_id && $quantity > 0 && $Squan >= $quantity) //checks if something was inputted and checks if stock quantity is bigger or equal to quantity inputted
{
    if (isset($_SESSION['cart']) && is_array($_SESSION['cart'])) //checks if cart session variable has an array inside it
    {
        if (array_key_exists($product_id, $_SESSION['cart']) && $_SESSION['cart'][$product_id] <= $Squan) // Product exists in cart so just update the quantity
            {
                $_SESSION['cart'][$product_id] += $quantity;
            } 
        else // Product is not in cart so add it
            {
                $_SESSION['cart'][$product_id] = $quantity;
            }
    } 
    else 
    {
        $_SESSION['cart'] = array($product_id => $quantity); // There are no products in cart, this will add the first product to cart
    }
}

if (isset($_SESSION['cart']) && is_array($_SESSION['cart'])) //checks if cart session variable has an array inside it
{
    $subtotal = 0.00;
    $total = 0.00;
    $price = 0.00;
    $products_in_cart = $_SESSION['cart'];
    foreach ($products_in_cart as $product => $quan) //goes through each entry in array
        {
            $sql = "SELECT (RetailPrice) FROM Stock WHERE StockID = '$product'"; //grabs retail price from stock table
            if (!$result = mysqli_query($con, $sql)) //error check
                {
                    die ('Error in querying the database' . mysqli_error($con));
                }
            while ($row = mysqli_fetch_array($result)) //grabs records from database
                {
                    $price = $row['RetailPrice'];
                }
            $subtotal = $quan * $price;
            $total = $total + $subtotal;
        }
    $_SESSION['total'] = $total; //stores total price in a session variable
}

?>
<script>
    window.location = "Counter_Sales.html.php";
</script>