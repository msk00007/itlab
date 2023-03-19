<style>

/* Style the table */
table {
  border-collapse: collapse;
  width: 100%;
  max-width: 800px;
  margin: 0 auto;
}
th, td {
  padding: 12px;
  text-align: left;
  border: 1px solid #ddd;
}

th {
  font-weight: bold;
}
</style>
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
$sql = "SELECT bookname,quantity,price FROM Book_list WHERE Book_list.id = $customer_id";
$result = mysqli_query($conn, $sql);

// display the booklist in a table

if (mysqli_num_rows($result) > 0) {
  $total=0;
  echo"<center><h3>Your Cart list</h3></center>";
  echo "<table>";
  echo "<tr><th>Title</th><th>Quantity</th><th>price</th></tr>";
  while ($row = mysqli_fetch_assoc($result)) {
    $total = $total+$row["price"];
    echo "<tr><td>" . $row["bookname"] . "</td> <td>" .$row["quantity"]. "</td><td>" .$row["price"]. " </td></tr>";
  }
  echo "</table>";
echo"<h4>Total : " .$total. "</h4>
<a href=\"payments.php?val=" .$total. "\">BuyNow</a>";
} else {
  echo "Your booklist is empty!";
}

// close database connection
mysqli_close($conn);
?>