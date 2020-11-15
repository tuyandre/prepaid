<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
<?php
$user =Auth::user();
$name=Auth::user()->name;
$photo=Auth::user()->profile;
?>
<!-- Brand Logo -->
    <a href="{{url('/home')}}" class="brand-link">
        <img src="/data/assets/logo.jpg" alt="AdminLTE Logo" class="brand-image img-circle elevation-3 admin-logo"
             style="opacity: .8">
        <span class="brand-text font-weight-light">Prepaid</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                @if(!empty($photo))
                    <img src="{{ asset('/profiles/'.Auth::user()->profile)}}" class="img-circle elevation-2 admin-profile3" alt="User Image">
                @else
                    <img src="{{ asset('/profiles/admin.png')}}" class="img-circle elevation-2 admin-profile3" alt="User Image" >
                @endif
            </div>
            <div class="info">
                <a href="#" class="d-block">{{$name}}</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->

                <li class="nav-header">MAIN NAVIGATION</li>
                <li class="nav-item has-treeview menu-open">
                    <a href="/home#/home" class="nav-link active">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>

                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fa fa-user"></i>
                        <p>
                            <span>Account Profile</span>
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/home#/changePassword" class="nav-link">
                                <i class="fa fa-key nav-icon"></i>
                                <p> Change Password</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/home#/editProfile" class="nav-link">
                                <i class="fas fa-user-edit nav-icon"></i>
                                <p>Edit Profile</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/home#/profile" class="nav-link">
                                <i class="fas fa-user-edit nav-icon"></i>
                                <p>Change Profile Photo</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/home#/fullProfile" class="nav-link">
                                <i class="far fa-user-circle nav-icon"></i>
                                <p>View Full Profile</p>
                            </a>
                        </li>

                    </ul>
                </li>

                @role('admin')
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fa fa-cogs"></i>
                        <p>
                            <span>Roles</span>
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/home#/addRole" class="nav-link">
                                <i class="fa fa-wrench nav-icon"></i>
                                <p> Add Role</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/home#/allRole" class="nav-link">
                                <i class="fas fa-cog nav-icon"></i>
                                <p>All Roles</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fa fa-users"></i>
                        <p>
                            <span>Users</span>
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/home#/addUser" class="nav-link">
                                <i class="fa fa-user-plus nav-icon"></i>
                                <p> Add User</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/home#/allUser" class="nav-link">
                                <i class="fas fa-users nav-icon"></i>
                                <p>All Users</p>
                            </a>
                        </li>
                    </ul>
                </li>


@endrole




                @role('register')

                <li class="nav-item">
                    <a href="/home#/allClient" class="nav-link">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            Clients
                        </p>
                    </a>
                </li>
                @endrole
                @role('agent')
                <li class="nav-item">
                    <a href="/home#/waterBill" class="nav-link">
                        <i class="nav-icon fas fa-dollar-sign"></i>
                        <p>
                            Buy Water
                        </p>
                    </a>
                </li>
                @endrole
                @role('admin|register')
                <li class="nav-item">
                    <a href="/home#/billRecord" class="nav-link">
                        <i class="nav-icon fa fa fa-file-excel"></i>
                        <p>
                            Water Bill Record
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/home#/waterUsage" class="nav-link">
                        <i class="nav-icon fa fa fa-file-excel"></i>
                        <p>
                            Water Usage
                        </p>
                    </a>
                </li>


                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                      <i class="nav-icon fas fa-file-pdf"></i>
                      <p>
                        Reports
                        <i class="fas fa-angle-left right"></i>
                      </p>
                    </a>
                    <ul class="nav nav-treeview">
                      <li class="nav-item">
                        <a href="/home#/client/report" class="nav-link">
                          <i class="fa fa fa-file-pdf nav-icon"></i>
                          <i class="fa fa fa-users nav-icon"></i>
                          <p>Clients</p>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a href="/home#/waterBillRecord/report" class="nav-link">
                          <i class="far fa-file-pdf nav-icon"></i>
                          <i class="far fa-dollar-sign nav-icon"></i>
                          <p>Water Bill Record</p>
                        </a>
                      </li>
                    </ul>
                  </li>
                @endrole



            </ul>

        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
