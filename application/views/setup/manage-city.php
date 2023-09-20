<div id="content" class="app-content">
    <div class="d-flex align-items-center mb-3">
        <div>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                <li class="breadcrumb-item"><a href="javascript:;">Manage City</a></li>
                <li class="breadcrumb-item active"><i class="fa fa-arrow-back"></i> City List</li>
            </ol>
            <h1 class="page-header mb-0">Customer List</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card border-0 mb-4">
              
                <div class="card-body">
                <table id="data-table-default" class="table table-striped table-bordered align-middle">
<thead>
<tr>
<th width="1%"></th>
<th class="text-nowrap">Name</th>
<th class="text-nowrap">Mobile No</th>
<th class="text-nowrap">Vehicle Number</th>
<th class="text-nowrap">Vehicle Type</th>
<th class="text-nowrap">Check in  time</th>
<th class="text-nowrap">Check out time</th>
<th class="text-nowrap">Checkout date</th>
</tr>
</thead>
<tbody>
    <?php
    $i=1;
if(sizeof($customer_list)>0)
{
    
    foreach($customer_list as $customer)
    {
      switch($customer->vehicle_type)
      {
        case 1 : $vehicle_type = "2 Wheeler";
        break;
        case 2 : $vehicle_type = "3 Wheeler";
        break;
        case 3 : $vehicle_type = "4 Wheeler";
        break;
      }
    ?>
<tr class="odd gradeX">
<td width="1%" class="fw-bold text-dark"><?=$i++?></td>
<td><?=$customer->name?></td>
<td><?=$customer->mobile?></td>
<td><?=$customer->vehicle_number?></td>
<td><?=$vehicle_type?></td>
<td><?=$customer->check_in_time?></td>
<td><?=$customer->check_out_time?></td>
<td><?=$customer->checkout_date?></td>
</tr>
<?php } } ?>
</tbody>
</table>
                </div>
            </div>
        </div>
    </div>
</div>
