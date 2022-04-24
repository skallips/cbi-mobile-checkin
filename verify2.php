<?php

    class resObject {
        public $index;
        public $resObjectNumber;
        public $selected;

        public function _construct($inIndex, $inObjectNumber)   {
                $this->index = $inIndex;
                $this->resObjectNumber = $inObjectNumber;
                $this->selected = false;
        }

        public function setIndex($inIndex) {
            $this->index = $inIndex;
        }

        public function getIndex() {
            return $this->index;
        }

        public function setResObjectNumber($inObjectNumber)    {
            $this->resObjectNumber = $inObjectNumber;
        }

        public function getResObjectNumber() {
            return $this->resObjectNumber;
        }

        public function setSelected ($inStatus)  {
            $this->selected = $inStatus;
        }

        public function flipSelected()  {
            if($this->selected == 1)    {
                $this->selected = 0;
            }
            else if($this->selected == 0)   {
                $this->selected = 1;
            }
        }

        public function getSelected()  {
            return $selected;
        }
    }

    session_start();

    $_SESSION["resObjectArray"] = array();
    $iterator = 0;
    $tempResObject = new resObject (0, 0);
    

    
    
    

    ini_set('display_errors', 1);
    ini_set('display_startup_erros', 1);
    error_reporting(E_ALL);

    $_SESSION["firstNameTemp1"] = $_POST['fName'];
    $_SESSION["lastNameTemp1"] = $_POST['lName'];
    $_SESSION["firstNameTemp2"] = "%{$_POST['fName']}%";
    $_SESSION["lastNameTemp2"] = "%{$_POST['lName']}%";
    
    $_SESSION["fNameLength"] = strlen($_SESSION["firstNameTemp1"]);
    $_SESSION["lNameLength"] = strlen($_SESSION["lastNameTemp1"]);
    

    $_SESSION["servername"] = 'localhost';
    $_SESSION["username"] = 'uve85fufjdktz';
    $_SESSION["password"] = 'Temecula15';
    $_SESSION["dbname"] = 'dbgd3r8d7xqfak';

    


    //opening up connection to database
    $mysqli = new mysqli($_SESSION["servername"], $_SESSION["username"], $_SESSION["password"], $_SESSION["dbname"]);
    
    if (mysqli_connect_error()) {
        die("Database connection failed: " . mysqli_connect_error());
    }
    
    if(($_SESSION["fNameLength"] < 4) && ($_SESSION["lNameLength"] < 4))  {
        $stmt = $mysqli->prepare("SELECT * FROM res_info WHERE firstName = ? AND lastName = ?");
        $stmt->bind_Param('ss', $_SESSION["firstNameTemp1"], $_SESSION["lastNameTemp1"]);
    }
    else    {
        $stmt = $mysqli->prepare("SELECT * FROM res_info WHERE firstName LIKE ? AND lastName LIKE ?");
        $stmt->bind_Param('ss', $_SESSION["firstNameTemp2"], $_SESSION["lastNameTemp2"]);
    }

    $stmt->execute();
    $_SESSION["result"] = $stmt->get_result();

    if ($_SESSION["result"]->num_rows <= 0) {
        header("Location: https://www.smartchurro.com/search1.5.php"); 
        exit();
    }
    

    $mysqli->close();

    

  /*

    USED TO INSERT A QUERY, USE IN A DIFFERENT FILE

    $query_command = "INSERT INTO res_info (firstName, lastName, cellNumber, checkInDate, checkOutDate, roomType, roomRate, resNumber)
            VALUES ('John','Smith', '808-422-3339','2020-06-14','2020-06-18','KS','144.00','1775647')";
 
    $mysqli->query($query_command);

    if($mysqli->query($query_command) == TRUE)  {
      echo "New record created successfully";
    } else {
      echo "Error: " . $query_command . "<br>" . $mysqli->error;
    }

    echo "inserted";

    */
    
?>

<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="/css/cbistylesheet.css">
        <script>function selectRes()  {
            this.clear();
            item.style.backgroundColor = 'red';
        }  </script>
    </head>

    <body>
        <form name="verifyForm" onsubmit="return validateVerifyForm()" action="policies1.php" method="post" required>


        <p style="text-align:center"><img src="New_logo.JPG" alt="CBI Logo" width="50%" height="50%"></p>
        <div id="header">
            <h1 class="headerText">Reservation Review</h1>
        </div>
        <div class="middle">
            <p style="text-align:center"><p class="popText">Please select from the following:</p></p>
        </div>

    <div>
        <?php   
        

        if ($_SESSION["result"]->num_rows > 0) {
        // output data of each row

            

        while($row = $_SESSION["result"]->fetch_assoc()) {
            echo "<div><div style=\"border: 1em solid #cccccc\" id=\"resDiv[]\"><div style=\"display:inline-block; padding:1em\" ><p class=\"regularTextCondensed\">Name:<br>Check-In:<br>Check-Out:<br>Room Type:<br>Res:</p></div><div style=\"display:inline-block; padding:1em\">";
            
            echo "<p class=\"regularTextCondensed\">". $row["firstName"]." ".$row["lastName"]."</p><br>";
            echo "<p class=\"regularTextCondensed\">". $row["checkInDate"]. "</p><br>";
            echo "<p class=\"regularTextCondensed\">". $row["checkOutDate"]. "</p><br>";
            echo "<p class=\"regularTextCondensed\">". $row["roomType"]. "</p><br>";
            echo "<p class=\"regularTextCondensed\">". $row["resNumber"]. "</p><br>";
            
            $tempResObject = new resObject(0,0);
            $tempResObject->setIndex($iterator);
            $tempResObject->setResObjectNumber($row["resNumber"]);
            $tempResObject->setSelected(0);
            
            array_push($_SESSION["resObjectArray"], $tempResObject);
            $iterator++;

            echo "</div><div style=\"display:inline-block; padding:1em; float:right\"><p class=\"regularTextCondensed\">Select</p><br>
            

            


            
<input type=\"button\" value=\"select\" name=\"resButton[]\" style=\"color:white; background-color:#3c7480; font-family: Segue UI, Arial; font-size: 3.5em; border:none; padding:20px onclick=selectRes(this)\">

</div></div><br>";
        }
    }

    echo '<pre>';
print_r($_SESSION["resObjectArray"]);
echo '</pre>';
        
        
//        <label class=\"custom-checkbox\">
  //          <input type=\"checkbox\" name=\"resCheck\" style=\"width: 50em height: 50em\">   <span></span>
//</label>

        ?>
        </div>
        <p style="text-align:center"><input type="submit" value="Proceed" style="color:white; background-color:#3c7480; font-family: Segue UI, Arial; font-size: 3.5em; border:none; padding:20px"></p>
        
        <div>
        <br>
            <p class="regularText">*Please note that our system may split certain reservations into multiple segments and may display
            a different check-out date.  A Front Desk Agent will be happy to review any discrepancies on your registration details. </p><br><br><br><br>
        </div>
        
        </form>
        <footer>
             &copy Carlsbad Inn Beach Resort<br><br>  
              <a href="https://carlsbadinn.com" style="color:white">General Website</a><br><br>
              <a href="https://carlsbadinn.com/privacy-policy" style="color:white">Privacy Policy</a>
        </footer>
    </body>
</html>