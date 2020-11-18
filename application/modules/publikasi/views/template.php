<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="angkasa bahari software development tegal">
    <meta name="author" content="novalassalam | vkb | angkasa bahari">
    <meta name="robots" content="none">
    <link rel="shortcut icon"
        href="<?php echo base_url()?>assets/adminto/assets/images/favicon.ico">
    <title><?php echo $title;?> </title>
    <!--Morris Chart CSS -->
    <link rel="stylesheet"
        href="<?php echo base_url()?>assets/adminto/assets/plugins/morris/morris.css">

    <!-- App css -->
    <link
        href="<?php echo base_url()?>assets/adminto/assets/css/bootstrap.min.css"
        rel="stylesheet" type="text/css" />
    <link
        href="<?php echo base_url()?>assets/adminto/assets/css/icons.css"
        rel="stylesheet" type="text/css" />
    <link
        href="<?php echo base_url()?>assets/adminto/assets/css/style.css"
        rel="stylesheet" type="text/css" />
    <!-- DataTables -->
    <link 
        href="<?php echo base_url()?>assets/adminto/assets/plugins/datatables/dataTables.bootstrap4.min.css" 
        rel="stylesheet" type="text/css" />
    <link 
        href="<?php echo base_url()?>assets/adminto/assets/plugins/datatables/buttons.bootstrap4.min.css" 
        rel="stylesheet" type="text/css" />
    <!-- Custom box css -->
    <link href="<?php echo base_url()?>assets/adminto/assets/plugins/custombox/dist/custombox.min.css" rel="stylesheet" type="text/css" />
    <!-- Sweet Alert css -->
    <link href="<?php echo base_url()?>assets/adminto/assets/plugins/sweet-alert/sweetalert2.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url()?>assets/adminto/assets/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url()?>assets/adminto/assets/plugins/multiselect/css/multi-select.css"  rel="stylesheet" type="text/css" />
    <!-- form Uploads -->
    <link href="<?php echo base_url()?>assets/adminto/assets/plugins/fileuploads/css/dropify.min.css" rel="stylesheet" type="text/css" />
    <script
        src="<?php echo base_url()?>assets/adminto/assets/js/modernizr.min.js">
    </script>
    <script src="<?php echo base_url()?>assets/adminto/assets/js/jquery.min.js">
    </script>

</head>

