<div id="sidebar" class="app-sidebar">
  <div class="app-sidebar-content find-link" data-scrollbar="true" data-height="100%">
    <div class="menu">
      <div class="menu-header">Navigation</div>
      <div class="menu-item">
        <a href="dashboard" class="menu-link">
          <div class="menu-icon"> <i class="fa fa-home"></i> </div>
          <div class="menu-text">Dashboard</div>
        </a>
      </div>

      <!-- <div class="menu-item">
        <a href="banner-management" class="menu-link">
          <div class="menu-icon"> <i class="fa fa-image"></i> </div>
          <div class="menu-text">Banner Management</div>
        </a>
      </div> -->
      <div class="menu-item has-sub"> <a href="javascript:;" class="menu-link">
          <div class="menu-icon"> <i class="fas fa-list"></i> </div>
          <div class="menu-text">Manage Customer</div>
          <div class="menu-caret"></div>
        </a>
        <div class="menu-submenu">
          <div class="menu-item">
            <a href="<?= base_url();?>create-customer" class="menu-link">
              <div class="menu-text">Add Customer</div>
            </a>
          </div>
          <div class="menu-item">
            <a href="<?= base_url();?>list-customer" class="menu-link">
              <div class="menu-text">List Customer</div>
            </a>
          </div>
        </div>
      </div>
      <div class="menu-item has-sub"> <a href="javascript:;" class="menu-link">
          <div class="menu-icon"> <i class="fas fa-list"></i> </div>
          <div class="menu-text">Current Booking</div>
          <div class="menu-caret"></div>
        </a>
        <div class="menu-submenu">
          <div class="menu-item">
            <a href="<?= base_url();?>create-booking" class="menu-link">
              <div class="menu-text">Add Booking</div>
            </a>
          </div>
          <div class="menu-item">
            <a href="<?= base_url();?>list-booking" class="menu-link">
              <div class="menu-text">List Booking</div>
            </a>
          </div>
        </div>
      </div>

      <!-- <div class="menu-item">
        <a href="order" class="menu-link">
          <div class="menu-icon"> <i class="fa fa-image"></i> </div>
          <div class="menu-text">Order Management</div>
        </a>
      </div> -->

      <div class="menu-item d-flex"> <a href="javascript:;" class="app-sidebar-minify-btn ms-auto" data-toggle="app-sidebar-minify"><i class="fa fa-angle-double-left"></i></a> </div>
    </div>
  </div>
</div>
<div class="app-sidebar-bg"></div>
<div class="app-sidebar-mobile-backdrop"><a href="#" data-dismiss="app-sidebar-mobile" class="stretched-link"></a></div>