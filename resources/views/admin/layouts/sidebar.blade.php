<?php $url = url()->current(); ?>

<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('admin.home') }}" class="brand-link">
      <img src="{{ asset('admin/dist/img/avatar1.jpg') }}" alt="PECA's Blog" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light"><strong>PECA's</strong> Blog</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('admin/dist/img/image11.png') }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="" class="d-block">{{ Auth::user()->name }} {{ Auth::user()->surname }}</a>
          <small style="color: white;">Member since {{ Auth::user()->created_at->toFormattedDateString() }}</small>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Blog
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('post.index') }}"
                  <?php if (preg_match("/post/i", $url)) { ?> class="nav-link active" <?php } else { ?> class="nav-link" <?php } ?>>
                  <i class="far fa-circle nav-icon"></i>
                  <p>Posts</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('category.index') }}"
                  <?php if (preg_match("/category/i", $url)) { ?> class="nav-link active" <?php } else { ?> class="nav-link" <?php } ?>>
                  <i class="far fa-circle nav-icon"></i>
                  <p>Categories</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('tag.index') }}"
                  <?php if (preg_match("/tag/i", $url)) { ?> class="nav-link active" <?php } else { ?> class="nav-link" <?php } ?>>
                  <i class="far fa-circle nav-icon"></i>
                  <p>Tags</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('user.index') }}"
                  <?php if (preg_match("/user/i", $url)) { ?> class="nav-link active" <?php } else { ?> class="nav-link" <?php } ?>>
                  <i class="far fa-circle nav-icon"></i>
                  <p>Users</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('role.index') }}"
                  <?php if (preg_match("/role/i", $url)) { ?> class="nav-link active" <?php } else { ?> class="nav-link" <?php } ?>>
                  <i class="far fa-circle nav-icon"></i>
                  <p>Roles</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('permission.index') }}"
                  <?php if (preg_match("/permission/i", $url)) { ?> class="nav-link active" <?php } else { ?> class="nav-link" <?php } ?>>
                  <i class="far fa-circle nav-icon"></i>
                  <p>Permissions</p>
                </a>
              </li>
            </ul>
          </li>
     
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>