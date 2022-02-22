<?php 


    if(isset($_POST["submit"])){
        $connection = mysqli_connect("localhost" , "darkness" , "", "my_darkness");
        $userName = $_POST["userName"];
        $password = hash("SHA256",$_POST["password"]);
    
        $query = "SELECT * FROM `Utenti` WHERE UserName='$userName' and uPassword ='".$password."'";
        $result = mysqli_query($connection,$query);
        if(mysqli_num_rows($result) > 0){
        echo "<div class='form'><h3>Utente già registrato</h3><br/>Click here to <a href='registration.html'>Login</a></div>";
    
        }
        $sql = "INSERT INTO Utenti (Email,UserName, uPassword) VALUES ('".$email."', '".$userName."', '".$password."');";
        if (mysqli_query($connection,$sql)) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    
    }


?>
