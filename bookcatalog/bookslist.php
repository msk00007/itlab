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
$bookname = $_GET['val'];

// retrieve the customer's booklist
$sql = "SELECT * FROM book_catalogue WHERE BooksandMagazines= $bookname";
$result = mysqli_query($conn, $sql);

// display the booklist in a table

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        // $link = 'yourslist.php?val=' . $row["BooksandMagazines"] . '' ;
        echo"<center><table style='font-size: larger'><tr><td>bookname : </td> <td>" .$row["BooksandMagazines"]. "</td></tr>
        <tr><td>Auther : </td> <td>" . $row["Author"] . "</td></tr>
        <tr><td>Publication : </td> <td>" .$row["Publication"]. "</td></tr>
        <tr><td>price : </td> <td>" .$row["Price"]. "</td></tr></table>
        </table>
        </center>";
    }
    
}
    ?>
   