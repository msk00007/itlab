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
<body>
    <?php if(isset($user)):  ?>
    <br><h3>User Information form User Profile</h3> </center>
    
    <br> <br> <pre>
    <div>
   <h4> Name	:	<?= htmlspecialchars($user["name"]) ?></h4>
    </div>
    <div>
    <h4>Date of birth	:<?= htmlspecialchars($user["dob"]) ?></h4>	
    </div>
    <div>
    <h4>Address		:       <?= htmlspecialchars($user["dob"]) ?></h4>
    </div>
    <div>
    <h4>E-mail	:	<?= htmlspecialchars($user["email"]) ?></h4>
    </div>
    <div>
    <h4>Contace No.	:<?= htmlspecialchars($user["phone"]) ?></h4>
    </div>
    <div>
    <h4>Gender	:   <?= htmlspecialchars($user["gender"]) ?></h4>
    </div>	
    </pre>
    <?php else: ?>
        
        <p>please log in </p>
        
    <?php endif; ?>
    </body>
    
    
    