<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" />
<title><?= $title;?></title>
<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
<link rel="icon" type="image/png" sizes="32x32" href="<?= base_url();?>assets/img/favicon.png">
<link href="<?= base_url();?>assets/css/fontawesome.css" rel="stylesheet" />
<link href="<?= base_url();?>assets/css/vendor.min.css" rel="stylesheet" />
<link href="<?= base_url();?>assets/css/default/app.min.css" rel="stylesheet" />
<!----Table---->
<link href="<?= base_url();?>assets/plugins/datatables.net-bs5/css/dataTables.bootstrap5.min.css" rel="stylesheet" />
<link href="<?= base_url();?>assets/plugins/datatables.net-responsive-bs5/css/responsive.bootstrap5.min.css" rel="stylesheet" />
<!----Table---->	
<link href="<?= base_url();?>assets/css/custom.css" rel="stylesheet" />	
</head>
<!----Head----->
<body class="theme-blue">
<div id="app" class="app app-header-fixed app-sidebar-fixed app-gradient-enabled">
<div id="header" class="app-header">
  <div class="navbar-header"> <a href="index.php" class="navbar-brand"><img src="<?= base_url();?>assets/img/logo.png"></a>
    <button type="button" class="navbar-mobile-toggler" data-toggle="app-sidebar-mobile"> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
  </div>
  <div class="navbar-nav">
    <div class="navbar-item dropdown"> <a href="#" data-bs-toggle="dropdown" class="navbar-link dropdown-toggle icon"> <i class="fa fa-bell"></i> <span class="badge">5</span> </a>
      <div class="dropdown-menu media-list dropdown-menu-end">
        <div class="dropdown-header">NOTIFICATIONS (5)</div>
        <a href="javascript:;" class="dropdown-item media">
        <div class="media-left"> <i class="fa fa-bug media-object bg-gray-500"></i> </div>
        <div class="media-body">
          <h6 class="media-heading">Server Error Reports <i class="fa fa-exclamation-circle text-danger"></i></h6>
          <div class="text-muted fs-10px">3 minutes ago</div>
        </div>
        </a> 
         <a href="javascript:;" class="dropdown-item media">
        <div class="media-left"> <i class="fa fa-envelope media-object bg-gray-500"></i> <i class="fab fa-google text-warning media-object-icon fs-14px"></i> </div>
        <div class="media-body">
          <h6 class="media-heading"> New Email From John</h6>
          <div class="text-muted fs-10px">2 hour ago</div>
        </div>
        </a>
        <div class="dropdown-footer text-center"> <a href="javascript:;" class="text-decoration-none">View more</a> </div>
      </div>
    </div>
    <div class="navbar-item navbar-user dropdown"> <a href="#" class="navbar-link dropdown-toggle d-flex align-items-center" data-bs-toggle="dropdown"> <img src="<?= base_url();?>assets/img/user.png" /> <span> <span class="d-none d-md-inline"><?= $name;?></span> <b class="caret"></b> </span> </a>
      <div class="dropdown-menu dropdown-menu-end me-1"> 
		  <a href="javascript:;" class="dropdown-item">Edit Profile</a> 
		  <a href="javascript:;" class="dropdown-item">Change Password</a> 
		  <a href="manage-contact.php" class="dropdown-item">Setting</a>
      <div class="dropdown-divider"></div>
      <a href="<?=base_url();?>dashboard/logout" onClick="if(confirm('Are you sure you want to log out?')){ return true;} else { return false; }" class="dropdown-item">Log Out</a> </div>
    </div>
  </div>
</div>
