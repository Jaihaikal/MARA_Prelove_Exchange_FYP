<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{route('user')}}">
      <div class="sidebar-brand-icon rotate-n-15">
        <i class="fas fa-laugh-wink"></i>
      </div>
      <div class="sidebar-brand-text mx-3">User</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
      <a class="nav-link" href="{{route('user')}}">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
            Shop
        </div>
    <!--Orders -->
    <li class="nav-item">
        <a class="nav-link" href="{{route('user.order.index')}}">
            <i class="fas fa-hammer fa-chart-area"></i>
            <span>Orders</span>
        </a>
    </li>

    <!-- Reviews -->
    <li class="nav-item">
        <a class="nav-link" href="{{route('user.productreview.index')}}">
            <i class="fas fa-comments"></i>
            <span>Reviews</span></a>
    </li>
    

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
      Bussiness
    </div>
    <li class="nav-item">
      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#productCollapse" aria-expanded="true" aria-controls="productCollapse">
        <i class="fas fa-cubes"></i>
        <span>Your Products</span>
      </a>
      <div id="productCollapse" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
          <h6 class="collapse-header">Product Options:</h6>
          <a class="collapse-item" href="{{ route('user.product.index') }}"> Product</a>
          <a class="collapse-item" href="{{ route('user.product.create')}}">Add Product</a>
        </div>
      </div>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="{{route('seller.order.index')}}">
        <i class="fas fa-hammer fa-chart-area"></i>
        <span>Your Orders</span>
    </a>
</li>  
  <!-- Comments -->
    <li class="nav-item">
      <a class="nav-link" href="{{route('user.post-comment.index')}}">
          <i class="fas fa-comments fa-chart-area"></i>
          <span>Comments</span>
      </a>
    </li>

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
      <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>