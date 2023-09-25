<?php
if (!empty($getbooking->id)) {
    $frmaction = base_url() . "booking/updateBooking";
    $buttoName = 'CLICK TO UPDATE DETAIL';
} else {
    $frmaction = base_url() . "booking/addBooking";
    $buttoName = 'CLICK TO SAVE DETAIL';
}
?>
<div id="content" class="app-content">
  <div class="d-flex align-items-center mb-3">
    <div>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
        <li class="breadcrumb-item"><a href="javascript:;">Manage Booking</a></li>
        <li class="breadcrumb-item active"><i class="fa fa-arrow-back"></i> Booking</li>
      </ol>
      <h1 class="page-header mb-0">Booking</h1>
    </div>
  </div>
  <div class="row">
    <div class="col-lg-12">
      <div class="card border-0 mb-4">
        <div class="card-header h6 mb-0 bg-none p-3">
          <i class="fa fa-image fa-lg fa-fw text-dark text-opacity-50 me-1"></i> Add Booking
        </div>
        <form action="<?= $frmaction;?>" method="POST" enctype="multipart/form-data">
        <input type="hidden" value="<?php if(!empty($getbooking)){ echo $getbooking->id;}?>" name="hidden_id">
          <div class="card-body">
            
            <div class="row">
              <div class="col-md-6">
                <div class="mb-3">
                  <label class="form-label">Name *</label>
                  <input class="form-control" type="text" name="name" placeholder="Enter Name" value="<?php if(!empty($getbooking)){ echo $getbooking->name; }?>"required />
                  <span class="text-danger"><?= form_error('name');?></span>
                </div>
              </div>
                <div class="col-md-6">
                  <div class="mb-3">
                    <label class="form-label">Vehicle Number</label>
                    <input class="form-control" type="text" name="vehicle_number" placeholder="Enter Vehicle Number" value="<?php if(!empty($getbooking)){ echo $getbooking->vehicle_number; }?>"required   />
                    <span class="text-danger"><?= form_error('vehicle_number');?></span>
                  </div>
                </div>
                </div>
            <div class="row">
              <div class="col-md-6">
                <div class="mb-3">
                  <label class="form-label">Select State *</label>
                  <select name="state_id" id="getstate" class="form-control" required>
                  <option value="">Select state</option>
                  <?php if(!empty($getstate)){
                    foreach($getstate as $state){ ?>
                  <option value="<?=$state->id;?>" <?php if(!empty($getbooking)){ if($state->id==$getbooking->state_id){ echo 'selected';}}?> ><?=$state->title;?></option>
                  <?php }} ?>
                  </select>
                  <span class="text-danger"><?= form_error('state_id');?></span>
                </div>
              </div>
              <div class="col-md-6">
                <div class="mb-3">
                  <label class="form-label">Select city *</label>
                  <select name="city_id" class="form-control" id="getcity" required>
                  <option value="">Select city</option>
                  </select>
                  <span class="text-danger"><?= form_error('city_id');?></span>
                </div>
              </div>
              </div>
          
              <div class="card-footer bg-none d-flex p-3">
                <button type="submit" class="btn btn-primary"><i class="fas fa-check"></i> <?= $buttoName?> </button>
                <a href="<?=base_url()?>create-customer" class="btn btn-danger ms-2">RESET</a>
              </div>
        </form>
      </div>
    </div>
  </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script>
  // $( document ).ready(function(){

     getbooking();
    function getbooking(){
      let id = $("#getstate").val();
     $.ajax({
        url:"<?= base_url();?>booking/getcity",
        type:"post",
        data:{
          id:id
        },
        success:function(data){
        $("#getcity").html(data);
        }
     }); 
    }

    $("#getstate").on("change",function(){
     let id = $("#getstate").val();
     $.ajax({
        url:"<?= base_url();?>booking/getcity",
        type:"post",
        data:{
          id:id
        },
        success:function(data){
        $("#getcity").html(data);
        }
     });
    });
  // });
</script>
