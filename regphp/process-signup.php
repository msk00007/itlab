<?php
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

$sql = "INSERT INTO itlab (name, email, phone, dob,password,gender,address,creditcard)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        
$stmt = $mysqli->stmt_init();

if ( ! $stmt->prepare($sql)) {
    die("SQL error: " . $mysqli->error);
}

$stmt->bind_param("ssssssss",
                  $_POST["name"],
                  $_POST["email"],
                  $_POST["phno"],
                  $_POST["dob"],
                  $_POST["psd"],
                  $_POST["gender"],
                  $_POST["address"],
                  $_POST["card"]
);
                  
if ($stmt->execute()) {
    session_start();
            
    session_regenerate_id();
    
    $_SESSION["user_id"] = $itlab["id"];
    
    header("Location:loginpage.html");
    exit;
    
} else {
    
    if ($mysqli->errno === 1062) {
        die("email already taken");
    } else {
        die($mysqli->error . " " . $mysqli->errno);
    }
}







