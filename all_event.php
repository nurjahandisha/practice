<?php
include"./backend_inc/header.php";
include"../database/env.php";
$querry="SELECT * FROM event ";
$data=mysqli_query($conn,$querry);
$events = mysqli_fetch_all($data,1);
// print_r($events);

?>
<h2>All Events</h2>

 <table class = "table w-100">

 <tr>
     <th>#</th>
     <th>event name</th>
     <th>event price</th>
     <th>event detail</th>
     <th>event img</th>
     <th>status</th>
     <th>Action</th>
 </tr>
  <?php
foreach($events as $key=> $event){
  ?>
  <tr>
  <td><?=++$key?></td>
  <td><?=$event['event_name']?></td>
  <td><?=$event['event_price']?></td>
  <td><?=$event['event_detail']?></td>
  <td>
    <img src="<?= "../uploadss/event/".$event['event_img']?>" alt="" style="height:50px">
  </td>
  
  <td>
    <span class="bdge <?=$event['event_status'] ==0 ? 'bg-danger' : 'bg-success' ?> text-light" ><?=$event['event_status'] ==0 ? 'De-Active' : 'Active' ?></span>
  </td>
  <td>
  <a href="../controller/event_ststus_update.php?id=<?=$event['id']?>" class="btn btn-warning">
         <?=$event['event_status'] != 0 ? 'De-active' : 'Active'?>
         </a>

  <a href="#" class="btn btn-primary">Edit</a>
        <a href="../controller/event_delete.php?id=<?=$event['id']?>" class="btn btn-danger bannerDelete">Delete</a>
  </td>





</tr>
<?php
}
  ?>
 














 </table>






























<?php
include"./backend_inc/footer.php";
?>