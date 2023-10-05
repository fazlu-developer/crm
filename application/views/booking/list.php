<div id="content" class="app-content">
    <div class="d-flex align-items-center mb-3">
        <div>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= base_url();?>">Home</a></li>
                <li class="breadcrumb-item"><a href="javascript:;">Booking</a></li>
                <li class="breadcrumb-item active"><i class="fa fa-arrow-back"></i> Booking  List</li>
            </ol>
            <h1 class="page-header mb-0">Booking List</h1>
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
<th class="text-nowrap">Vehicle Number</th>
<th class="text-nowrap">State</th>
<th class="text-nowrap">City</th>
<th class="text-nowrap">Action</th>
</tr>
</thead>
<tbody>
    <?php
    $i=1;
if(sizeof($booking_list)>0)
{
    
    foreach($booking_list as $booking)
    {
    ?>
<tr class="odd gradeX">
<td width="1%" class="fw-bold text-dark"><?=$i++?></td>
<td><?=$booking->name?></td>
<td><?=$booking->vehicle_number?></td>
<td><?=$booking->state?></td>
<td><?=$booking->city?></td>
<td><a href="<?=base_url();?>edit-booking?id=<?= base64_encode($booking->id);?>"><span class="fa fa-edit  text-warning" style="font-size: larger;"></span></a><a href="<?=base_url();?>booking/deletebooking?id=<?= base64_encode($booking->id)?>" onclick=" return confirm('Are You Sure Delete This Data');"><span class="fa fa-trash mx-2 text-danger" style="font-size: larger;"></span></a></td>
</tr>
<?php } } ?>
</tbody>
</table>
                </div>
            </div>
        </div>
    </div>
</div>
