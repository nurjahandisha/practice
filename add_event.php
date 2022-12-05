<?php
include'./backend_inc/header.php';
?>
<h2> Event</h2>
<div class="card"></div>
<div class="card_header bg-primary text-light">
    Add New event Here
</div>
<div class="card_body">
<form action="../controller/add_event_store.php" method="POST" enctype="multipart/form-data">


<div class="row">
    <div class="col-lg-3">
      <label for="eventImg"> 
        <img class="imagePlaceholder" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRQvNJYG5M1LCfNbTvM6frlwIzRrVM9Vayyk3g-0gXze8EEwGtaFvldLi-QFBSY4kABxlY&usqp=CAU" alt=""style="width:100%;display:block;" ></label>
        <?php
             if(isset($_SESSION['errors']['event_img'])){
                 ?>
                 <span class="text-danger">
               <?=$_SESSION['errors']['event_img']?>
                     </span>
                     <?php
                          }
                     ?>  
        <input type="file" class="eventInputImage" id="bannerImg" name="event_img">
    </div>
    <div class="col-lg-9">
        <label class="w-100">
            Insert a event name <span class="text-danger">*</span>
            <input type="text" name="name" class="form_control">
            <?php
                                                if(isset($_SESSION['errors']['name'])){
                                             ?>
                                             <span class="text-danger">
                                                <?=$_SESSION['errors']['name']?>
                                             </span>
                                             <?php
                                             }
                                             ?>
        </label>

        </label>
        <label class="w-100">
            Insert a event Detail <span class="text-danger">*</span>
        <textarea name="detail" class="form-control"></textarea>
                                      <?php
                                                 if(isset($_SESSION['errors']['detail'])){
                                                ?>
                                                 <span class="text-danger">
                                                     <?=$_SESSION['errors']['detail']?>
                                                 </span>
                                                     <?php
                                                      }
                                                        ?>
        </label>
        <label class="w-100">
            Insert a event price <span class="text-danger">*</span>
            <input type="number" name="price" class="form_control">
            <?php
                                                 if(isset($_SESSION['errors']['price'])){
                                                ?>
                                                 <span class="text-danger">
                                                     <?=$_SESSION['errors']['price']?>
                                                 </span>
                                                     <?php
                                                      }
                                                        ?>
           
    
    </div>
</div>
<button name="button" class="btn btn-primary float-right">Insert Event</button>
</form>
</div>
</div>

<?php

include'./backend_inc/footer.php';
unset($_SESSION['errors']);

?>
<script>
  let inputImage = document.querySelector('.eventInputImage')
  let imageplaceholder = document.querySelector('.imagePlaceholder')
  inputImage.addEventListener('change',function(e){
   let objecturl = window.URL.createObjectURL(e.target.files[0])
   imageplaceholder.src = objecturl
  })
   
</script>


<?php
include'./backend_inc/footer.php';
?>