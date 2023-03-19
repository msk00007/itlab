
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
    $email = $_POST["email"];
    $sql ="SELECT * FROM itlab
                    WHERE email ='$email'";
    
    $result = $mysqli->query($sql);
    
    $itlab = $result->fetch_assoc();
    
    if ($itlab) {
        
        if ($_POST["psd"]===$itlab["password"]) {
            session_start();
            
            session_regenerate_id();
            
            $_SESSION["user_id"] = $itlab["id"];
            
            header("Location:userdetails.php");
            exit;
    }
    
   
}
$is_invalid = true;
if($is_invalid){
    echo "invalid login please try again with correct credentials..";
}
?>