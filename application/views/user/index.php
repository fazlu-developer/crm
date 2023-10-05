<?php
$action_url = "user/addUser";
?>
<div id="content" class="app-content">
    <div class="d-flex align-items-center mb-3">
        <div>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= base_url();?>">Home</a></li>
                <li class="breadcrumb-item"><a href="javascript:;">Manage User</a></li>
                <li class="breadcrumb-item active"><i class="fa fa-arrow-back"></i> User List</li>
            </ol>
            <h1 class="page-header mb-0">User List</h1>
        </div>
    </div>
    
    <div class="row">
    <div class="row">
    <div class="col-lg-12">
      <div class="card border-0 mb-4">
        <div class="card-header h6 mb-0 bg-none p-3">
          <i class="fa fa-image fa-lg fa-fw text-dark text-opacity-50 me-1"></i> Add User
        </div>
        <form action="<?=base_url().$action_url?>" method="POST" enctype="multipart/form-data">
          <div class="card-body">
            <div class="row">
              <div class="col-md-6">
                <div class="mb-3">
                  <label class="form-label">Name *</label>
                  <input class="form-control" type="text" name="name" placeholder="Enter Name" value="<?php if(@$detail->name) { echo $detail->name; } else { echo set_value('name'); } ?>" required />
                  <input class="form-control" type="hidden" name="hidden_id" value="<?=@$id?>" />
                  <span class="text-danger"><?= form_error('name');?></span>
                </div>
              </div>
              <div class="col-md-6">
                <div class="mb-3">
                  <label class="form-label">User Name *</label>
                  <input class="form-control" type="text" name="username" placeholder="Enter username" value="<?php if(@$detail->username) { echo $detail->username; } else { echo set_value('username'); } ?>" required/>
                  <span class="text-danger"><?= form_error('username');?></span>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="mb-3">
                  <label class="form-label">Password *</label>
                  <input class="form-control" type="text" name="password" placeholder="Enter password" required  />
                  <span class="text-danger"><?= form_error('password');?></span>
                </div>
              </div>
              <div class="col-md-6">
                <div class="mb-3">
                  <label class="form-label">Email </label>
                  <input class="form-control" type="email" name="email" placeholder="Enter email" value="<?php if(@$detail->email) { echo $detail->email; } else { echo set_value('email'); } ?>" />
                  <span class="text-danger"><?= form_error('email');?></span>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="mb-3">
                  <label class="form-label">Mobile No</label>
                  <input class="form-control" type="text" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" maxlength="10" name="mobile" placeholder="Enter mobile" value="<?php if(@$detail->mobile) { echo $detail->mobile; } else { echo set_value('mobile'); } ?>" />
                  <span class="text-danger"><?= form_error('mobile');?></span>
                </div>
              </div>
              <div class="col-md-6">
                <div class="mb-3">
                  <label class="form-label">Address</label>
                  <input class="form-control" type="text" name="address" placeholder="Enter address" value="<?php if(@$detail->address) { echo $detail->address; } else { echo set_value('address'); } ?>" />
                  <span class="text-danger"><?= form_error('address');?></span>
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
                  <option value="<?=$state->id;?>" <?php if(!empty($detail)){ if($state->id==$detail->state_id){ echo 'selected';}}?> ><?=$state->title;?></option>
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
            <div class="row">
              <div class="col-md-6">
                <div class="mb-3">
                  <label class="form-label">Role</label>
                  <select name="role" id="role" class="form-control" aria-label="Default select example" required>
                    <option value="">Select Role</option>
                    <?php if(!empty($get_role)){
                        foreach($get_role as $role){ ?>
                    <option value="<?= $role->id;?>" <?php if(!empty($detail)){ if($role->id==$detail->role_id){ echo 'selected';}}?>><?= $role->title;?></option>
                      <?php } }?>
                  </select>
                  <span class="text-danger"><?= form_error('status');?></span>
                </div>
              </div>
              <div class="col-md-6">
                <div class="mb-3">
                  <label class="form-label">Status</label>
                  <select name="status" id="status" class="form-control" aria-label="Default select example">
                    <option value="1" <?php if(@$detail->status==1) { echo 'selected'; } else { echo (set_value('status')==1)?'selected':''; }?>>Active</option>
                    <option value="2" <?php if(@$detail->status==2) { echo 'selected'; } else { echo (set_value('status')==2)?'selected':''; } ?>>InActive</option>
                  </select>
                  <span class="text-danger"><?= form_error('status');?></span>
                </div>
              </div>
            </div>
           
          <div class="card-footer bg-none d-flex p-3">
            <button type="submit" class="btn btn-primary"><i class="fas fa-check"></i> CLICK TO SAVE DETAIL </button>
            <button type="reset" class="btn btn-danger ms-2">RESET</button>
          </div>
        </form>
      </div>
    </div>
  </div>
        <div class="col-lg-12">
            <div class="card border-0 mb-4">
              
                <div class="card-body">
                <table id="data-table-default" class="table table-striped table-bordered align-middle">
<thead>
<tr>
<th width="1%"></th>
<th class="text-nowrap">Name</th>
<th class="text-nowrap">Role</th>
<th class="text-nowrap">State</th>
<th class="text-nowrap">City</th>
<th class="text-nowrap">User Name</th>
<th class="text-nowrap">Email</th>
<th class="text-nowrap">Mobile</th>
<th class="text-nowrap">Address</th>
<th class="text-nowrap">Created Date</th>
<th class="text-nowrap">Status</th>
<th class="text-nowrap">Action</th>
</tr>
</thead>
<tbody>
    <?php
    $i=1;
if(sizeof($role_list)>0)
{
    
    foreach($role_list as $role)
    {
      switch($role->status)
      {
        case 1 : $status = "Active";
        break;
        case 2 : $status = "InActive";
        break;
      }
    ?>
  <tr class="odd gradeX">
  <td width="1%" class="fw-bold text-dark"><?=$i++?></td>
  <td><?=$role->name?></td>
  <td><?=$role->role_name?></td>
  <td><?=$role->state_name?></td>
  <td><?=$role->city_name?></td>
  <td><?=$role->username?></td>
  <td><?=$role->email?></td>
  <td><?=$role->mobile?></td>
  <td><?=$role->address?></td>
  <td><?=date('d M Y h:i A',strtotime($role->created_date))?></td>
  <td><?=$status?></td>
  <td>
  <a href="<?=base_url()?>user/edit_user?id=<?=base64_encode($role->id)?>" class="btn btn-primary">Edit</a>
  <a href="<?=base_url()?>user/delete_user?id=<?=base64_encode($role->id)?>" onclick="return confirm('Are You Sure')"  class="btn btn-danger">Delete</a>
  </td>
  </tr>
  <?php } } ?>
  </tbody>
  </table>
                </div>
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
