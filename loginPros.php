<?php
require "./config.php";

$email = $_POST['email'];
$password = $_POST['password'];

$sql = "select * from client where email = ?";

$stmt = mysqli_prepare($conn,$sql);

mysqli_stmt_bind_param($stmt,"s",$email);

if(mysqli_stmt_execute($stmt)){
    // get the result of query (return object)
    $result = mysqli_stmt_get_result($stmt);
    if($result){
        $user = mysqli_fetch_assoc($result);
        // for the admin i enter a simple password
        if($user['RoleId'] == 1){
            if ($password === $user['password']) {
                echo "Welcome admin , " . $user['nom'];
                header("Location: Home.php");
            } else {
                // Incorrect password
                echo "Invalid credentials. Please try again.";
            }
        }
        // i do this for the users because i enter a hashed password for them
        else{
            if(password_verify($password,$user['password'])){
                echo "Welcome, " . $user['nom'] . " " . $user['prenom'];
                header("Location: Home.php");
            } else {
                echo "Invalid credentials. Please try again.";
            }
        }
    }
    else{
        echo "echo No account found with this email.";
    }
}else{
    echo "An error occurred during login. Please try again later.";
}

