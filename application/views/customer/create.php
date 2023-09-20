<div id="content" class="app-content">
  <div class="d-flex align-items-center mb-3">
    <div>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
        <li class="breadcrumb-item"><a href="javascript:;">Manage Customer</a></li>
        <li class="breadcrumb-item active"><i class="fa fa-arrow-back"></i> Customer</li>
      </ol>
      <h1 class="page-header mb-0">Customer</h1>
    </div>
  </div>
  <div class="row">
    <div class="col-lg-12">
      <div class="card border-0 mb-4">
        <div class="card-header h6 mb-0 bg-none p-3">
          <i class="fa fa-image fa-lg fa-fw text-dark text-opacity-50 me-1"></i> Add Customer
        </div>
        <form action="<?=base_url()?>customer/addCustomer" method="POST" enctype="multipart/form-data">
          <div class="card-body">
            <div class="row">
              <div class="col-md-6">
                <div class="mb-3">
                  <label class="form-label">Name *</label>
                  <input class="form-control" type="text" name="name" placeholder="Enter Name" value="<?= set_value('name');?>" />
                  <span class="text-danger"><?= form_error('name');?></span>
                </div>
              </div>
              <div class="col-md-6">
                <div class="mb-3">
                  <label class="form-label">Mobile *</label>
                  <input class="form-control" type="text" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" maxlength="10" name="mobile" placeholder="Enter Mobile No" value="<?= set_value('mobile');?>" onkeypress="if(this.value.length==10) return false;"/>
                  <span class="text-danger"><?= form_error('mobile');?></span>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="mb-3">
                  <label class="form-label">Email Id</label>
                  <input class="form-control" type="email" name="email_id" placeholder="Enter Email Id" value="<?= set_value('email_id');?>" />
                </div>
              </div>
              <div class="col-md-6">
                <div class="mb-3">
                  <label class="form-label">Vehicle Type</label>
                  <select name="vehicle_type" id="" class="form-control" aria-label="Default select example">
                    <option value="1" <?=(set_value('vehicle_type')==1)?'selected':''?>>2 Wheeler</option>
                    <option value="2" <?=(set_value('vehicle_type')==2)?'selected':''?>>3 Wheeler</option>
                    <option value="3" <?=(set_value('vehicle_type')==3)?'selected':''?>>4 Wheeler</option>
                  </select>
                  <span class="text-danger"><?= form_error('vehicle_type');?></span>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="mb-3">
                  <label class="form-label">Vehicle Number</label>
                  <input class="form-control" type="text" name="vehicle_number" placeholder="Enter Vehicle Number" value="<?= set_value('vehicle_number');?>" />
                  <span class="text-danger"><?= form_error('vehicle_number');?></span>
                  
                </div>
              </div>
              <div class="col-md-6">
                <div class="mb-3">
                  <label class="form-label">Check In Time</label>
                  <input class="form-control" type="time" name="check_in_time" value="<?= set_value('check_in_time');?>" />
                  <span class="text-danger"><?= form_error('check_in_time');?></span>
                </div>
              </div>
            </div>
            <div class="row">
            <div class="col-md-6">
                <div class="mb-3">
                  <label class="form-label">Check Out Time</label>
                  <input class="form-control" type="time" name="check_out_time"  value="<?= set_value('check_out_time');?>" />
                </div>
              </div>
              <div class="col-md-6">
                <div class="mb-3">
                  <label class="form-label">Date</label>
                  <input class="form-control" type="date" name="date"  value="<?= set_value('date');?>" />
                  <span class="text-danger"><?= form_error('date');?></span>
                  
                </div>
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
</div>
