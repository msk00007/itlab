<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "login_db";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }


    // get the customer id from the session
    session_start();
    $customer_id = $_SESSION["user_id"];

    // retrieve the customer's booklist
    $sql = "SELECT creditcard FROM itlab WHERE id = $customer_id";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $total = $_GET["val"];
    if (empty($_POST["t1"])) {
        die("cannot be empty");
    }
    if(intval($_POST["t1"])!=intval($total)){
        die("must match total amount");
    }
    if (empty($_POST["t2"])) {
        die("card num cannot be empty");
    }
    if($row["creditcard"]!==$_POST["t2"]){
        die("card number is not matching");
    }
    header("Location:order.php");
    exit;

}
?>


<body>
    

<?php 
$total = $_GET["val"];
echo"
<h4>The total bill is :" .$total. " </h4>";?>
<form name="f1" method="post">
<center><h1>Payment By Credit Card</h1> 

Enter Total Amount<input type="number" name="t1"> <br>

<br>

Enter Card No:<input type="tel" name="t2" pattern="[0-9]{16}"> <br>

<br>

<input type="submit" value="submit"  > 
</center>
 
</form>
</body>
