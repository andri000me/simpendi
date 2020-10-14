
<div id="sidebar-menu">
    <ul>
        <li class="text-muted menu-title">Navigation</li>
        <li>
            <a href="<?php echo base_url('Belakang');?>" class="waves-effect"><i class="mdi mdi-view-dashboard"></i> <span> Dashboard </span> </a>
        </li>
        <li class="has_sub">
            <a href="javascript:void(0);" class="waves-effect"><i class="fa fa-user"></i><span>Akun </span> <span class="menu-arrow"></span></a>
            <ul class="list-unstyled">
                <li><a href="<?php echo base_url('Belakang/profil/edit');?>">Profil</a></li>
                <li><a href="<?php echo base_url('Belakang/profil/password/');?>">Password</a></li>
            </ul>
        </li>
        <li>
            <a href="<?php echo $this->logout;?>" class="waves-effect"><i class="fa fa-power-off"></i> <span> Logout </span> </a>
        </li>
    </ul>
    <div class="clearfix"></div>
</div>