<!-- ========== Left Sidebar Start ========== -->
<div class="left side-menu">
  <div class="slimscroll-menu" id="remove-scroll">
    <!--- Sidemenu -->
    <div id="sidebar-menu">
      <!-- Left Menu Start -->
      <ul class="metismenu" id="side-menu">
        <li>
          <a href="{{ route('dashboard') }}"><i class="fi-help"></i><span>Dashboard</span></a>
        </li>

        <li>
          <a href="javascript: void(0);"><i class="mdi mdi-lan"></i> <span> Category </span> <span
              class="menu-arrow"></span></a>
          <ul class="nav-second-level" aria-expanded="false">
            <li class="@yield('category_active')"><a href="{{ route('category.index') }}">All Category</a>
            </li>
          </ul>
        </li>

        <li>
          <a href="javascript: void(0);"><i class="fi-briefcase"></i> <span> Blogs </span> <span
              class="menu-arrow"></span></a>
          <ul class="nav-second-level" aria-expanded="false">
            <li><a href="{{ route('blog.index') }}">All Blogs</a></li>
            <li><a href="{{ route('blog.create') }}">Add Blog</a></li>
            <li><a href="{{ route('blogTrash') }}">Trashed</a></li>
          </ul>
        </li>

        <li class="@yield('setting_active')">
          <a href="{{ route('settings') }}"><i class="mdi mdi-settings"></i> <span> Settings </span></a>
        </li>
      </ul>
    </div>
    <!-- Sidebar -->
    <div class="clearfix"></div>

  </div>
  <!-- Sidebar -left -->
</div>
<!-- Left Sidebar End -->