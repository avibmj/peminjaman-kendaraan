<aside id="sidebar" class="sidebar">

    @if(auth()->user()->role === 'user-admin')
    <ul class="sidebar-nav" id="sidebar-nav">
      <li class="nav-item">
        <a class="nav-link " href="{{ route('dashboard') }}">
          <i class="bi bi-file-arrow-down"></i>
          <span>Pemohon</span>
        </a>
      </li><!-- End Dashboard Nav -->
    </ul>
    
    <ul class="sidebar-nav" id="sidebar-nav">
      <li class="nav-item">
        <a class="nav-link " href="{{ route('realisasi.create') }}">
          <i class="bi bi-file-check"></i>
          <span>Realisasi Perjalanan</span>
        </a>
      </li><!-- End Dashboard Nav -->
    </ul>
    @endif
    <ul class="sidebar-nav" id="sidebar-nav">
      <li class="nav-item">
        <a class="nav-link " href="{{ route('cetak') }}">
          <i class="bi bi-printer"></i>
          <span>Cetak</span>
        </a>
      </li><!-- End Dashboard Nav -->
    </ul>
    @if(auth()->user()->role === 'super-admin')
    <ul class="sidebar-nav" id="sidebar-nav">
      <li class="nav-item">
        <a class="nav-link " href="{{ route('user') }}">
          <i class="bi bi-person-vcard"></i>
          <span>User</span>
        </a>
      </li><!-- End Dashboard Nav -->
    </ul>

    <ul class="sidebar-nav" id="sidebar-nav">
      <li class="nav-item">
        <a class="nav-link " href="{{ route('mobil') }}">
          <i class="bi bi-car-front"></i>
          <span>Mobil</span>
        </a>
      </li><!-- End Dashboard Nav -->
    </ul>
    @endif
  </aside>