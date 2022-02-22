<?php
session_set_cookie_params(3600);
session_start();

$connection = mysqli_connect("localhost" , "darkness" , "", "my_darkness");
$userName = $_POST["userName"];
$password = hash("SHA256",$_POST["password"]);

$query = "SELECT * FROM `Utenti` WHERE UserName='$userName' and uPassword ='".$password."'";
$result = mysqli_query($connection,$query);
if(mysqli_num_rows($result) > 0){
    $_SESSION["userName"] = $username;
    echo "HAI FATTO IL LOGIN!!!";
   // header("Location: main.html"); // Redirect uente su pagincon three.js
}else{
    echo "<div class='form'><h3>Username/password is incorrect.</h3><br/>Click here to <a href='index.html'>Login</a></div>";
}

?>