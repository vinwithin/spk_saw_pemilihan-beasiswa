<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
      <div class="sidebar-brand">
        <a href="index.html">SPK Pemilihan Beasiswa</a>
      </div>
      <div class="sidebar-brand sidebar-brand-sm">
        <a href="index.html">St</a>
      </div>
      <ul class="sidebar-menu">
        <li class="menu-header">Dashboard</li>
        <li class="dropdown {{ Request::is('/') ? 'active' : '' }} ">
          <a href="/" class="nav-link "><i class="fa-solid fa-house"></i><span>Dashboard</span></a>
          
        </li>
        <li class="menu-header">Menu</li>
        <li class="dropdown {{ Request::is('alternatif*') ? 'active' : '' }}">
          <a href="/alternatif" class="nav-link " ><i class="fa-regular fa-book"></i> <span>Alternatif</span></a>
          
        </li>
        <li class="dropdown {{ Request::is('kriteria*') ? 'active' : '' }}">
          <a href="/kriteria" class="nav-link "><i class="fas fa-columns"></i> <span>Kriteria</span></a>
          
        </li>
        <li class="dropdown {{ Request::is('hitung*') ? 'active' : '' }}">
          <a href="/hitung" class="nav-link "><i class="fa-solid fa-square-poll-vertical"></i> <span>Hitung</span></a>
          
        </li>
       
      

             </aside>
  </div>