<nav class="navbar navbar-expand-lg main-navbar sticky">
  <div class="form-inline mr-auto">
    <ul class="navbar-nav">
      <li>
        <a href="#" data-toggle="sidebar" class="nav-link nav-link-lg collapse-btn"> <i data-feather="align-justify"></i></a>
      </li>
      <li>
        <a href="#" class="nav-link nav-link-lg fullscreen-btn"><i data-feather="maximize"></i></a>
      </li>
      <li>
        <div class="search-element">
          <form class="form-inline">
            <input class="form-control rounded-pill pr-5" type="search" placeholder="Search" aria-label="Search" data-width="300">
            <button class="btn text-dark border-0 rounded-pill ml-n5" type="button">
              <i class="fa fa-search"></i>
            </button>
          </form>
        </div>
      </li>
    </ul>
  </div>
  {{-- <ul class="navbar-nav navbar-left mr-auto">

  </ul> --}}
  <ul class="navbar-nav navbar-right">
    <li class="d-none d-none d-none d-lg-block"><a href="{{ route('prescriptionTicket.create') }}" class="btn btn-outline-primary mr-2 mt-1">Patient&nbsp;Ticket</a></li>
    <li class="d-none d-none d-none d-lg-block"><a href="{{ route('patientTests.create') }}" class="btn btn-outline-danger mr-2 mt-1">Test&nbsp;Invoice</a></li>
    <li class="d-none d-none d-none d-lg-block"><a href="{{ route('doctors.lists') }}" class="btn btn-outline-info mr-2 mt-1">Doctors</a></li>
    <li class="d-none d-none d-none d-lg-block"><a href="{{ route('patients.lists') }}" class="btn btn-outline-success mr-2 mt-1">Patients</a></li>
    <li class="dropdown">
      <a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
        <img alt="image" src="{{ asset('assets/img/users/avatar_002.png') }}" class="user-img-radious-style">
        <span class="d-sm-none d-lg-inline-block"></span>
      </a>
      <div class="dropdown-menu dropdown-menu-right pullDown">
        <div class="dropdown-title">{{ Auth::user()->name }}</div>
        <a href="{{ route('profile') }}" class="dropdown-item has-icon"> <i class="far fa-user"></i> Profile</a>
        
        <div class="dropdown-divider"></div>
        <a href="{{ route('logout') }}" class="dropdown-item has-icon text-danger" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
          <i class="fa fa-power-off text-danger"></i> Logout
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
          @csrf
        </form>
      </div>
    </li>
  </ul>
</nav>