<?php
session_start();
require "./config.php";

$email = trim(htmlspecialchars($_POST['email']));
$password =trim(htmlspecialchars($_POST['password']));

$sql = "select * from client where email = ?";

$stmt = mysqli_prepare($conn,$sql);

mysqli_stmt_bind_param($stmt,"s",$email);

if(mysqli_stmt_execute($stmt)){
    // get the result of query (return object)
    $result = mysqli_stmt_get_result($stmt);
    if($result && mysqli_num_rows($result) > 0){
        $user = mysqli_fetch_assoc($result);
        // for the admin i enter a simple password
        if($user['RoleId'] == 1){
            if ($password === $user['password']) {
                echo "Welcome admin , " . $user['nom'];
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['role'] = 'admin';
                header("Location: Dashboard.php");
            } else {
                // Incorrect password
                $_SESSION['login_error'] = "Incorrect password for admin. Please try again.";
                header("Location: login.php");
            }
        }
        // i do this for the users because i enter a hashed password for them
        else{
            if(isset($user['password']) && password_verify($password,$user['password'])){
                echo "Welcome, " . $user['nom'] . " " . $user['prenom'];
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['role'] = 'user';
                header("Location: Home.php");
            } else {
                $_SESSION['login_error'] = "Incorrect password. Please try again.";
                header("Location: login.php");            }
        }
    }
    else{
        $_SESSION['login_error'] = "No account found with this email. Please try again.";
        header("Location: login.php");    }
}else{
    $_SESSION['login_error'] = "An error occurred during login. Please try again later.";
    header("Location: login.php");}

