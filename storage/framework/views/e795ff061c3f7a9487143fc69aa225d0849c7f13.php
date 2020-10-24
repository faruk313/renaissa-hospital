<div class="main-sidebar sidebar-style-2">
  <aside id="sidebar-wrapper">
    <div class="sidebar-brand">
      <a href="<?php echo e(route('dashboard')); ?>">
        <img alt="image" src="<?php echo e(asset('assets/img/logo.png')); ?>" class="header-logo">
        <span class="logo-name">RENAISSA</span>
    </a>
    </div>
    <ul class="sidebar-menu mt-2 mb-2" id="sidebar-menu">
      <li class="dropdown <?php echo $__env->yieldContent('dashboard'); ?>">
        <a href="<?php echo e(route('dashboard')); ?>" class="nav-link"><i data-feather="monitor"></i><span>Dashboard</span></a>
      </li>

      <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('manage_doctor')): ?>
      
      <li class="dropdown <?php echo $__env->yieldContent('doctors'); ?>">
        <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="user-plus"></i><span>Doctors Management</span></a>
        <ul class="dropdown-menu">
          <li class="<?php echo $__env->yieldContent('doctors_create'); ?>">
            <a class="nav-link" href="<?php echo e(route('doctors.create')); ?>">Doctor Add</a>
          </li>
          <li class="<?php echo $__env->yieldContent('doctors_list'); ?>">
            <a class="nav-link" href="<?php echo e(route('doctors.lists')); ?>">Doctors List</a>
          </li>
        </ul>
      </li>
      <?php endif; ?>

      
      <li class="dropdown <?php echo $__env->yieldContent('patients'); ?>">
        <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="user-check"></i><span>Patients Management</span></a>
        <ul class="dropdown-menu">
          <li class="<?php echo $__env->yieldContent('patient_create'); ?>">
            <a class="nav-link" href="<?php echo e(route('patients.create')); ?>">New Patient</a>
          </li>
          <li class="<?php echo $__env->yieldContent('patient_lists'); ?>">
            <a class="nav-link" href="<?php echo e(route('patients.lists')); ?>">Patient Lists</a>
          </li>
        </ul>
      </li>
      
      
      <li class="dropdown <?php echo $__env->yieldContent('tests'); ?>">
        <a href="<?php echo e(route('pathologyTests')); ?>" class="nav-link"><i data-feather="file-plus"></i><span>Pathology Management</span></a>
      </li>
      <li class="menu-header">Invoices</li>
      <li class="dropdown <?php echo $__env->yieldContent('prescription_ticket'); ?>">
        <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="file-text"></i><span>Prescription Ticket</span></a>
        <ul class="dropdown-menu">
          <li class="<?php echo $__env->yieldContent('prescription_ticket_create'); ?>">
            <a class="nav-link" href="<?php echo e(route('prescriptionTicket.create')); ?>">Create Prescription Ticket</a>
          </li>
          <li class="<?php echo $__env->yieldContent('prescription_ticket_list'); ?>">
            <a class="nav-link" href="<?php echo e(route('prescriptionTicket.list')); ?>">Prescription Ticket List</a>
          </li>
        </ul>
      </li>
      
      <li class="dropdown <?php echo $__env->yieldContent('test_invoices'); ?>">
        <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="file-plus"></i><span>Pathology Test Invoice</span></a>
        <ul class="dropdown-menu">
          <li class="<?php echo $__env->yieldContent('test_invoice_add'); ?>">
            <a class="nav-link" href="<?php echo e(route('patientTests.create')); ?>">Create Test Invoice</a>
          </li>
          <li class="<?php echo $__env->yieldContent('test_invoice_list'); ?>">
            <a class="nav-link" href="<?php echo e(route('patientTests.lists')); ?>">Test Invoice List</a>
          </li>
        </ul>
      </li>

      <li class="dropdown <?php echo $__env->yieldContent('patient_payment'); ?>">
        <a class="nav-link" href="<?php echo e(route('patientPayment.list')); ?>"><i data-feather="file-plus"></i>Patient Payment</a>
      </li>
      
      <li class="menu-header">Income Histories</li>
      <li class="dropdown <?php echo $__env->yieldContent('doctor_income_history'); ?>">
        <a href="<?php echo e(route('doctorIncomeHistory.list')); ?>" class="nav-link"><i data-feather="user-plus"></i><span>Doctor Income History</span></a>
      </li>

      <li class="dropdown <?php echo $__env->yieldContent('broker_income_history'); ?>">
        <a href="<?php echo e(route('brokerIncomeHistory.list')); ?>" class="nav-link"><i data-feather="user-x"></i><span>Broker Income History</span></a>
      </li>

      <li class="menu-header">Incomes</li>
      <li class="dropdown <?php echo $__env->yieldContent('total_income'); ?>">
        <a href="<?php echo e(route('totalIncome.total_income')); ?>" class="nav-link"><i data-feather="dollar-sign"></i><span>Total Income</span></a>
      </li>

      <li class="menu-header">Expenses</li>
      <li class="dropdown <?php echo $__env->yieldContent('doctor_payment'); ?>">
        <a href="<?php echo e(route('doctorPayment.list')); ?>" class="nav-link"><i data-feather="user-plus"></i><span>Doctor Payment</span></a>
      </li>

      <li class="dropdown <?php echo $__env->yieldContent('broker_payment'); ?>">
        <a href="<?php echo e(route('brokerPayment.list')); ?>" class="nav-link"><i data-feather="user-x"></i><span>Broker Payment</span></a>
      </li>

      <li class="dropdown <?php echo $__env->yieldContent('expenses'); ?>">
        <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="credit-card"></i><span>Expenses</span></a>
        <ul class="dropdown-menu">
          <li class="<?php echo $__env->yieldContent('expense_create'); ?>">
            <a class="nav-link" href="<?php echo e(route('expense.create')); ?>">Add Expense</a>
          </li>
          <li class="<?php echo $__env->yieldContent('expense_list'); ?>">
            <a class="nav-link" href="<?php echo e(route('expense.list')); ?>">Expense List</a>
          </li>
        </ul>
      </li>

      <li class="menu-header">Reports</li>
      <li class="dropdown <?php echo $__env->yieldContent('income_report'); ?>">
        <a href="<?php echo e(route('incomeReport.list')); ?>" class="nav-link"><i data-feather="clipboard"></i><span>Income Reports</span></a>
      </li>

      <li class="menu-header">Settings</li>
      <li class="dropdown <?php echo $__env->yieldContent('users'); ?>">
        <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="users"></i><span>User Management</span></a>
        <ul class="dropdown-menu">
          <li class="<?php echo $__env->yieldContent('users_create'); ?>">
            <a class="nav-link" href="<?php echo e(route('user.create')); ?>">Add User</a>
          </li>
          <li class="<?php echo $__env->yieldContent('users_list'); ?>">
            <a class="nav-link" href="<?php echo e(route('user.list')); ?>">List User</a>
          </li>
        </ul>
      </li>
      <li class="dropdown <?php echo $__env->yieldContent('roles'); ?>">
            <a class="nav-link" href="<?php echo e(route('role.list')); ?>"><i data-feather="settings"></i>User Roles</a>
      </li>
      <li class="dropdown <?php echo $__env->yieldContent('permissions'); ?>">
            <a class="nav-link" href="<?php echo e(route('permission.list')); ?>"><i data-feather="check-square"></i>User Permissions</a>
      </li>
      


      <li class="dropdown <?php echo $__env->yieldContent('departments'); ?>">
        <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="columns"></i><span>Department</span></a>
        <ul class="dropdown-menu">
          <li class="<?php echo $__env->yieldContent('doctor_departments'); ?>">
            <a class="nav-link" href="<?php echo e(route('doctorDepartments')); ?>">Doctor Deparments</a>
          </li>
          
          <li class="<?php echo $__env->yieldContent('pathology_departments'); ?>">
            <a class="nav-link" href="<?php echo e(route('pathologyDepartments')); ?>">Pathology Departments</a>
          </li>
        </ul>
      </li>

      <li class="dropdown <?php echo $__env->yieldContent('rooms_chambers_cabins_desks'); ?>">
        <a href="<?php echo e(route('rooms')); ?>" class="nav-link"><i data-feather="home"></i><span>Room/Chamber</span></a>
      </li>
      <br>
    </ul>
  </aside>
</div>
<?php /**PATH C:\laragon\www\renaissa-hospital\resources\views/layouts/inc/sidebar.blade.php ENDPATH**/ ?>