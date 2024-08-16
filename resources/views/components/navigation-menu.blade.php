<nav class="navbar navbar-expand-lg bg-body-tertiary fixed-top">
    <div class="container-fluid">
      <div>
        {{-- <a class="navbar-brand" href="{{ config('app.url') }}">{{ config('app.name') }}</a> --}}
        <a class="navbar-brand" href="{{ config('app.url') }}"><img src="https://laravel.com/img/logomark.min.svg"/></a>
      </div>
      <div>
        <a class="navbar-brand" href="{{ config('app.url') }}"><i class="bi bi-share-fill"></i></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          {{-- <span class="navbar-toggler-icon"></span> --}}
          <i class="bi bi-three-dots-vertical"></i>
        </button>
      </div>

      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">

          <x-nav-link :active="request()->routeIs('home')" href="{{ route('home') }}">Home</x-nav-link>


          <x-nav-link :active="request()->routeIs('items.index')" href="{{ route('items.index') }}">Makanan</x-nav-link>
          <x-nav-link :active="request()->routeIs('outlets.index')" href="{{ route('outlets.index') }}">Outlet</x-nav-link>
          <x-nav-link :active="request()->routeIs('prices.index')" href="{{ route('prices.index') }}">Harga</x-nav-link>

          <x-nav-link :active="request()->routeIs('features.show')" href="{{ route('features.show') }}">Features</x-nav-link>


          {{-- <x-nav-link :active="request()->routeIs('welcome')" href="{{ route('welcome') }}">Home</x-nav-link> --}}
          {{-- <x-nav-link :active="request()->routeIs('about')" href="{{ route('about') }}">About</x-nav-link> --}}
          {{-- <x-nav-link :active="request()->routeIs('contact')" href="{{ route('contact') }}">Contact</x-nav-link> --}}
          {{-- <x-nav-link :active="request()->routeIs('counter')" href="{{ route('counter') }}">Counter</x-nav-link> --}}
          {{-- <x-nav-link :active="request()->routeIs('users.index')" href="{{ route('users.index') }}">Counter</x-nav-link> --}}
          {{-- <x-nav-link :active="request()->routeIs('users.show')" href="{{ route('users.show',[1]) }}">User</x-nav-link> --}}

          {{-- <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle {{ Request::routeIs('home') || Request::routeIs('about') || Request::routeIs('contact') ? 'active':'' }}" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Main Data
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item {{ Request::routeIs('about')?'active':'' }}" href="/about">Outlet</a></li>
              <li><a class="dropdown-item {{ Request::routeIs('contact')?'active':'' }}" href="/contact">Harga</a></li>
            </ul>
          </li>


          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Penjualan
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="/sales">Penjualan</a></li>
              <li><a class="dropdown-item" href="/return">Retur</a></li>
              <li><hr/></li>
              <li><a class="dropdown-item" href="/receivables">Piutang</a></li>
            </ul>
          </li>

          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Pembelian
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="/materials">Bahan Baku</a></li>
              <li><a class="dropdown-item" href="/assets">Aset</a></li>
              <li><a class="dropdown-item" href="/operasionals">Operasional</a></li>
              <li><a class="dropdown-item" href="/debt">Hutang</a></li>
            </ul>
          </li>

          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Kas Bank
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="/cash">Kas</a></li>
            </ul>
          </li> --}}
        </ul>   
      </div>
    </div>
  </nav>
