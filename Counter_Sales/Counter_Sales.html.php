<!--Name: Adam Romanowicz
    UserId: C00297492
    Date: 09/03/2025
    Description: Counter Sales cart system form
    Name: Counter_Sales
-->

<?php session_start(); ?> <!--Session is started allowing session variables to be stored-->

<html>

<head>
<title>Riverbridge Pharmacy</title>
</head>

<body>

<script>

function populate() //function to fill in input boxes with selected person's data
{
    var sel = document.getElementById("listbox"); //box that contains entry options of what person to view
    var result;
    result = sel.options[sel.selectedIndex].value; //adds options in selected person box allowing you to pick which entry to view
    var counterDetails = result.split('#'); //seperates each column with a comma
    document.getElementById("stock").value = counterDetails[0];
    document.getElementById("product").value = counterDetails[1];
    document.getElementById("retail").value = counterDetails[2];
    document.getElementById("quantity").value = counterDetails[3];
}

function confirmCheck() //function that asks you if you want to save changes
{
    var response;
    response = confirm('Are you want to add this item(s) to cart?'); //prompt that confirms if you want to add items to cart
    if (response)
    {
        document.getElementById("stock").disabled = false;
        document.getElementById("product").disabled = false; //input box is enabled
        document.getElementById("retail").disabled = false;
        document.getElementById("quantity").disabled = false;
        return true;
    }
    else
    {
        populate();
        return false;
    }
}

function confirmCheckOrder() //function that asks you if you want to save changes
{
    var response;
    response = confirm('Are you want to place an order?'); //prompt that confirms if you want to order
    if (response)
    {
        return true;
    }
    else
    {
        return false;
    }
}

</script>
 
 <!--Bottom Options-->
 <div class="bottom"> <!--Bottom background (input stuff here)-->
 <u><h2 style="text-align: center;">Counter Sales</h2></u>
 <?php include 'listbox.php'; ?> <!--links to php file that grabs the data from database-->
  <br>
  <form name="counterForm" action="cart.php" onsubmit="return confirmCheck()" method="post"> <!--form which when submitted goes to a function which asks the user if they want to submit and is saved with POST-->

    <p><label for="stock">StockID</label>
    <input type="text" name="stock" id="stock" required disabled/>
    </p>

    <p><label for="Product">Product</label>
    <input type="text" name="product" id="product" required disabled/>
    </p>

    <p><label for="Retail">Retail Price</label>
    <input type="text" name="retail" id="retail" required disabled/>
    </p>
    
    <p><label for="Quantity">Stock Quantity</label>
    <input type="text" name="quantity" id="quantity" required disabled/>
    </p>

    <p><label for="Pquan">Purchase Quantity</label>
    <input type="number" name="pquan" id="pquan" required title="Numbers only" value="1" min="1" pattern="{1-5}"/>
    </p>

    <br>
        
        <input type="submit" value="Add to Cart"/>
        <input type="reset" value = "Clear"/>
    <p>
    </form>
    
    <form name="orderForm" action="order.php" method="post" onsubmit="return confirmCheckOrder()">
        <?php 
            if (!ISSET($_SESSION['total']))
                {
                    $sub = 0;
                }
            else 
                {
                    $sub = $_SESSION['total'];
                }
            echo ("<p><label for='subtotal'>Subtotal</label>
                    <input type='number' name='sub' id='sub' value='$sub' disabled>");
        ?>
        <input type="submit" value="Place Order"/>
    </form>

</div>
<?php include '../../Templates/Template.html.php' ?> <!--Links template to page-->
<style>
body {
    background-image: linear-gradient(to bottom, #65fc6c 0%, #65fc6c 19%, black 19%, black 19.9%, white 19.9%, white 100%);
    min-height: 145vh;
    }
div.bottom { /*background around form*/
    flex-direction: column;
    align-items: center;
    top: 31.5%;
    }
div.logout {
    top: -14px;
}
</style>
</body>
</html>


        