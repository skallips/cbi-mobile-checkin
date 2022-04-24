<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="/css/cbistylesheet.css">
        <script>function validateForm() {
            var x = document.forms["searchForm"]["fName"].value;
            var y = document.forms["searchForm"]["lName"].value;
            var z = document.forms["searchForm"]["termsCheck"].checked;
        
            if (x == "" || x == null) {alert("First name must be filled out"); return false;}
            if (y == "" || y == null) {alert("Last name must be filled out"); return false;}
            if (z == false) {alert("Please acknowledge terms and conditions to proceed."); return false;}
        }</script>
    </head>

    <body>
        <p style="text-align:center"><img src="New_logo.JPG" alt="CBI Logo" width="50%" height="50%"></p>
        <div id="header">
            <h1 class="headerText">Mobile Pre-Check In</h1>
        </div>
        <div class="middle">
            <p style="text-align:center;"><p class="popText">Hmm, it looks like we couldn't find a reservation matching what you entered.</p></p><br>
            <p class="regularText">Be sure to check your credentials and make sure the name you are entering is for the 
                primary guest registered.  Timeshare reservations may possibly be located under the ownership name.</br></br>
                If you're still having trouble, please see a Front Desk Agent for additional assistance.</p>
        </div>

        <div style="text-align:center;">
            <form name="searchForm" onsubmit="return validateForm()" action="verify1.php" method="post" required>
                <form name="searchForm" onsubmit="return validateForm()" action="policies1.php" method="post" required>
                <p class="regularText">First Name:</p><input type="textbox"  name="fName" class="textArea"><br>
                <p class="regularText">Last Name:</p> <input type="textbox"  name="lName" class="textArea"><br><br>
                <div>
                <div style="display: inline"><input type="checkbox" name="termsCheck" class="textAreaCenter" ></div>
                    <div style="display: inline"><p class="regularTextColor">I have read and accepted the</p><a href="https://carlsbadinn.com" class="regularTextColor"> Terms and Conditions.</a></div>
                    
                </div>
                <br> 
                <input type="submit" value="Proceed" style="color:white; background-color:#3c7480; font-family: Segue UI, Arial; font-size: 3.5em; border:none; padding:20px"> <br><br>
            </form> </form>
            <br><br>
        </div>

        
        <footer>
             &copy Carlsbad Inn Beach Resort<br><br>  
              <a href="https://carlsbadinn.com" style="color:white">General Website</a><br><br>
              <a href="https://carlsbadinn.com/privacy-policy" style="color:white">Privacy Policy</a>
        </footer>
    </body>
</html>