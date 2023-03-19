<?php
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

// retrieve the customer's booklist
$sql = "SELECT * FROM book_catalogue";
$result = mysqli_query($conn, $sql);

// display the booklist in a table

if (mysqli_num_rows($result) > 0) {
    echo"<center><a href=\"shopingcart.php\">Show my cart</a></center>";
    while ($row = mysqli_fetch_assoc($result)) {
        // $link = 'yourslist.php?val=' . $row["BooksandMagazines"] . '' ;
        echo"<center><table style='font-size: larger'><tr><td>bookname : </td> <td>" .$row["BooksandMagazines"]. "</td></tr>
        <tr><td>Auther : </td> <td>" . $row["Author"] . "</td></tr>
        <tr><td>Publication : </td> <td>" .$row["Publication"]. "</td></tr>
        <tr><td>price : </td> <td>" .$row["Price"]. "</td></tr></table>
        </table>
        <form action=\"yourslist.php\"method=\"post\" target=\"_SELF\">
        <input type=\"number\" name =\"Price\" id=\"Price\" value='" .$row["Price"]. "'>&nbsp;
        <input type=\"text\" name =\"bookname\" id=\"bookname\" value='" .$row["BooksandMagazines"]. "'>
    <label for=\"quantity\">quantity</label>
    <input type=\"number\" name =\"quantity\" id=\"quantity\" min=1 max=3>
    <br>
    <input type=\"submit\" name =\"Add to Cart\" value=\"Add to Cart\">
</form>
        </center>";
    }

}
    ?>
   