<body class="fixed-left">
    <!-- Begin page -->
    <div id="wrapper">
        <!-- Top Bar Start -->
        <div class="topbar">
            <!-- LOGO -->
            <div class="topbar-left">
                <a href="index.html" class="logo"><span>Simpendi<span>Phb</span></span><i class="mdi mdi-layers"></i></a>
            </div>
            <!-- Button mobile view to collapse sidebar menu -->
            <div class="navbar navbar-default" role="navigation">
                <div class="container-fluid">
                    <!-- Page title -->
                    <ul class="nav navbar-nav list-inline navbar-left">
                        <li class="list-inline-item">
                            <button class="button-menu-mobile open-left">
                                <i class="mdi mdi-menu"></i>
                            </button>
                        </li>
                        <li class="list-inline-item">
                            <h4 class="page-title"><?php echo $title;?>
                            </h4>
                        </li>
                    </ul>
                    <nav class="navbar-custom">
                        <ul class="list-unstyled topbar-right-menu float-right mb-0">
                            <li>
                                <!-- Notification -->
                                <div class="notification-box">
                                    <ul class="list-inline mb-0">
                                        <li>
                                            <a href="javascript:void(0);" class="right-bar-toggle">
                                                <i class="mdi mdi-bell-outline noti-icon"></i>
                                            </a>
                                            <div class="noti-dot">
                                                <span class="dot"></span>
                                                <span class="pulse"></span>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <!-- End Notification bar -->
                            </li>
                            <!-- <li class="hide-phone">
                                <form class="app-search">
                                    <input type="text" placeholder="Search..." class="form-control">
                                    <button type="submit"><i class="fa fa-search"></i></button>
                                </form>
                            </li> -->
                        </ul>
                    </nav>
                </div><!-- end container -->
            </div><!-- end navbar -->
        </div>
        <!-- Top Bar End -->
        <!-- ========== Left Sidebar Start ========== -->
        <div class="left side-menu">
            <div class="sidebar-inner slimscrollleft">
                <!-- User -->
                <div class="user-box">
                    <div class="user-img">
                        <img src="<?php echo $this->foto;?>"
                            alt="user-img"
                            title="<?php echo $this->username;?>"
                            class="rounded-circle img-thumbnail img-responsive">
                        <div class="user-status offline"><i class="mdi mdi-adjust"></i></div>
                    </div>
                    <h5><a href="#"><?php echo $this->name;?></a>
                    </h5>
                    <ul class="list-inline">

                        <li class="list-inline-item">
                            <a href="<?php echo $this->logout;?>"
                                class="text-danger">
                                <i class="mdi mdi-power" style="font-size:30px"></i>
                            </a>
                        </li>
                    </ul>
                </div>
                <!-- End User -->
                <!--- Sidemenu -->
                <div id="sidebar-menu">
                    <ul>
                        <li class="text-muted menu-title">Navigation</li>
                        <li>
                            <a href="<?php echo base_url('operator');?>" class="waves-effect"><i class="mdi mdi-view-dashboard"></i> <span> Dashboard </span> </a>
                        </li>
                        <li class="has_sub">
                            <a href="javascript:void(0);" class="waves-effect"><i class="fa fa-share-alt"></i><span>Luaran </span> <span class="menu-arrow"></span></a>
                            <ul class="list-unstyled">
                                <li><a href="<?php echo base_url('publikasi/Jurnal/');?>">Jurnal</a></li>
                                <li><a href="<?php echo base_url('publikasi/Pemakalah');?>">Pemakalah Forum Ilmiah</a></li>
                                <li><a href="<?php echo base_url('publikasi/Hki');?>">HKI</a></li>
                                <li><a href="<?php echo base_url('publikasi/Buku');?>">Buku</a></li>
                                <li><a href="<?php echo base_url('publikasi/Media');?>">Media Masa</a></li>
                            </ul>
                        </li>
                        <li class="has_sub">
                            <a href="javascript:void(0);" class="waves-effect"><i class="fa fa-trophy"></i><span>Reward </span> <span class="menu-arrow"></span></a>
                            <ul class="list-unstyled">
                                <li><a href="<?php echo base_url('publikasi/Reward/insert');?>">Usulan Reward</a></li>
                                <li><a href="<?php echo base_url('publikasi/Reward/');?>">Perolehan Reward</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="<?php echo $this->logout;?>" class="waves-effect"><i class="fa fa-power-off"></i> <span> Logout </span> </a>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <!-- Sidebar -->
                <div class="clearfix"></div>
            </div>
        </div>
        <!-- Left Sidebar End -->
        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="content-page">
            <div class="content">
                <?php echo $this->session->flashdata('report'); ?>
                <?php echo $this->session->flashdata('notif'); ?>
                <?php $this->load->view($page);?>
            </div>
            <footer class="footer text-right">
                © angkasabahari.co.id
            </footer>
        </div>
        <!-- ============================================================== -->
        <!-- End Right content here -->
        <!-- ============================================================== -->
        <!-- Right Sidebar -->
        <div class="side-bar right-bar">
            <a href="javascript:void(0);" class="right-bar-toggle">
                <i class="mdi mdi-close-circle-outline"></i>
            </a>
            <h4 class="">Notifications</h4>
            <div class="notification-list nicescroll">
                <ul class="list-group list-no-border user-list">
                    <li class="list-group-item">
                        <a href="#" class="user-list-item">
                            <div class="avatar">
                                <img src="<?php echo base_url()?>assets/adminto/assets/images/users/avatar-2.jpg"
                                    alt="">
                            </div>
                            <div class="user-desc">
                                <span class="name">Michael Zenaty</span>
                                <span class="desc">There are new settings available</span>
                                <span class="time">2 hours ago</span>
                            </div>
                        </a>
                    </li>
                    <li class="list-group-item">
                        <a href="#" class="user-list-item">
                            <div class="icon bg-info">
                                <i class="mdi mdi-account"></i>
                            </div>
                            <div class="user-desc">
                                <span class="name">New Signup</span>
                                <span class="desc">There are new settings available</span>
                                <span class="time">5 hours ago</span>
                            </div>
                        </a>
                    </li>
                    <li class="list-group-item">
                        <a href="#" class="user-list-item">
                            <div class="icon bg-pink">
                                <i class="mdi mdi-comment"></i>
                            </div>
                            <div class="user-desc">
                                <span class="name">New Message received</span>
                                <span class="desc">There are new settings available</span>
                                <span class="time">1 day ago</span>
                            </div>
                        </a>
                    </li>
                    <li class="list-group-item active">
                        <a href="#" class="user-list-item">
                            <div class="avatar">
                                <img src="<?php echo base_url()?>assets/adminto/assets/images/users/avatar-3.jpg"
                                    alt="">
                            </div>
                            <div class="user-desc">
                                <span class="name">James Anderson</span>
                                <span class="desc">There are new settings available</span>
                                <span class="time">2 days ago</span>
                            </div>
                        </a>
                    </li>
                    <li class="list-group-item active">
                        <a href="#" class="user-list-item">
                            <div class="icon bg-warning">
                                <i class="mdi mdi-settings"></i>
                            </div>
                            <div class="user-desc">
                                <span class="name">Settings</span>
                                <span class="desc">There are new settings available</span>
                                <span class="time">1 day ago</span>
                            </div>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <!-- /Right-bar -->
    </div>
    <!-- END wrapper -->
    <!-- jQuery  -->


    <script src="<?php echo base_url()?>assets/adminto/assets/js/popper.min.js">
    </script>
    <script
        src="<?php echo base_url()?>assets/adminto/assets/js/bootstrap.min.js">
    </script>
    <script src="<?php echo base_url()?>assets/adminto/assets/js/detect.js">
    </script>
    <script src="<?php echo base_url()?>assets/adminto/assets/js/fastclick.js">
    </script>
    <script
        src="<?php echo base_url()?>assets/adminto/assets/js/jquery.blockUI.js">
    </script>
    <script src="<?php echo base_url()?>assets/adminto/assets/js/waves.js">
    </script>
    <script
        src="<?php echo base_url()?>assets/adminto/assets/js/jquery.nicescroll.js">
    </script>
    <script
        src="<?php echo base_url()?>assets/adminto/assets/js/jquery.slimscroll.js">
    </script>
    <script
        src="<?php echo base_url()?>assets/adminto/assets/js/jquery.scrollTo.min.js">
    </script>
    <!-- KNOB JS -->
    <!--[if IE]>
