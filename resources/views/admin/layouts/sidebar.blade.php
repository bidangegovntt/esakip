<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
        <div class="pull-left image">
        <img src="{{ asset('adminlte/dist/img/user2-160x160.jpg') }}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
        <p>{{ Auth::user()->name }}</p>
        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
    </div>
    <!-- search form -->
    <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
        <input type="text" name="q" class="form-control" placeholder="Search...">
        <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
            </span>
        </div>
    </form>
    <!-- /.search form -->
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MENU NAVIGASI</li>
        <li class="{{ set_active(['home']) }} treeview">
            <a href="#">
                <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
                <li class="{{ set_active(['home']) }}"><a href="{{ url('/home') }}"><i class="fa fa-circle-o"></i> Dashboard </a></li>
            </ul>
        </li>
        <li class="{{ set_active(['master', 'master/*']) }} treeview">
            <a href="#">
                <i class="fa fa-bank"></i> <span>Data Master</span>
                <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
                <li class="{{ set_active(['master/users', 'master/users/*']) }}"><a href="{{ url('master/users') }}"><i class="fa fa-circle-o"></i> Manage User </a></li>
                <li class="{{ set_active(['master/blok', 'master/blok/*']) }}"><a href="{{ url('master/blok') }}"><i class="fa fa-circle-o"></i> Blok </a></li>
                <li class="{{ set_active(['master/menu', 'master/menu/*']) }}"><a href="{{ url('master/menu') }}"><i class="fa fa-circle-o"></i> Menu </a></li>
                <li class="{{ set_active(['master/bidang', 'master/bidang/*']) }}"><a href="{{ url('master/bidang') }}"><i class="fa fa-circle-o"></i> Bidang </a></li>
                <li class="{{ set_active(['master/subbidang', 'master/subbidang/*']) }}"><a href="{{ url('master/subbidang') }}"><i class="fa fa-circle-o"></i> Subbidang </a></li>
                <li class="{{ set_active(['master/jabatan-opd', 'master/jabatan-opd/*']) }}"><a href="{{ url('master/jabatan-opd') }}"><i class="fa fa-circle-o"></i> Jabatan </a></li>
                <li class="{{ set_active(['master/pejabat-opd', 'master/pejabat-opd/*']) }}"><a href="{{ url('master/pejabat-opd') }}"><i class="fa fa-circle-o"></i> Pejabat OPD </a></li>
                <li class="{{ set_active(['master/pejabat-bidang', 'master/pejabat-bidang/*']) }}"><a href="{{ url('master/pejabat-bidang') }}"><i class="fa fa-circle-o"></i> Pejabat Bidang </a></li>
                <li class="{{ set_active(['master/pejabat-subbidang', 'master/pejabat-subbidang/*']) }}"><a href="{{ url('master/pejabat-subbidang') }}"><i class="fa fa-circle-o"></i> Pejabat Subbidang </a></li>
            </ul>
        </li>
        <li class="{{ set_active(['input', 'input/*']) }} treeview">
            <a href="#">
                <i class="fa fa-book"></i> <span>Data Input</span>
                <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
                <li class="{{ set_active(['input/rpjmd', 'input/rpjmd/*']) }}"><a href="{{ url('input/rpjmd') }}"><i class="fa fa-circle-o"></i> RPJMD </a></li>
                <li class="{{ set_active(['input/renstra', 'input/renstra/*']) }}"><a href="{{ url('input/renstra') }}"><i class="fa fa-circle-o"></i> RENSTRA </a></li>
                <li class=""><a href="index.html"><i class="fa fa-circle-o"></i> Indikator Kinerja Utama </a></li>
                <li class=""><a href="index.html"><i class="fa fa-circle-o"></i> Rencana Program dan Kegiatan </a></li>
                <li class=""><a href="index.html"><i class="fa fa-circle-o"></i> Perjanjian Kinerja </a></li>
                <li class=""><a href="index.html"><i class="fa fa-circle-o"></i> Realisasi Kinerja </a></li>
                <li class=""><a href="index.html"><i class="fa fa-circle-o"></i> Perjanjian Kinerja Eselon III </a></li>
                <li class=""><a href="index.html"><i class="fa fa-circle-o"></i> Perjanjian Kinerja Eselon IV </a></li>
                <li class=""><a href="index.html"><i class="fa fa-circle-o"></i> Perencanaan Anggaran </a></li>
                <li class=""><a href="index.html"><i class="fa fa-circle-o"></i> Realisasi Anggaran </a></li>
            </ul>
        </li>
        <li class="treeview">
            <a href="#">
                <i class="fa fa-file"></i> <span>Dokumen</span>
                <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
                <li class=""><a href="index.html"><i class="fa fa-circle-o"></i> Lakip </a></li>
                <li class=""><a href="index.html"><i class="fa fa-circle-o"></i> Evaluasi </a></li>
            </ul>
        </li>

        <li class="header">KRITERIA</li>
        <li><a href="#"><i class="fa fa-circle-o text-red"></i> <span>Important</span></a></li>
        <li><a href="#"><i class="fa fa-circle-o text-yellow"></i> <span>Warning</span></a></li>
        <li><a href="#"><i class="fa fa-circle-o text-aqua"></i> <span>Information</span></a></li>
    </ul>
    </section>
    <!-- /.sidebar -->
</aside>