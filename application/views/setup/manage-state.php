<?php
$action_url = "setup/addState";
?>
<div id="content" class="app-content">
    <div class="d-flex align-items-center mb-3">
        <div>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                <li class="breadcrumb-item"><a href="javascript:;">Manage City</a></li>
                <li class="breadcrumb-item active"><i class="fa fa-arrow-back"></i> State List</li>
            </ol>
            <h1 class="page-header mb-0">State List</h1>
        </div>
    </div>
    
    <div class="row">
    <div class="row">
    <div class="col-lg-12">
      <div class="card border-0 mb-4">
        <div class="card-header h6 mb-0 bg-none p-3">
          <i class="fa fa-image fa-lg fa-fw text-dark text-opacity-50 me-1"></i> Add State
        </div>
        <form action="<?=base_url().$action_url?>" method="POST" enctype="multipart/form-data">
          <div class="card-body">
            <div class="row">
              <div class="col-md-6">
                <div class="mb-3">
                  <label class="form-label">State *</label>
                  <input class="form-control" type="text" name="state" placeholder="Enter Name" value="<?php if(@$detail->title) { echo $detail->title; } else { echo set_value('state'); } ?>" />
                  <input class="form-control" type="hidden" name="state_id" value="<?=@$id?>" />
                  <span class="text-danger"><?= form_error('name');?></span>
                </div>
              </div>
              <div class="col-md-6">
                <div class="mb-3">
                  <label class="form-label">Status</label>
                  <select name="status" id="status" class="form-control" aria-label="Default select example">
                    <option value="1" <?=(set_value('status')==1)?'selected':''?>>Active</option>
                    <option value="2" <?=(set_value('status')==2)?'selected':''?>>InActive</option>
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
<th class="text-nowrap">State</th>
<th class="text-nowrap">Created Date</th>
<th class="text-nowrap">Status</th>
<th class="text-nowrap">Action</th>
</tr>
</thead>
<tbody>
    <?php
    $i=1;
if(sizeof($state_list)>0)
{
    
    foreach($state_list as $state)
    {
      switch($state->status)
      {
        case 1 : $status = "Active";
        break;
        case 2 : $status = "InActive";
        break;
      }
    ?>
<tr class="odd gradeX">
<td width="1%" class="fw-bold text-dark"><?=$i++?></td>
<td><?=$state->title?></td>
<td><?=date('d M Y',strtotime($state->created_date))?></td>
<td><?=$status?></td>
<td>
<a href="<?=base_url()?>setup/edit_state?id=<?=base64_encode($state->id)?>" class="btn btn-primary">Edit</a>
<a href="<?=base_url()?>setup/delete_state?id=<?=base64_encode($state->id)?>" onclick="return confirm('Are You Sure')"  class="btn btn-danger">Delete</a>
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
