<!DOCTYPE html>
<html>
<head>
<!--Name: Adam Romanowicz
    UserId: C00297492
    Date: 27/01/2025
    Description: Amends or views existing customer records
    Name: Amend_View_Customer
-->
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
     document.getElementById("amendid").value = customerDetails[0]; //saves amend variable as value from database
     document.getElementById("amendsurname").value = customerDetails[1];
     document.getElementById("amendfirstname").value = customerDetails[2];
     document.getElementById("amendaddress").value = customerDetails[3];
     document.getElementById("amendeircode").value = customerDetails[4];
     document.getElementById("amendnumber").value = customerDetails[5];
     document.getElementById("amenddob").value = customerDetails[6];
 }
 function toggleLock() //function to lock and unlock input boxes
 {
     if (document.getElementById("amendViewbutton").value == "Amend Details") //if button's text displays amend details
     {
         document.getElementById("amendsurname").disabled = false; //input box is enabled
         document.getElementById("amendfirstname").disabled = false;
         document.getElementById("amendaddress").disabled = false;
         document.getElementById("amendeircode").disabled = false;
         document.getElementById("amendnumber").disabled = false;
         document.getElementById("amenddob").disabled = false;
         document.getElementById("amendViewbutton").value = "View Details"; //button's text displays view details
     }
     else
     {
         document.getElementById("amendsurname").disabled = true; //input box is disabled
         document.getElementById("amendfirstname").disabled = true;
         document.getElementById("amendaddress").disabled = true;
         document.getElementById("amendeircode").disabled = true;
         document.getElementById("amendnumber").disabled = true;
         document.getElementById("amenddob").disabled = true;
         document.getElementById("amendViewbutton").value = "Amend Details"; //button's text displays amend details
     }
 }
 function confirmCheck() //function that asks you if you want to save changes
 {
     var response;
     response = confirm('Are you sure you want to amend this customer?'); //prompt that confirms if you want to save
     if (response)
     {
         document.getElementById("amendid").disabled = false; //input box is enabled
         document.getElementById("amendsurname").disabled = false;
         document.getElementById("amendfirstname").disabled = false;
         document.getElementById("amendaddress").disabled = false;
         document.getElementById("amendeircode").disabled = false;
         document.getElementById("amendnumber").disabled = false;
         document.getElementById("amenddob").disabled = false;
         confirmAll(response); 
     }
     else
     {
         populate();
         toggleLock();
         return false;
     }

 function confirmAll(con) //prevents submittion if date of birth is after today (importing the file causes the functions within it to be ignored and does not function
                            //thats why i have repeating code here)
 {
    if (con == false)
        {
             event.preventDefault();
        }
    else if (birth() == true)
        {
            alert("Date of birth is after today");
			 event.preventDefault();
        }
 }

function birth() //calculates and determines if date inputted if after today
{
    var today = new Date()
    var birth = new Date(document.getElementById("amenddob").value)
    var inputDay = birth.getDate()
    var inputMonth = birth.getMonth()
    var inputYear = birth.getFullYear()
    var currentDay = today.getDate()
    var currentMonth = today.getMonth()
    var currentYear = today.getFullYear()

    if (inputYear == currentYear && inputMonth == currentMonth && inputDay == currentDay)
        {
            return false
        }
    else if (today > birth)
        {
            return false
        }
    else if (today < birth)
        {
            return true
        }
}
}
 </script>
 <!--Bottom Options-->
 <div class="bottom"> <!--Bottom background (input stuff here)-->
 <u><h2 style="text-align: center;">Amend/View Customer</h2></u>
 <?php include 'listbox.php'; ?> <!--links to php file that grabs the data from database-->
  <br>
  <input type = "button" value = "Amend Details" id = "amendViewbutton" onclick = "toggleLock()"> <!--button to enable input boxes-->
  <form action="Amend_View_Customer.php" method="POST"> <!--Send form input into php using POST method which doesnt save input in url-->

    <p><label for="ID">Customer ID</label>
    <input type="text" name="amendid" id="amendid" disabled/>
    </p>

    <p><label for="Surname">Surname</label>
    <input type="text" name="amendsurname" id="amendsurname" placeholder = "Surname" autofocus pattern="[A-z ]{1-20}" disabled title="Letters and spaces only (Max 20 characters)" required/>
    </p> <!--Pattern should only allow letters and spaces yet it still allows hashtags which end up breaking the split('#') to fill in the input boxes-->
    
    <p><label for="Firstname">First Name</label>
    <input type="text" name="amendfirstname" id="amendfirstname" placeholder = "First Name" pattern="[A-z ]{1-20}" disabled title="Letters and spaces only (Max 20 characters)" required/>
    </p>
    
    <p><label for="Address">Address</label>
    <input type="text" name="amendaddress" id="amendaddress" placeholder = "e.g The Square, Tullow" title="Letters, numbers, commas and spaces only (Max 100 characters)" pattern="[A-z0-9 ,]{1-100}" disabled/>
    </p>

    <p><label for="Eircode">Eircode</label>
    <input type="text" name="amendeircode" id="amendeircode" placeholder="e.g A65F4E2" title="7 characters. Capital letters (excluding 'O') and numbers only. First character must be a capital letter followed by 2 numbers then the remaining 4 characters can either be capital letters or numbers" pattern="[A-NP-Z]{1}[0-9]{2}[A-NP-Z0-9]{4}" required disabled/>
    </p>

    <p><label for="Number">Phone Number</label>
    <input type="text" name="amendnumber" id="amendnumber" placeholder = "e.g 083 4318183" title="Can include (), -, and spaces (Max 16, Min 8)"  pattern="[0-9 -()]{8,16}" required disabled/>
    </p>

    <p><label for="dob">Date of Birth  </label>
    <input type="date" name="amenddob" id="amenddob" required disabled/>
    </p>
    <br>
        
        <input type="submit" onclick="confirmCheck()"/>
        <input type="reset" value = "Clear" />
    
    <p>
    </form>

</div>
<?php include '../../Templates/Template.html.php' ?> <!--Links template to page-->
<style> /* Overwrites certain elements from external template css */
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

