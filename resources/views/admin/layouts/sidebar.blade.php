<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
        <div class="pull-left image">
        @if (Auth::user()->roles == 'admin')
            <img src="{{ asset('adminlte/dist/img/profile/profile.png') }}" class="img-circle" alt="User Image">
        @else
            @if (Auth::user()->avatar == null)
                <img src="{{ asset('adminlte/dist/img/profile/profile.png') }}" class="img-circle" alt="User Image">
            @else
                <img src="{{ asset('adminlte/dist/img/profile/' . Auth::user()->avatar) }}" class="img-circle" alt="User Image">
            @endif
        @endif 
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
        @if (Auth::user()->roles == 'admin')
        <li class="{{ set_active(['master', 'master/*']) }} treeview">
            <a href="#">
                <i class="fa fa-bank"></i> <span>Data Master</span>
                <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
                <li class="{{ set_active(['master/users', 'master/users/*']) }}"><a href="{{ url('master/users') }}"><i class="fa fa-circle-o"></i> Manage User </a></li>
                {{-- <li class="{{ set_active(['master/blok', 'master/blok/*']) }}"><a href="{{ url('master/blok') }}"><i class="fa fa-circle-o"></i> Blok </a></li>
                <li class="{{ set_active(['master/menu', 'master/menu/*']) }}"><a href="{{ url('master/menu') }}"><i class="fa fa-circle-o"></i> Menu </a></li> --}}
                <li class="{{ set_active(['master/opd', 'master/opd/*']) }}"><a href="{{ url('master/opd') }}"><i class="fa fa-circle-o"></i> OPD </a></li>
                <li class="{{ set_active(['master/bidang', 'master/bidang/*']) }}"><a href="{{ url('master/bidang') }}"><i class="fa fa-circle-o"></i> Bidang </a></li>
                <li class="{{ set_active(['master/subbidang', 'master/subbidang/*']) }}"><a href="{{ url('master/subbidang') }}"><i class="fa fa-circle-o"></i> Subbidang </a></li>
                <li class="{{ set_active(['master/jabatan-opd', 'master/jabatan-opd/*']) }}"><a href="{{ url('master/jabatan-opd') }}"><i class="fa fa-circle-o"></i> Jabatan </a></li>
                <li class="{{ set_active(['master/pejabat-opd', 'master/pejabat-opd/*']) }}"><a href="{{ url('master/pejabat-opd') }}"><i class="fa fa-circle-o"></i> Pejabat OPD </a></li>
                <li class="{{ set_active(['master/pejabat-bidang', 'master/pejabat-bidang/*']) }}"><a href="{{ url('master/pejabat-bidang') }}"><i class="fa fa-circle-o"></i> Pejabat Bidang </a></li>
                <li class="{{ set_active(['master/pejabat-subbidang', 'master/pejabat-subbidang/*']) }}"><a href="{{ url('master/pejabat-subbidang') }}"><i class="fa fa-circle-o"></i> Pejabat Subbidang </a></li>
            </ul>
        </li>
        @endif
        <li class="{{ set_active(['input', 'input/*']) }} treeview">
            <a href="#">
                <i class="fa fa-book"></i> <span>Data Input</span>
                <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
                <li class="{{ set_active(['input/berita', 'input/berita/*']) }}"><a href="{{ url('input/berita') }}"><i class="fa fa-circle-o"></i> Berita </a></li>
                <li class="{{ set_active(['input/gallery', 'input/gallery/*']) }}"><a href="{{ url('input/gallery') }}"><i class="fa fa-circle-o"></i> Gallery </a></li>
                <li class="{{ set_active(['input/rpjmd', 'input/rpjmd/*']) }}"><a href="{{ url('input/rpjmd') }}"><i class="fa fa-circle-o"></i> RPJMD </a></li>
                <li class="{{ set_active(['input/renstra', 'input/renstra/*']) }}"><a href="{{ url('input/renstra') }}"><i class="fa fa-circle-o"></i> RENSTRA </a></li>
                <li class="{{ set_active(['input/iku', 'input/iku/*']) }}"><a href="{{ url('input/iku') }}"><i class="fa fa-circle-o"></i> Indikator Kinerja Utama </a></li>
                <li class="{{ set_active(['input/ppk', 'input/ppk/*']) }}"><a href="{{ url('input/ppk') }}"><i class="fa fa-circle-o"></i> Rencana Program dan Kegiatan </a></li>
                <li class="{{ set_active(['input/perjanjianKinerja', 'input/perjanjianKinerja/*']) }}"><a href="{{ url('input/perjanjianKinerja') }}"><i class="fa fa-circle-o"></i> Perjanjian Kinerja </a></li>
                <li class="{{ set_active(['input/realisasiKinerja', 'input/realisasiKinerja/*']) }}"><a href="{{ url('input/realisasiKinerja') }}"><i class="fa fa-circle-o"></i> Realisasi Kinerja </a></li>
                <li class="{{ set_active(['input/pk3', 'input/pk3/*']) }}"><a href="{{ url('input/pk3') }}"><i class="fa fa-circle-o"></i> Perjanjian Kinerja Eselon III </a></li>
                <li class="{{ set_active(['input/pk4', 'input/pk4/*']) }}"><a href="{{ url('input/pk4') }}"><i class="fa fa-circle-o"></i> Perjanjian Kinerja Eselon IV </a></li>
                <li class="{{ set_active(['input/rencanaAnggaran', 'input/rencanaAnggaran/*']) }}"><a href="{{ url('input/rencanaAnggaran') }}"><i class="fa fa-circle-o"></i> Perencanaan Anggaran </a></li>
                <li class="{{ set_active(['input/realisasiAnggaran', 'input/realisasiAnggaran/*']) }}"><a href="{{ url('input/realisasiAnggaran') }}"><i class="fa fa-circle-o"></i> Realisasi Anggaran </a></li>
                <li class="{{ set_active(['input/capaian', 'input/capaian/*']) }}"><a href="{{ url('input/capaian') }}"><i class="fa fa-circle-o"></i> Capaian </a></li>
            </ul>
        </li>
        <li class="{{ set_active(['dokumen', 'dokumen/*']) }} treeview">
            <a href="#">
                <i class="fa fa-file"></i> <span>Dokumen</span>
                <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
                <li class="{{ set_active(['dokumen/lakip', 'dokumen/lakip/*']) }}"><a href="{{ url('dokumen/lakip') }}"><i class="fa fa-circle-o"></i> Lakip </a></li>
                <li class="{{ set_active(['dokumen/evaluasi', 'dokumen/evaluasi/*']) }}"><a href="{{ url('dokumen/evaluasi') }}"><i class="fa fa-circle-o"></i> Evaluasi </a></li>
            </ul>
        </li>

        <li class="header">KRITERIA</li>
        <li><a href="{{ url('kriteria/1') }}"><i class="fa fa-circle-o text-blue"></i> <span>a = Sangat Baik (90-100)</span></a></li>
        <li><a href="{{ url('kriteria/2') }}"><i class="fa fa-circle-o text-green"></i> <span>b = Baik (75-89)</span></a></li>
        <li><a href="{{ url('kriteria/3') }}"><i class="fa fa-circle-o text-yellow"></i> <span>c = Kurang Baik (51-74)</span></a></li>
        <li><a href="{{ url('kriteria/4') }}"><i class="fa fa-circle-o text-red"></i> <span>d = Tidak Baik (< 51)</span></a></li>
        <li><a href="{{ url('kriteria/5') }}"><i class="fa fa-circle-o text-grey"></i> <span>e = Tidak Ada Target</span></a></li>
    </ul>
    </section>
    <!-- /.sidebar -->
</aside>