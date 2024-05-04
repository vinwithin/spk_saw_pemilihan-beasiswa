<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
      <div class="sidebar-brand">
        <a href="index.html">Stisla</a>
      </div>
      <div class="sidebar-brand sidebar-brand-sm">
        <a href="index.html">St</a>
      </div>
      <ul class="sidebar-menu">
        <li class="menu-header">Dashboard</li>
        <li class="dropdown {{ Request::is('/') ? 'active' : '' }} ">
          <a href="/" class="nav-link "><i class="fas fa-fire"></i><span>Dashboard</span></a>
          
        </li>
        <li class="menu-header">Menu</li>
        <li class="dropdown {{ Request::is('alternatif*') ? 'active' : '' }}">
          <a href="/alternatif" class="nav-link " ><i class="fas fa-columns"></i> <span>Alternatif</span></a>
          
        </li>
        <li class="dropdown {{ Request::is('kriteria*') ? 'active' : '' }}">
          <a href="/kriteria" class="nav-link "><i class="fas fa-columns"></i> <span>Kriteria</span></a>
          
        </li>
        <li class="dropdown {{ Request::is('hitung*') ? 'active' : '' }}">
          <a href="/hitung" class="nav-link "><i class="fas fa-columns"></i> <span>Hitung</span></a>
          
        </li>
       
      

      <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
        <a href="https://getstisla.com/docs" class="btn btn-primary btn-lg btn-block btn-icon-split">
          <i class="fas fa-rocket"></i> Documentation
        </a>
      </div>        </aside>
  </div>