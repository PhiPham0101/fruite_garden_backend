<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
      {{-- <img src="/template/admin/dist/img/Otus_Logo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8"> --}}
      <span class="brand-text font-weight-light">Fruité Garden</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"  data-accordion="false">
          <li class="nav-item menu-is-opening menu-open">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>
                NHÓM SẢN PHẨM
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/admin/category/add" class="nav-link">
                  {{-- <i class="far fa-circle nav-icon"></i> --}}
                  <p>1. Thêm nhóm sản phẩm</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/admin/category/list" class="nav-link">
                  {{-- <i class="far fa-circle nav-icon"></i> --}}
                  <p>2. Danh sách nhóm sản phẩm</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item menu-is-opening menu-open">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tree"></i>
              <p>
                SẢN PHẨM
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/admin/products/add" class="nav-link">
                  {{-- <i class="far fa-circle nav-icon"></i> --}}
                  <p>1. Thêm Sản phẩm</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/admin/products/list" class="nav-link">
                  {{-- <i class="far fa-circle nav-icon"></i> --}}
                  <p>2. Danh sách Sản phẩm</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item menu-is-opening menu-open">
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-plus-square"></i>
              <p>
                Đơn hàng
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/admin/orders/list" class="nav-link">               
                  <p>1. Quản lý đơn đặt hàng</p>
                </a>
              </li>
            </ul>
          </li>

        </ul>
      </nav>
    </div>
  </aside>