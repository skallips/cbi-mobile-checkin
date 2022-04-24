<?php
    session_start();
    
    $_SESSION["selectedRes"] = $_POST['resButton'];
    //echo $_SESSION["selectedRes"];

?>

<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="/css/cbistylesheet.css">
        <script>function validateForm() {
            var x = document.forms["acknowledgeForm"]["fName"].value;
            var y = document.forms["acknowledgeForm"]["lName"].value;
            var z = document.forms["acknowledgeForm"]["acknowledgeCheck"].checked;
        
            if (x == "" || x == null) {alert("First name must be filled out"); return false;}
            if (y == "" || y == null) {alert("Last name must be filled out"); return false;}
            if (z == false) {alert("Please acknowledge resort policies to proceed."); return false;}
        }</script>
    </head>

    <body>
        <p style="text-align:center"><img src="New_logo.JPG" alt="CBI Logo" width="50%" height="50%"></p>
        <div id="header">
            <h1 class="headerText">Resort Policies Review</h1>
        </div>
        <div class="middle">
            <h2 class="itemText">Parking</h2><p class="regularText">All reservations are allowed only one vehicle in the garage.
                  A valid non-expired parking permit must be visibly placed on the dashboard at all times
                  or vehicle will be towed at guests expense.  Parking violations may result in charges
                  of $500/incident.</p><br>
            <h2 class="itemText">Smoking</h2><p class="regularText">The Carlsbad Inn is a non smoking property.  Smoking is not permitted
                in any areas including rooms and patios/balconies.  Smoking in rooms will result in a
                $250 cleaning fee.</p><br>
            <h2 class="itemText">Pets</h2><p class="regularText">The Carlsbad Inn is does not accept pets.  Any violations on
                property will result in a $150 cleaning fee plus additional costs for damages.</p><br>
            <h2 class="itemText">Room Occupancy</h2><p class="regularText">Guests exceeding occupancy will be charged $250 per day, per
                person over occupancy.  Room occupancies are as follows:<br><br>
                1 Bedroom / 4 persons<br>
                1 Bedroom-6 / 6 persons<br>
                2 Bedroom / 6 persons<br>
                Hotel King Studio / 2 persons<br>
                Hotel Double Queen / 4 persons<br>
                Hotel Suites / 4 persons<br></p><br>
            <h2 class="itemText">Check Out</h2><p class="regularText">Check out time is 11:00am.  A late check out fee will be
                applied if unit is not vacated by the checkout time.</p><br>
            <h2 class="itemText">Resort Fee</h2><p class="regularText">The Carlsbad Inn assesses a nightly resort fee of $20 plus
                taxes for applicable reservations. (Carlsbad Inn HOA Owners are exempt from paying
                an additional Resort Fee).</p><br>
        </div>    
        <div style="text-align:center;">
            <form name="acknowledgeForm" onsubmit="return validateForm()" action="receipt1.php" method="post" required>
                
                <p class="popText">I have reviewed the resort policies and acknowledge.</p>
                <p style="text-align:center;"><input type="checkbox" name="acknowledgeCheck" class="textAreaCenter" ></p><br> 
                
                <p class="regularText">Your First Name:</p><input type="textbox"  name="fName" class="textArea"><br>
                <p class="regularText">Your Last Name:</p> <input type="textbox"  name="lName" class="textArea"><br><br>
                <input type="submit" value="Proceed" style="color:white; background-color:#3c7480; font-family: Segue UI, Arial; font-size: 3.5em; border:none; padding:20px"> <br><br>
            </form>
            <br><br>
        </div>
        <footer>
             &copy Carlsbad Inn Beach Resort<br><br>  
              <a href="https://carlsbadinn.com" style="color:white">General Website</a><br><br>
              <a href="https://carlsbadinn.com/privacy-policy" style="color:white">Privacy Policy</a>
        </footer>
    </body>
</html>