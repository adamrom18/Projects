<!DOCTYPE html>
<html>
<head>
<!--Name: Adam Romanowicz
    UserId: C00297492
    Date: 27/01/2025
    Description: Add Customer screen to add customer records into database
    Name: Add_Customer -->

   <title>Riverbridge Pharmacy</title>
</head>
<body>

<script src="confirm.js"></script>

 <!--Bottom Options-->
 <div class="bottom"> <!--Bottom background (input stuff here)-->
  <form action="Add_Customer.php" method="POST"> <!--Send form input into php using POST method which doesnt save input in url-->
    <u><h2 style="text-align: center;">Add A Customer</h2></u>

    <p><label for="Surname">Surname</label>
    <input type="text" name="surname" id="surname" placeholder = "Surname" autofocus pattern="[A-z ]{1-20}" title="Letters and spaces only (Max 20 characters)" required/>
    </p>
    
    <p><label for="Firstname">First Name</label>
    <input type="text" name="firstname" id="firstname" placeholder = "First Name" pattern="[A-z ]{1-20}" title="Letters and spaces only (Max 20 characters)" required/>
    </p>
    
    <p><label for="Address">Address</label>
    <input type="text" name="address" id="address" placeholder = "e.g The Square, Tullow"  title="Letters, numbers, commas and spaces only (Max 100 characters)" pattern="[A-z0-9 ,]{1-100}"/>
    </p>

    <p><label for="Eircode">Eircode</label>
    <input type="text" name="eircode" id="eircode" placeholder="e.g A65F4E2" title="7 characters. Capital letters (excluding 'O') and numbers only. First character must be a capital letter followed by 2 numbers then the remaining 4 characters can either be capital letters or numbers" pattern="[A-NP-Z]{1}[0-9]{2}[A-NP-Z0-9]{4}" required/>
    </p>

    <p><label for="Number">Phone Number</label>
    <input type="text" name="number" id="number" placeholder = "e.g 083 4318183" title="Can include digits, (), -, and spaces (Max 16, Min 8)"  pattern="[0-9 -()]{8,16}" required/>
    </p>

    <p><label for="dob">Date of Birth  </label>
    <input type="date" name="dob" id="dob" required/>
    </p>
    <br>
        
        <input type="submit" onclick="confirmCheck()"/>
        <input type="reset" value = "Clear" />
    
    <p>
    </form>
 </div>
<?php include '../../Templates/Template.html.php' ?>
<style>
body {
    background-image: linear-gradient(to bottom, #65fc6c 0%, #65fc6c 23.3%, black 23.3%, black 24.4%, white 24.4%, white 100%);
    min-height: 117vh; 
    }
div.logout {/*logout box*/
    top: -15px;
    }
div.bottom { /*background around form*/
    top: 31.1%;
}
</style>
</body>

</html>
