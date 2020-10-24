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
  
  <ul class="navbar-nav navbar-right">
    <li class="d-none d-none d-none d-lg-block"><a href="<?php echo e(route('prescriptionTicket.create')); ?>" class="btn btn-outline-primary mr-2 mt-1">Patient&nbsp;Ticket</a></li>
    <li class="d-none d-none d-none d-lg-block"><a href="<?php echo e(route('patientTests.create')); ?>" class="btn btn-outline-danger mr-2 mt-1">Test&nbsp;Invoice</a></li>
    <li class="d-none d-none d-none d-lg-block"><a href="<?php echo e(route('doctors.lists')); ?>" class="btn btn-outline-info mr-2 mt-1">Doctors</a></li>
    <li class="d-none d-none d-none d-lg-block"><a href="<?php echo e(route('patients.lists')); ?>" class="btn btn-outline-success mr-2 mt-1">Patients</a></li>
    <li class="dropdown">
      <a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
        <img alt="image" src="<?php echo e(asset('assets/img/users/avatar_002.png')); ?>" class="user-img-radious-style">
        <span class="d-sm-none d-lg-inline-block"></span>
      </a>
      <div class="dropdown-menu dropdown-menu-right pullDown">
        <div class="dropdown-title"><?php echo e(Auth::user()->name); ?></div>
        <a href="<?php echo e(route('profile')); ?>" class="dropdown-item has-icon"> <i class="far fa-user"></i> Profile</a>
        
        <div class="dropdown-divider"></div>
        <a href="<?php echo e(route('logout')); ?>" class="dropdown-item has-icon text-danger" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
          <i class="fa fa-power-off text-danger"></i> Logout
        </a>
        <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
          <?php echo csrf_field(); ?>
        </form>
      </div>
    </li>
  </ul>
</nav><?php /**PATH C:\laragon\www\renaissa-hospital3\resources\views/layouts/inc/navbar.blade.php ENDPATH**/ ?>