<script type="text/javascript" src="assets/plugins/jquery-knob/excanvas.js"></script>
<![endif]-->
    <script
        src="<?php echo base_url()?>assets/adminto/assets/plugins/jquery-knob/jquery.knob.js">
    </script>
    <!--Morris Chart-->
    <script
        src="<?php echo base_url()?>assets/adminto/assets/plugins/morris/morris.min.js">
    </script>
    <script
        src="<?php echo base_url()?>assets/adminto/assets/plugins/raphael/raphael-min.js">
    </script>
    <!-- Dashboard init -->
    <script
        src="<?php echo base_url()?>assets/adminto/assets/pages/jquery.dashboard.js">
    </script>
    <!-- App js -->
    <script
        src="<?php echo base_url()?>assets/adminto/assets/js/jquery.core.js">
    </script>
    <script src="<?php echo base_url()?>assets/adminto/assets/js/jquery.app.js">
    </script>
    <!-- Sweet Alert Js  -->
    <script src="<?php echo base_url()?>assets/adminto/assets/plugins/sweet-alert/sweetalert2.min.js"></script>
    <script src="<?php echo base_url()?>assets/adminto/assets/pages/jquery.sweet-alert.init.js"></script>
    <!-- Modal-Effect -->
    <script src="<?php echo base_url()?>assets/adminto/assets/plugins/custombox/dist/custombox.min.js"></script>
    <script src="<?php echo base_url()?>assets/adminto/assets/plugins/custombox/dist/legacy.min.js"></script>

</body>

</html>