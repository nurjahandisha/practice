<?php
include'../database/env.php';
$id = $_GET['id'];
$querry = "SELECT event_img FROM event WHERE id = '$id'";
$data = mysqli_query($conn,$querry);
$events = mysqli_fetch_assoc($data);
$path = "../uploadss/event/" . $event['event_img'] ; 

if(file_exists($path)){
    unlink($path);
}
$querry = "DELETE FROM event WHERE id = '$id'";
$data = mysqli_query($conn,$querry);
if($data){
    header("location:../backend/all_event.php");
}