<?php

require "./config.php";
$id = $_GET['id'];


$sql = "UPDATE Reservation SET status = 'Confirme' WHERE id = '$id'";
$query = mysqli_query($conn,$sql);
if($query){
    session_start();
    $_SESSION['success_message'] = "Reservation confirmed successfully!";
    header("Location: Dashboard.php");
}
?>