<?php

session_start();

if (isset($_SESSION["user_id"])) {
    
    $host = "localhost";
    $dbname = "login_db";
    $username = "root";
    $password = "";
    
    $mysqli = new mysqli(hostname: $host,
                         username: $username,
                         password: $password,
                         database: $dbname);
    
    $sql = "SELECT * FROM itlab
            WHERE id = {$_SESSION["user_id"]}";
            
    $result = $mysqli->query($sql);
    
    $user = $result->fetch_assoc();
}
?>
<?php

// Database credentials
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
 if (isset($user)){
$bookname = $_POST["bookname"];
$quantity = $_POST["quantity"];
$price = $_POST["Price"];
$price = $price*$quantity;
$stmt = $conn->prepare("INSERT INTO Book_list (bookname,quantity,id,price) VALUES (?, ?, ?, ?)");
$stmt->bind_param("ssss", $bookname, $quantity, $user["id"],$price);

// Execute SQL statement
if ($stmt->execute() === TRUE) {
    echo "uploaded to cart successfully.";
} else {
    echo "Error uploading PDF file: " . $conn->error;
}

// Close statement
$stmt->close();
 }
 else{
//  $stmt->close();
 }
?>