<!--Name: Adam Romanowicz
    UserId: C00297492
    Date: 09/03/2025
    Description: Flag delete a customer
    Name: Delete
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
    var customerDetails = result.split('#'); //seperates each column with a comma
    document.getElementById("delid").value = customerDetails[0];
    document.getElementById("delsurname").value = customerDetails[1];
    document.getElementById("delfirstname").value = customerDetails[2];
    document.getElementById("deladdress").value = customerDetails[3];
    document.getElementById("deleircode").value = customerDetails[4];
    document.getElementById("delnumber").value = customerDetails[5];
    document.getElementById("deldob").value = customerDetails[6];
}

function confirmCheck() //function that asks you if you want to save changes
{
    var response;
    response = confirm('Are you sure you want to delete this person?'); //prompt that confirms if you want to delete
    if (response)
    {
        document.getElementById("delid").disabled = false; //input box is enabled
        document.getElementById("delsurname").disabled = false;
        document.getElementById("delfirstname").disabled = false;
        document.getElementById("deladdress").disabled = false;
        document.getElementById("deleircode").disabled = false;
        document.getElementById("delnumber").disabled = false;
        document.getElementById("deldob").disabled = false;
        return true;
    }
    else
    {
        populate();
        return false;
    }
}
</script>
 
 <!--Bottom Options-->
 <div class="bottom"> <!--Bottom background (input stuff here)-->
 <u><h2 style="text-align: center;">Delete a Customer</h2></u>
 <?php include 'listbox.php'; ?> <!--links to php file that grabs the data from database-->
  <br>
  <form name="deleteForm" action="delete_Customer.php" onsubmit="return confirmCheck()" method="post"> <!--form which when submitted goes to a function which asks the user if they want to submit and is saved with POST-->

    <p><label for="ID">Customer ID</label>
    <input type="text" name="delid" id="delid" disabled/>
    </p>

    <p><label for="Surname">Surname</label>
    <input type="text" name="delsurname" id="delsurname" placeholder = "Surname" autofocus pattern="[A-z ]{1-20}" disabled title="Letters and spaces only (Max 20 characters)" required/>
    </p>
    
    <p><label for="Firstname">First Name</label>
    <input type="text" name="delfirstname" id="delfirstname" placeholder = "First Name" pattern="[A-z ]{1-20}" disabled title="Letters and spaces only (Max 20 characters)" required/>
    </p>
    
    <p><label for="Address">Address</label>
    <input type="text" name="deladdress" id="deladdress" placeholder = "e.g The Square, Tullow" title="Letters, numbers, commas and spaces only (Max 100 characters)" pattern="[A-z0-9 ,]{1-100}" disabled/>
    </p>

    <p><label for="Eircode">Eircode</label>
    <input type="text" name="deleircode" id="deleircode" placeholder="e.g A65F4E2" title="7 characters. Capital letters (excluding 'O') and numbers only. First character must be a capital letter followed by 2 numbers then the remaining 4 characters can either be capital letters or numbers" pattern="[A-NP-Z]{1}[0-9]{2}[A-NP-Z0-9]{4}" required disabled/>
    </p>

    <p><label for="Number">Phone Number</label>
    <input type="text" name="delnumber" id="delnumber" placeholder = "e.g 083 4318183" title="Can include (), -, and spaces (Max 16, Min 8)"  pattern="[0-9 -()]{8,16}" required disabled/>
    </p>

    <p><label for="dob">Date of Birth  </label>
    <input type="date" name="deldob" id="deldob" required disabled/>
    </p>
    <br>
        
        <input type="submit"/>
        <input type="reset" value = "Clear" />
    
    <p>
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


        