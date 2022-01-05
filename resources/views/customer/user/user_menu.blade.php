<div class="dashboard_menu">
    <ul class="nav nav-tabs flex-column" role="tablist">
      <li class="nav-item">
        <a href="{{route('user.profile')}}" class="nav-link {{request()->routeIs('user.profile') ? 'active' : ''}}" id="dashboard-tab" ><i class="ti-layout-grid2"></i>Profile</a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{request()->routeIs('user.orders') ? 'active' : ''}}" id="orders-tab" href="{{route('user.orders')}}"><i class="ti-shopping-cart-full"></i>Orders</a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{request()->routeIs('user.addresses') ? 'active' : ''}}" id="address-tab" href="{{route('user.addresses')}}"><i class="ti-location-pin"></i>My Address</a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{request()->routeIs('user.detail') ? 'active' : ''}}" id="account-detail-tab" href="{{route('user.detail')}}"><i class="ti-id-badge"></i>Account details</a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{request()->routeIs('user.favorites') ? 'active' : ''}}" id="account-detail-tab" href="{{route('user.favorites')}}"><i class="ti-star"></i>My Favorites</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="login.html"><i class="ti-lock"></i>Logout</a>
      </li>
    </ul>
</div>