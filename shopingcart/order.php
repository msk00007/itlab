<?php
// connect to the database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "login_db";

$conn = mysqli_connect($servername, $username, $password, $dbname);

// check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

// get the customer id from the session
session_start();
$customer_id = $_SESSION["user_id"];

// retrieve the customer's booklist
$sql = "DELETE  FROM Book_list WHERE Book_list.id = $customer_id";
mysqli_query($conn, $sql);
mysqli_close($conn);
?>

<head><title>order conformation</title><M/head> <body>

<center>
<h1><b>AMAZON</h1>
<pre><strong>

<b>Your order Is Conformed </strong></pre> <h2><b>THANK YOU</h2> 
<a href="logout.php">logout</a>
</center>
</body>
