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
        <form action="http://localhost/fobeaappliances/admin/manage-banner" method="POST" enctype="multipart/form-data">
          <div class="card-body">
            <div class="row">
              <div class="col-md-6">
                <div class="mb-3">
                  <label class="form-label">Name</label>
                  <input class="form-control" type="text" name="btitle" placeholder="Enter Name" value="" />
                </div>
              </div>
              <div class="col-md-6">
                <div class="mb-3">
                  <label class="form-label">Mobile</label>
                  <input class="form-control" type="text" name="burl" placeholder="Enter Mobile No" value="" />
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="mb-3">
                  <label class="form-label">Email Id</label>
                  <input class="form-control" type="text" name="btitle" placeholder="Enter Email Id" value="" />
                </div>
              </div>
              <div class="col-md-6">
                <div class="mb-3">
                  <label class="form-label">Vehicle Type</label>
                  <select name="" id="" class="form-control" aria-label="Default select example">
                    <option value="">2 Wheeler</option>
                    <option value="">3 Wheeler</option>
                    <option value="">4 Wheeler</option>
                  </select>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="mb-3">
                  <label class="form-label">Vehcile Number</label>
                  <input class="form-control" type="text" name="btitle" placeholder="Enter Name" value="" />
                </div>
              </div>
              <div class="col-md-6">
                <div class="mb-3">
                  <label class="form-label">Check In Time</label>
                  <input class="form-control" type="time" name="burl" placeholder="Enter Mobile No" value="" />
                </div>
              </div>
            </div>
            <div class="row">
            <div class="col-md-6">
                <div class="mb-3">
                  <label class="form-label">Check Out Time</label>
                  <input class="form-control" type="time" name="burl" placeholder="Enter Mobile No" value="" />
                </div>
              </div>
              <div class="col-md-6">
                <div class="mb-3">
                  <label class="form-label">Date</label>
                  <input class="form-control" type="date" name="btitle" placeholder="Enter Name" value="" />
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
