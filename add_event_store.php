<?php
session_start();
include'../database/env.php';
if(isset($_POST['button'])){

$request =$_POST;
// var_dump($request);
// exit();


$name=$request['name'];
$price=$request['price'];
$detail=$request['detail'];
$event_img=$_FILES['event_img'];
$extension = pathinfo($event_img['name'])['extension'];
$accepted_extension = ['jpg','png','webp','svg','jpeg'];

// print_r($banner_img);

// validattion
$errors = [];

if(empty($name)){
    $errors['name'] ="plz enter a new event";
}
if(empty($price)){
    $errors['price'] ="plz enter a new price  ";
}
if(empty($detail)){
    $errors['detail'] ="plz enter a event detail";
}
if($event_img['size'] == 0 ){
    $errors['event_img'] ="plz Insert a event Img";  
}elseif(in_array($extension,$accepted_extension) == false){
    $errors['event_img'] ="plz Insert a proper Img Formet"; 
}




if(count($errors)>0){

    $_SESSION['errors'] =$errors;
    header("location:../backend/add_event.php");

}else{
    
$New_image_name = 'eventimg-'.uniqid() . '.' . $extension ;
  move_uploaded_file($event_img['tmp_name'], '../uploadss/event/' .$New_image_name);
        $querry = "INSERT INTO event(event_img, event_name, event_price, event_detail) VALUES ('$New_image_name','$name', '$price', '$detail')";
        $store = mysqli_query($conn,$querry);
    header("location:../backend/add_event.php");







}


















}