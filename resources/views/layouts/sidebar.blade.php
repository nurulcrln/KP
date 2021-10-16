<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="{{ asset('AdminLTE-2/dist/img/user2-160x160.jpg') }}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>Admin-1</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li>
          <a href="{{ route('dashboard')}}">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
        </li>
        <li class="header">PRODUK</li>
        <li>
          <a href="{{ route('supplier.index')}}">
            <i class="fa fa-cubes"></i> <span>Supplier</span>
          </a>
        </li>
        <li>
          <a href="{{ route('kategori.index')}}">
            <i class="fa fa-cube"></i> <span>Kategori</span>
          </a>
        </li>
        <li>
          <a href="{{ route('subkategori.index')}}">
            <i class="fa fa-cube"></i> <span>Sub Kategori</span>
          </a>
        </li>
        <li>
          <a href="{{ route('produk.index')}}">
            <i class="fa fa-cubes"></i> <span>Item</span>
          </a>
        </li>
        
        <li class="header">TRANKSAKSI</li>
        <li>
          <a href="{{ route('customer.index')}}">
            <i class="fa fa-file"></i> <span>Customer</span>
          </a>
        </li>
        <li class="treeview">
          <a href="form.blade.php">
          <i class="fa fa-cart-arrow-down"></i>
            <span>Penawaran</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="pages/charts/chartjs.html"><i class="fa fa-circle-o"></i> Add Penawaran</a></li>
            <li><a href="pages/charts/morris.html"><i class="fa fa-circle-o"></i> List Penawaran</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-shopping-cart"></i>
            <span>Penjualan</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">

            <li><<a href="{{ route('penjualan.index')}}"><i class="fa fa-circle-o"></i> Add Penjualan</a></li>
            <li><a href="pages/charts/morris.html"><i class="fa fa-circle-o"></i> Riwayat Penjualan</a></li>
          </ul>
        </li>

        <li class="header">REPORT</li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-pie-chart"></i>
            <span>Report</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="pages/charts/chartjs.html"><i class="fa fa-circle-o"></i> Penawaran</a></li>
            <li><a href="pages/charts/morris.html"><i class="fa fa-circle-o"></i> Penjualan</a></li>
            <li><a href="pages/charts/morris.html"><i class="fa fa-circle-o"></i> Pemasukan</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-file"></i>
            <span>Dokumen</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="pages/charts/chartjs.html"><i class="fa fa-circle-o"></i> Surat Jalan</a></li>
            <li><a href="pages/charts/morris.html"><i class="fa fa-circle-o"></i> Invoice</a></li>
          </ul>
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>