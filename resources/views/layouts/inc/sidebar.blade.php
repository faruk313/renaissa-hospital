<div class="main-sidebar sidebar-style-2">
  <aside id="sidebar-wrapper">
    <div class="sidebar-brand">
      <a href="{{ route('dashboard') }}">
        <img alt="image" src="{{ asset('assets/img/logo.png') }}" class="header-logo">
        <span class="logo-name">RENAISSA</span>
    </a>
    </div>
    <ul class="sidebar-menu mt-2 mb-2" id="sidebar-menu">
      <li class="dropdown @yield('dashboard')">
        <a href="{{ route('dashboard') }}" class="nav-link"><i data-feather="monitor"></i><span>Dashboard</span></a>
      </li>

      @can('manage_doctor')
      {{-- <li class="menu-header">Doctors</li> --}}
      <li class="dropdown @yield('doctors')">
        <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="user-plus"></i><span>Doctors Management</span></a>
        <ul class="dropdown-menu">
          <li class="@yield('doctors_create')">
            <a class="nav-link" href="{{ route('doctors.create') }}">Doctor Add</a>
          </li>
          <li class="@yield('doctors_list')">
            <a class="nav-link" href="{{ route('doctors.lists') }}">Doctors List</a>
          </li>
        </ul>
      </li>
      @endcan

      {{-- <li class="menu-header">Patients</li> --}}
      <li class="dropdown @yield('patients')">
        <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="user-check"></i><span>Patients Management</span></a>
        <ul class="dropdown-menu">
          <li class="@yield('patient_create')">
            <a class="nav-link" href="{{ route('patients.create') }}">New Patient</a>
          </li>
          <li class="@yield('patient_lists')">
            <a class="nav-link" href="{{ route('patients.lists') }}">Patient Lists</a>
          </li>
        </ul>
      </li>
      
      {{-- <li class="menu-header">Pathology Tests</li> --}}
      <li class="dropdown @yield('tests')">
        <a href="{{ route('pathologyTests') }}" class="nav-link"><i data-feather="file-plus"></i><span>Pathology Management</span></a>
      </li>
      <li class="menu-header">Invoices</li>
      <li class="dropdown @yield('prescription_ticket')">
        <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="file-text"></i><span>Prescription Ticket</span></a>
        <ul class="dropdown-menu">
          <li class="@yield('prescription_ticket_create')">
            <a class="nav-link" href="{{ route('prescriptionTicket.create') }}">Create Prescription Ticket</a>
          </li>
          <li class="@yield('prescription_ticket_list')">
            <a class="nav-link" href="{{ route('prescriptionTicket.list') }}">Prescription Ticket List</a>
          </li>
        </ul>
      </li>
      
      <li class="dropdown @yield('test_invoices')">
        <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="file-plus"></i><span>Pathology Test Invoice</span></a>
        <ul class="dropdown-menu">
          <li class="@yield('test_invoice_add')">
            <a class="nav-link" href="{{ route('patientTests.create') }}">Create Test Invoice</a>
          </li>
          <li class="@yield('test_invoice_list')">
            <a class="nav-link" href="{{ route('patientTests.lists') }}">Test Invoice List</a>
          </li>
        </ul>
      </li>

      <li class="dropdown @yield('patient_payment')">
        <a class="nav-link" href="{{ route('patientPayment.list') }}"><i data-feather="file-plus"></i>Patient Payment</a>
      </li>
      {{-- <li class="dropdown @yield('admissions')">
        <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="user-minus"></i><span>Patient Admissions</span></a>
        <ul class="dropdown-menu">
          <li class="@yield('admissions_create')">
            <a class="nav-link" href="{{ route('patientAdmissions.create') }}">New Admission</a>
          </li>
          <li class="@yield('admissions_lists')">
            <a class="nav-link" href="{{ route('patientAdmissions.lists') }}">Admission Lists</a>
          </li>
        </ul>
      </li> --}}
      <li class="menu-header">Income Histories</li>
      <li class="dropdown @yield('doctor_income_history')">
        <a href="{{ route('doctorIncomeHistory.list') }}" class="nav-link"><i data-feather="user-plus"></i><span>Doctor Income History</span></a>
      </li>

      <li class="dropdown @yield('broker_income_history')">
        <a href="{{ route('brokerIncomeHistory.list') }}" class="nav-link"><i data-feather="user-x"></i><span>Broker Income History</span></a>
      </li>

      <li class="menu-header">Incomes</li>
      <li class="dropdown @yield('total_income')">
        <a href="{{ route('totalIncome.total_income') }}" class="nav-link"><i data-feather="dollar-sign"></i><span>Total Income</span></a>
      </li>

      <li class="menu-header">Expenses</li>
      <li class="dropdown @yield('doctor_payment')">
        <a href="{{ route('doctorPayment.list') }}" class="nav-link"><i data-feather="user-plus"></i><span>Doctor Payment</span></a>
      </li>

      <li class="dropdown @yield('broker_payment')">
        <a href="{{ route('brokerPayment.list') }}" class="nav-link"><i data-feather="user-x"></i><span>Broker Payment</span></a>
      </li>

      <li class="dropdown @yield('expenses')">
        <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="credit-card"></i><span>Expenses</span></a>
        <ul class="dropdown-menu">
          <li class="@yield('expense_create')">
            <a class="nav-link" href="{{ route('expense.create') }}">Add Expense</a>
          </li>
          <li class="@yield('expense_list')">
            <a class="nav-link" href="{{ route('expense.list') }}">Expense List</a>
          </li>
        </ul>
      </li>

      <li class="menu-header">Reports</li>
      <li class="dropdown @yield('income_report')">
        <a href="{{ route('incomeReport.list') }}" class="nav-link"><i data-feather="clipboard"></i><span>Income Reports</span></a>
      </li>

      <li class="menu-header">Settings</li>
      <li class="dropdown @yield('users')">
        <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="users"></i><span>User Management</span></a>
        <ul class="dropdown-menu">
          <li class="@yield('users_create')">
            <a class="nav-link" href="{{ route('user.create') }}">Add User</a>
          </li>
          <li class="@yield('users_list')">
            <a class="nav-link" href="{{ route('user.list') }}">List User</a>
          </li>
        </ul>
      </li>
      <li class="dropdown @yield('roles')">
            <a class="nav-link" href="{{ route('role.list') }}"><i data-feather="settings"></i>User Roles</a>
      </li>
      <li class="dropdown @yield('permissions')">
            <a class="nav-link" href="{{ route('permission.list') }}"><i data-feather="check-square"></i>User Permissions</a>
      </li>
      {{-- <li class="dropdown @yield('rooms_chambers_cabins_desks')">
        <a href="{{ route('set_user.role') }}" class="nav-link"><i data-feather="home"></i><span>Set User Role</span></a>
      </li>
      <li class="dropdown @yield('rooms_chambers_cabins_desks')">
        <a href="{{ route('set_user.permission') }}" class="nav-link"><i data-feather="home"></i><span>Set User Permission</span></a>
      </li> --}}

{{--        

      <li class="menu-header">Setup</li>  --}}
      <li class="dropdown @yield('departments')">
        <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="columns"></i><span>Department</span></a>
        <ul class="dropdown-menu">
          <li class="@yield('doctor_departments')">
            <a class="nav-link" href="{{ route('doctorDepartments') }}">Doctor Deparments</a>
          </li>
          {{-- <li class="@yield('employee_departments')">
            <a class="nav-link" href="{{ route('employeeDepartments') }}">Employee Departments</a>
          </li> --}}
          <li class="@yield('pathology_departments')">
            <a class="nav-link" href="{{ route('pathologyDepartments') }}">Pathology Departments</a>
          </li>
        </ul>
      </li>

      <li class="dropdown @yield('rooms_chambers_cabins_desks')">
        <a href="{{ route('rooms') }}" class="nav-link"><i data-feather="home"></i><span>Room/Chamber</span></a>
      </li>
      <br>
    </ul>
  </aside>
</div>
