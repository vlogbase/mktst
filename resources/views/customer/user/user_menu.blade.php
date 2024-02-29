<div class="dashboard_menu">
    <ul class="nav nav-tabs flex-column" role="tablist">
      <li class="nav-item">
        <a href="{{route('user.profile')}}" class="nav-link {{request()->routeIs('user.profile') ? 'active' : ''}}" id="dashboard-tab" ><i class="ti-layout-grid2"></i>Profile</a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{request()->routeIs('user.orders') ? 'active' : ''}}" id="orders-tab" href="{{route('user.orders')}}"><i class="ti-shopping-cart-full"></i>Orders</a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{request()->routeIs('user.addresses') ? 'active' : ''}}" id="address-tab" href="{{route('user.addresses')}}"><i class="ti-location-pin"></i>Addresses</a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{request()->routeIs('user.detail') ? 'active' : ''}}" id="account-detail-tab" href="{{route('user.detail')}}"><i class="ti-id-badge"></i>Account details</a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{request()->routeIs('user.payments') ? 'active' : ''}}" id="account-detail-tab" href="{{route('user.payments')}}"><i class="ti-wallet"></i>Payment Methods</a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{request()->routeIs('user.favorites') ? 'active' : ''}}" id="account-detail-tab" href="{{route('user.favorites')}}"><i class="ti-star"></i>My Favorites</a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{request()->routeIs('user.tickets') ? 'active' : ''}}" id="account-detail-tab" href="{{route('user.tickets')}}"><i class="ti-help"></i>Support Ticket</a>
      </li>
      <li class="nav-item">
        <form method="POST" action="{{route('user.logout')}}">
          {{csrf_field()}}
          <a href="" class="nav-link" onclick="event.preventDefault();
      this.closest('form').submit();">
        <i class="ti-lock"></i>Logout</a>
      </form>
      </li>
  
    </ul>
</div>