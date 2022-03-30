<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="navbar-brand">
          <a class="nav-link" href="/"><i class="fa fa-home"></i> Home<span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item {{ Route::is('customer.index') ? 'active' : '' }}">
          <a class="nav-link" href="{{ route('customer.index') }}">Customers</a>
        </li>
        <li class="nav-item {{ Route::is('product.index') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('product.index') }}">Products</a>
        </li>
        <li class="nav-item {{ Route::is('order.index') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('order.index') }}">Orders</a>
        </li>
      </ul>

    </div>
  </nav>
