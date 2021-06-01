<div class="sidebar" data-color="orange" data-background-color="white" data-image="{{ asset('material') }}/img/sidebar-1.jpg">
  <!--
      Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

      Tip 2: you can also add an image using data-image tag
  -->
  <div class="logo">
    <a href="#" class="simple-text logo-normal">
      <img src="{{asset('images/serempre.png')}}" alt="Serempre" class="p-1" style="width: 100%">
      {{-- {{ __('Serempre') }} --}}
    </a>
  </div>
  <div class="sidebar-wrapper">
    <ul class="nav">
      <li class="nav-item{{ $activePage == 'dashboard' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('home') }}">
          <i class="material-icons">dashboard</i>
            <p>{{ __('Dashboard') }}</p>
        </a>
      </li>
      <li class="nav-item{{ $activePage == 'clients' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('clients') }}">
          <i class="material-icons">contact_phone</i>
            <p>{{ __('Clientes') }}</p>
        </a>
      </li>
      <li class="nav-item{{ $activePage == 'cities' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('cities') }}">
          <i class="material-icons">location_city</i>
            <p>{{ __('Ciudades') }}</p>
        </a>
      </li>
      <li class="nav-item{{ $activePage == 'users' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('users') }}">
          <i class="material-icons">person</i>
            <p>{{ __('Usuarios') }}</p>
        </a>
      </li>
    </ul>
  </div>
</div>
