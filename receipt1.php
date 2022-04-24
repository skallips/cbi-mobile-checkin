<?php
    session_start();

    ini_set('display_errors', 1);
    ini_set('display_startup_erros', 1);
    error_reporting(E_ALL);
    

    $_SESSION["servername"] = 'localhost';
    $_SESSION["username"] = 'uve85fufjdktz';
    $_SESSION["password"] = 'Temecula15';
    $_SESSION["dbname"] = 'dbgd3r8d7xqfak';

    $_SESSION["preparerFName"] = $_POST["fName"];
    $_SESSION["preparerLName"] = $_POST["lName"];


    //opening up connection to database
    $mysqli = new mysqli($_SESSION["servername"], $_SESSION["username"], $_SESSION["password"], $_SESSION["dbname"]);
    
    if (mysqli_connect_error()) {
        die("Database connection failed: " . mysqli_connect_error());
    }
    
  
        $stmt = $mysqli->prepare("SELECT * FROM res_info WHERE resNumber = ?");
        $stmt->bind_Param('s', $_SESSION["selectedRes"]);


    $stmt->execute();
    $_SESSION["result"] = $stmt->get_result();

    if ($_SESSION["result"]->num_rows > 0) {
        // output data of each row

           while($row = $_SESSION["result"]->fetch_assoc()) {

              $_SESSION["selectedResNumber"] = $row["resNumber"];
              $_SESSION["selectedFName"] = $row["firstName"];
              $_SESSION["selectedLName"] = $row["lastName"];

           }
    }

?>

<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="/css/cbistylesheet.css">
    </head>

    <body>
        <p style="text-align:center"><img src="New_logo.JPG" alt="CBI Logo" width="50%" height="50%"></p>
        <div id="header">
            <h1 class="headerText">PreCheck-in Complete</h1>
        </div>

        <br>
        <div style="margin:auto; width:60%">
        <div style="text-align:center; padding-top: .5em; padding-bottom: .5em; border: 10px solid #cccccc;">
            <h1 class="headerText2"><?php echo $_SESSION["selectedRes"]; ?></h1>
            <h1 class="headerText2"><?php echo $_SESSION["selectedFName"]." ".$_SESSION["selectedLName"]; ?></h1>
            <p class="regularText">Completed by: <?php echo $_SESSION["preparerFName"]." ".$_SESSION["preparerLName"];?></p><br><br>
        </div>
        </div>
        <div>    
            
            <br><br><br>
            <h2 class="itemText">Next Steps</h2><p class="regularText">Take a screenshot of this page and present
                it to the Front Desk along with a matching valid government-issued photo ID and credit card.
                An agent will provide you with a parking permit, wristbands, gate keys, and any resort material to help
                you get settled.</p><br>
            <h2 class="itemText">Early Check In/Room Requests</h2><p class="regularText">Please note that our posted check in 
                time begins at 4:00pm.  Early check-in requests are NOT GUARANTEED and may be restricted during high volume
                check-in days.  In addition, we will do our best to honor any room preference requests, however requests
                cannot be guaranteed and are based upon availability and reservation specifications.</p><br>
            <h2 class="itemText">Room Keys</h2><p class="regularText">Should your room be ready earlier than the posted check-in
                time we will be happy to issue your room keys.  If your room is not ready, we can text you once it is available
                for key pick up, or you may return to the desk at 4:00pm for a room status update.<br>
                           
        </div>  
        <div style="text-align:center;">
        <br><br>
            <p style="text-align:center"><p class="popText">Your getaway just got closer...</p></p><br><br>
        </div>
        <footer>
             &copy Carlsbad Inn Beach Resort<br><br>  
              <a href="https://carlsbadinn.com" style="color:white">General Website</a><br><br>
              <a href="https://carlsbadinn.com/privacy-policy" style="color:white">Privacy Policy</a>
        </footer>
    </body>
</html>