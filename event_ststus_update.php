<?php

include'../database/env.php';
$id = $_GET ['id'];
print_r($id);
$querry ="SELECT event_status FROM event WHERE 1";
$data = mysqli_query($conn,$querry);
print_r($data);


if($event['event_status'] == 0 ){ 
    $querry = "UPDATE event SET event_status='1' WHERE id = '$id'";
}else{
    $querry = "UPDATE event SET event_status='0' WHERE id = '$id'";
}
mysqli_query($conn,$querry);
header("location:../backend/all_event.php");