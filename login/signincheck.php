
<?php

$is_invalid = false;
    
$host = "localhost";
$dbname = "login_db";
$username = "root";
$password = "";

$mysqli = new mysqli(hostname: $host,
                     username: $username,
                     password: $password,
                     database: $dbname);
                     
if ($mysqli->connect_errno) {
    die("Connection error: " . $mysqli->connect_error);
}
    
    $sql = sprintf("SELECT * FROM itlab
                    WHERE email = '%s'",
                   $mysqli->real_escape_string($_POST["email"]));
    
    $result = $mysqli->query($sql);
    
    $itlab = $result->fetch_assoc();
    
    if ($itlab) {
        
        if ($_POST["psd"]===$itlab["password"]) {
            session_start();
            
            session_regenerate_id();
            
            $_SESSION["user_id"] = $itlab["id"];
            
            header("Location:store.html");
            exit;
    }
    
   
}
$is_invalid = true;
if($is_invalid){
    echo "invalid login please try again with correct credentials..";
}
?>