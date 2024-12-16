<?php

require "./config.php";

$name = $_POST['name'];
$prenom = $_POST['firstName'];
$address = $_POST['address'];
$tel = $_POST['tel'];
$email = $_POST['email'];
$password = $_POST['password'];
// hash the password using  CRYPT_BLOWFISH:
$hashed_Password = password_hash($password,PASSWORD_BCRYPT);
$sql = "INSERT INTO client(nom,prenom,adress,tel,email,password) VALUES(?,?,?,?,?,?)";

$stmt = mysqli_prepare($conn,$sql);

if(!$stmt){
    die("statement preparation failed".mysqli_error($conn));
}

mysqli_stmt_bind_param($stmt,"ssssss",$name,$prenom,$address,$tel,$email,$hashed_Password);

if(mysqli_stmt_execute($stmt)){
    echo "new user inserted success";
}
else{
    echo "Error" .mysqli_stmt_error($stmt);
}