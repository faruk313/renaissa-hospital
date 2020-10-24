<?php

    //cache clear
    Route::get('/clear-cache', function() {
        $exitCode = Artisan::call('cache:clear');
        $exitCode = Artisan::call('config:cache');
        return 'DONE'; 
    });
    
Auth::routes();

//========================== Admin Routes ====================================//
Route::group(['middleware' => ['auth','AdminGroup']], function () {
    
    //========================== Dashboard Routes ====================================//

    //Dashboard Routes
    Route::GET('/', 'Admin\DashboardController@index')->name('dashboard');
    Route::GET('dashboard', 'Admin\DashboardController@index')->name('dashboard');

    //========================== User Routes ====================================//

    //Profile Routes
    Route::GET('user-profile', 'Admin\ProfileController@index')->name('profile');
    Route::GET('change-password', 'ChangePasswordController@index');
    Route::post('change-password', 'ChangePasswordController@store')->name('change.password');


    //========================== Departments Routes ====================================//

    //Departments Routes for doctor
    Route::GET('doctor-departments', 'Admin\DoctorDepartmentController@index')->name('doctorDepartments');
    Route::POST('doctor-department/store', 'Admin\DoctorDepartmentController@store')->name('doctorDepartments.store');
    Route::GET('doctor-department/{id}/edit', 'Admin\DoctorDepartmentController@edit')->name('doctorDepartments.edit');
    Route::PUT('doctor-department/{id}/update', 'Admin\DoctorDepartmentController@update')->name('doctorDepartments.update');
    Route::DELETE('doctor-department/{id}/destroy', 'Admin\DoctorDepartmentController@destroy')->name('doctorDepartments.destroy');

    //Admin Departments Routes for pathology
    Route::GET('pathology-departments', 'Admin\PathologyDepartmentController@index')->name('pathologyDepartments');
    Route::POST('pathology-department/store', 'Admin\PathologyDepartmentController@store')->name('pathologyDepartments.store');
    Route::GET('pathology-department/{id}/edit', 'Admin\PathologyDepartmentController@edit')->name('pathologyDepartments.edit');
    Route::PUT('pathology-department/{id}/update', 'Admin\PathologyDepartmentController@update')->name('pathologyDepartments.update');
    Route::DELETE('pathology-department/{id}/destroy', 'Admin\PathologyDepartmentController@destroy')->name('pathologyDepartments.destroy');

    //========================== Room Routes ====================================//
    
    Route::GET('rooms-chambers', 'Admin\RoomController@index')->name('rooms');
    Route::POST('rooms-chambers/store', 'Admin\RoomController@store')->name('rooms.store');
    Route::GET('rooms-chambers/{id}/view', 'Admin\RoomController@show')->name('rooms.show');
    Route::GET('rooms-chambers/{id}/edit', 'Admin\RoomController@edit')->name('rooms.edit');
    Route::PUT('rooms-chambers/{id}/update', 'Admin\RoomController@update')->name('rooms.update');
    Route::DELETE('rooms-chambers/{id}/destroy', 'Admin\RoomController@destroy')->name('rooms.destroy');

    //========================== Commission Routes ====================================//


    //Ref. Commission Users
    Route::GET('reference-commission-users', 'Admin\ReferenceCommissionUserController@index')->name('refCommissionUsers.lists');
    Route::GET('reference-commission-user-create', 'Admin\ReferenceCommissionUserController@create')->name('refCommissionUsers.create');


    //========================== Doctor Routes ====================================//
    //Doctor Chamber
    Route::GET('doctor-chambers', 'Admin\DoctorChamberController@index')->name('doctorChambers');
    Route::POST('doctor-chamber-store', 'Admin\DoctorChamberController@store')->name('doctorChambers.store');
    Route::GET('doctor-chamber-edit/{id}', 'Admin\DoctorChamberController@edit')->name('doctorChambers.edit');
    Route::POST('doctor-chamber/{id}/update', 'Admin\DoctorChamberController@update')->name('doctorChambers.update');
    Route::DELETE('doctor-chamber/{id}/delete', 'Admin\DoctorChamberController@destroy')->name('doctorChambers.destroy');

    //Doctors Routes
    Route::GET('doctors-lists', 'Admin\DoctorController@lists')->name('doctors.lists');
    Route::GET('doctor-create', 'Admin\DoctorController@create')->name('doctors.create');
    Route::POST('doctor-store', 'Admin\DoctorController@store')->name('doctors.store');
    Route::GET('doctor-show/{id}', 'Admin\DoctorController@show')->name('doctors.show');
    Route::GET('doctor-edit/{id}', 'Admin\DoctorController@edit')->name('doctors.edit');
    Route::PUT('doctor/{id}/update', 'Admin\DoctorController@update')->name('doctors.update');
    Route::DELETE('doctor/{id}/delete', 'Admin\DoctorController@destroy')->name('doctors.destroy');
    Route::GET('doctor/{id}/leave-present', 'Admin\DoctorController@leave_present')->name('doctors.leavePresent');
    Route::PUT('doctor/{id}/update-leave-present', 'Admin\DoctorController@update_leave_present')->name('doctors.updateLeavePresent');

    //without ajax
    Route::POST('doctor-store-doctor', 'Admin\DoctorController@store_doctor')->name('doctors.storeDoctor');
    Route::POST('doctor/{id}/update-doctor', 'Admin\DoctorController@update_doctor')->name('doctors.updateDoctor');
    
    //Doctor Income History
    Route::GET('doctors-income-history', 'Admin\DoctorIncomeHistoryController@index')->name('doctorIncomeHistory.list');

    //Doctor Payment
    Route::GET('doctors-payment', 'Admin\DoctorPaymentController@index')->name('doctorPayment.list');
    Route::POST('doctors-payment-store', 'Admin\DoctorPaymentController@store')->name('doctorPayment.store');

    
    //========================== Doctor Routes ====================================//


    //========================== Start Broker Routes ====================================//
    //Brokers
    Route::GET('brokers', 'Admin\BrokerController@index')->name('brokers');
    
    //Broker Income History
    Route::GET('broker-income-history', 'Admin\BrokerIncomeHistoryController@index')->name('brokerIncomeHistory.list');

    //Broker Payment
    Route::GET('broker-payment', 'Admin\BrokerPaymentController@index')->name('brokerPayment.list');
    Route::POST('broker-payment-store', 'Admin\BrokerPaymentController@store')->name('brokerPayment.store');

    //========================== End Broker Routes ====================================//


    //========================== Patient Routes ====================================//

    //Patient Routes
    Route::GET('patient-lists', 'Admin\PatientController@index')->name('patients.lists');
    Route::GET('patient-create', 'Admin\PatientController@create')->name('patients.create');
    Route::POST('patient-data-store', 'Admin\PatientController@store')->name('patients.store');
    Route::GET('patient/{id}/view', 'Admin\PatientController@show')->name('patients.view');
    Route::GET('patient/{id}/edit', 'Admin\PatientController@edit')->name('patients.edit');
    Route::PUT('patient/{id}/update', 'Admin\PatientController@update')->name('patients.update');
    Route::DELETE('patient/{id}/delete', 'Admin\PatientController@destroy')->name('patients.destroy');

    //Patient Appointment Routes 
    Route::GET('patient-appointment-lists', 'Admin\PatientAppointmentController@index')->name('patientAppointments.lists');
    Route::GET('patient-appointment-create', 'Admin\PatientAppointmentController@create')->name('patientAppointments.create');
    Route::POST('patient-appointment-store', 'Admin\PatientAppointmentController@store')->name('patientAppointments.store');
    Route::GET('patient-appointment/{id}/view', 'Admin\PatientAppointmentController@show')->name('patientAppointments.view');
    Route::GET('patient-appointment/{id}/edit', 'Admin\PatientAppointmentController@edit')->name('patientAppointments.edit');
    Route::PUT('patient-appointment/{id}/update', 'Admin\PatientAppointmentController@update')->name('patientAppointments.update');
    Route::DELETE('patient-appointment/{id}/delete', 'Admin\PatientAppointmentController@destroy')->name('patientAppointments.destroy');

    //Prescription Ticket Routes
    Route::GET('patient-prescription-ticket-list', 'Admin\PrescriptionTicketController@index')->name('prescriptionTicket.list');
    Route::GET('patient-prescription-ticket-create', 'Admin\PrescriptionTicketController@create')->name('prescriptionTicket.create');
    Route::POST('patient-prescription-ticket-store', 'Admin\PrescriptionTicketController@store')->name('prescriptionTicket.store');
    Route::GET('patient-prescription-ticket/{id}/view', 'Admin\PrescriptionTicketController@show')->name('prescriptionTicket.view');
    Route::GET('patient-prescription-ticket/{id}/edit', 'Admin\PrescriptionTicketController@edit')->name('prescriptionTicket.edit');
    Route::PUT('patient-prescription-ticket/{id}/update', 'Admin\PrescriptionTicketController@update')->name('prescriptionTicket.update');
    Route::DELETE('patient-prescription-ticket/{id}/delete', 'Admin\PrescriptionTicketController@destroy')->name('prescriptionTicket.destroy');

    Route::POST('store-new-patient-for-prescription-ticket', 'Admin\PrescriptionTicketController@new_patient')->name('prescriptionTicket.newPatient');
    Route::POST('store-new-user-for-prescription-ticket', 'Admin\PrescriptionTicketController@new_broker')->name('prescriptionTicket.newBroker');

    Route::GET('patient-prescription-ticket-search-doctor', 'Admin\PrescriptionTicketController@search_doctor')->name('prescriptionTicket.searchDoctor');
    Route::GET('patient-prescription-ticket-search-patient', 'Admin\PrescriptionTicketController@search_patient')->name('prescriptionTicket.searchPatient');
    Route::GET('patient-prescription-ticket-search-broker', 'Admin\PrescriptionTicketController@search_person')->name('prescriptionTicket.searchPerson');
    
    Route::GET('patient-prescription-ticket-print/{ticket_invoice_id}', 'Admin\PrescriptionTicketController@print_ticket')->name('prescriptionTicket.print');
    //Patient Payment Routes
    // Route::GET('patient-payment-list', 'Admin\PatientPaymentController@index')->name('patientPayment.list');
    // Route::GET('patient-payment-create', 'Admin\PatientPaymentController@create')->name('patientPayment.create');
    // Route::POST('patient-payment-store', 'Admin\PatientPaymentController@store')->name('patientPayment.store');
    
    //used for patient, doctor, broker and test searching...
    Route::GET('patient-ticket-search-doctor', 'Admin\PatientAppointmentController@search_doctor')->name('patientAppointments.searchDoctor');
    Route::GET('patient-ticket-search-patient', 'Admin\PatientAppointmentController@search_patient')->name('patientAppointments.searchPatient');
    Route::GET('patient-ticket-search-person', 'Admin\PatientAppointmentController@search_person')->name('patientAppointments.searchPerson');
    
    //used for new patient and broker add
    Route::POST('store-new-patient-for-appointment', 'Admin\PatientAppointmentController@new_patient')->name('patientAppointments.newPatient');
    Route::POST('store-new-user-for-appointment', 'Admin\PatientAppointmentController@new_user')->name('patientAppointments.newUser');

    //Patient Admission Routes
    Route::GET('patient-admission-lists', 'Admin\PatientAdmissionController@index')->name('patientAdmissions.lists');
    Route::GET('patient-admission-create', 'Admin\PatientAdmissionController@create')->name('patientAdmissions.create');
    Route::GET('patient-admission-billing', 'Admin\PatientAdmissionController@create_bill')->name('patientAdmissions.billing');
    Route::POST('patient-admission-store', 'Admin\PatientAdmissionController@store')->name('patientAdmissions.store');
    Route::GET('patient-admission/{id}/view', 'Admin\PatientAdmissionController@show')->name('patientAdmissions.view');
    Route::GET('patient-admission/{id}/edit', 'Admin\PatientAdmissionController@edit')->name('patientAdmissions.edit');
    Route::PUT('patient-admission/{id}/update', 'Admin\PatientAdmissionController@update')->name('patientAdmissions.update');
    Route::DELETE('patient-admission/{id}/delete', 'Admin\PatientAdmissionController@destroy')->name('patientAdmissions.destroy');

    
    //Patient Ticket Routes
    Route::GET('patient-ticket-lists', 'Admin\PatientTicketController@index')->name('patientTickets.lists');
    Route::GET('patient-ticket-create', 'Admin\PatientTicketController@create')->name('patientTickets.create');
    Route::POST('patient-ticket-store', 'Admin\PatientTicketController@store')->name('patientTickets.store');
    Route::GET('patient-ticket/{id}/view', 'Admin\PatientTicketController@show')->name('patientTickets.view');
    Route::GET('patient-ticket/{id}/edit', 'Admin\PatientTicketController@edit')->name('patientTickets.edit');
    Route::PUT('patient-ticket/{id}/update', 'Admin\PatientTicketController@update')->name('patientTickets.update');
    Route::DELETE('patient-ticket/{id}/delete', 'Admin\PatientTicketController@destroy')->name('patientTickets.destroy');

    Route::GET('patient-ticket-print', 'Admin\PatientTicketController@ticket_print')->name('patientTickets.ticketPrint');

    //Patient Pathology Tests Routes
    Route::GET('patient-pathology-test-lists', 'Admin\PatientTestController@index')->name('patientTests.lists');
    Route::GET('patient-pathology-test-create', 'Admin\PatientTestController@create')->name('patientTests.create');
    Route::POST('patient-pathology-test-store', 'Admin\PatientTestController@store')->name('patientTests.store');
    Route::GET('patient-pathology-test/{id}/view', 'Admin\PatientTestController@show')->name('patientTests.view');
    Route::GET('patient-pathology-test/{id}/edit', 'Admin\PatientTestController@edit')->name('patientTests.edit');
    Route::PUT('patient-pathology-test/{id}/update', 'Admin\PatientTestController@update')->name('patientTests.update');
    Route::DELETE('patient-pathology-test/{id}/delete', 'Admin\PatientTestController@destroy')->name('patientTests.destroy');
    Route::GET('patient-pathology-test-print/{test_invoice_id}', 'Admin\PatientTestController@print')->name('patientTests.print');

    //used for patient, doctor, broker and test searching...
    Route::GET('patient-pathology-test-search', 'Admin\PatientTestController@search_test')->name('patientTests.searchTest');
    Route::GET('patient-pathology-test-doctor', 'Admin\PatientTestController@search_doctor')->name('patientTests.searchDoctor');
    Route::GET('patient-pathology-test-patient', 'Admin\PatientTestController@search_patient')->name('patientTests.searchPatient');
    Route::GET('patient-pathology-test-person', 'Admin\PatientTestController@search_person')->name('patientTests.searchPerson');

    
    //used for new doctor,patient and broker add
    Route::POST('store-new-patient-for-test', 'Admin\PatientTestController@new_patient')->name('patientTests.newPatient');
    Route::POST('store-new-doctor-for-test', 'Admin\PatientTestController@new_doctor')->name('patientTests.newDoctor');
    Route::POST('store-new-user-for-test', 'Admin\PatientTestController@new_user')->name('patientTests.newUser');
    
    //Patient Payment Routes
    Route::GET('patient-payment-list', 'Admin\PatientPaymentController@index')->name('patientPayment.list');
    Route::GET('patient-payment-create', 'Admin\PatientPaymentController@create')->name('patientPayment.create');
    Route::POST('patient-payment-store', 'Admin\PatientPaymentController@store')->name('patientPayment.store');
    Route::GET('patient-payment/{id}/view', 'Admin\PatientPaymentController@show')->name('patientPayment.view');
    Route::GET('patient-payment/{id}/edit', 'Admin\PatientPaymentController@edit')->name('patientPayment.edit');
    Route::PUT('patient-payment/{id}/update', 'Admin\PatientPaymentController@update')->name('patientPayment.update');
    Route::DELETE('patient-payment/{id}/delete', 'Admin\PatientPaymentController@destroy')->name('patientPayment.destroy');


    //========================== Pathology Routes ====================================//

    //Pathology test invoice Routes
    Route::GET('pathology-test-invoice-create', 'Admin\TestInvoiceController@create')->name('testInvoice.create');
    Route::GET('pathology-test-invoice-lists', 'Admin\TestInvoiceController@index')->name('testInvoice.index');
    Route::GET('pathology-test-invoice/{id}/edit', 'Admin\TestInvoiceController@edit')->name('testInvoice.edit');
    Route::GET('pathology-test-invoice/{id}/view', 'Admin\TestInvoiceController@show')->name('testInvoice.show');
    Route::PUT('pathology-test-invoice/{id}/update', 'Admin\TestInvoiceController@update')->name('testInvoice.update');
    Route::DELETE('pathology-test-invoice/{id}/delete', 'Admin\TestInvoiceController@destroy')->name('testInvoice.destroy');

    //Pathology Tests
    Route::GET('pathology-tests', 'Admin\PathologyTestController@index')->name('pathologyTests');
    Route::GET('pathology-test/create', 'Admin\PathologyTestController@create')->name('pathologyTests.create');
    Route::POST('pathology-test/store', 'Admin\PathologyTestController@store')->name('pathologyTests.store');
    Route::GET('pathology-test/{id}/view', 'Admin\PathologyTestController@show')->name('pathologyTests.view');
    Route::GET('pathology-test/{id}/edit', 'Admin\PathologyTestController@edit')->name('pathologyTests.edit');
    Route::PUT('pathology-test/{id}/update', 'Admin\PathologyTestController@update')->name('pathologyTests.update');
    Route::DELETE('pathology-test/{id}/destroy', 'Admin\PathologyTestController@destroy')->name('pathologyTests.destroy');

    //========================== Account Routes ====================================//

    //Expense Routes 
    Route::GET('expense-list', 'Admin\ExpenseController@index')->name('expense.list');
    Route::GET('expense-create', 'Admin\ExpenseController@create')->name('expense.create');
    Route::POST('expense/store', 'Admin\ExpenseController@store')->name('expense.store');
    Route::GET('expense/{id}/view', 'Admin\ExpenseController@show')->name('expense.view');
    Route::GET('expense/{id}/edit', 'Admin\ExpenseController@edit')->name('expense.edit');
    Route::PUT('expense/{id}/update', 'Admin\ExpenseController@update')->name('expense.update');
    Route::POST('expense/destroy', 'Admin\ExpenseController@destroy')->name('expense.destroy');
    
    
    //Payments Routes
    Route::GET('payments-list', 'Admin\PaymentController@list')->name('payments.lists');
    Route::GET('payments-create', 'Admin\PaymentController@create')->name('payments.create');
    
    //Income Reports Routes
    Route::GET('income-report-list', 'Admin\IncomeReportController@index')->name('incomeReport.list');
    

    //custom search
    Route::POST('prescription-custom-search', 'Admin\CustomerSearchController@prescriptionCustomSearch')->name('prescriptionCustomSearch.search');
    Route::POST('test-invoice-custom-search', 'Admin\CustomerSearchController@testInvoiceCustomSearch')->name('testInvoiceCustomSearch.search');

    Route::POST('doctor-payment-custom-search', 'Admin\CustomerSearchController@doctorPaymentCustomSearch')->name('doctorPaymentCustomSearch.search');
    Route::POST('broker-payment-custom-search', 'Admin\CustomerSearchController@brokerPaymentCustomSearch')->name('brokerPaymentCustomSearch.search');

    Route::POST('doctor-income-custom-search', 'Admin\CustomerSearchController@doctorIncomeCustomSearch')->name('doctorIncomeCustomSearch.search');
    Route::POST('broker-income-custom-search', 'Admin\CustomerSearchController@brokerIncomeCustomSearch')->name('brokerIncomeCustomSearch.search');

    Route::POST('doctor-payment-check-custom-search', 'Admin\CustomerSearchController@doctorPaymentCheckCustomSearch')->name('doctorPaymentCheckCustomSearch.search');

    Route::POST('patient-payment-custom-search', 'Admin\CustomerSearchController@patientPaymentCustomSearch')->name('patientPaymentCustomSearch');

    Route::POST('expense-custom-search', 'Admin\CustomerSearchController@expenseCustomSearch')->name('expenseCustomSearch.search');

    Route::POST('income-report-custom-search', 'Admin\CustomerSearchController@incomeReportCustomSearch')->name('incomeReportCustomSearch');
    Route::POST('income-custom-search', 'Admin\CustomerSearchController@incomeCustomSearch')->name('incomeCustomSearch');

    Route::GET('invoice-no-search', 'Admin\CustomerSearchController@invoice_search')->name('customSearch.invoiceSearch');
    Route::GET('patient-info-search', 'Admin\CustomerSearchController@patient_search')->name('customSearch.patientSearch');
    Route::GET('doctor-info-search', 'Admin\CustomerSearchController@doctor_search')->name('customSearch.doctorSearch');
    Route::GET('broker-info-search', 'Admin\CustomerSearchController@broker_search')->name('customSearch.brokerSearch');
    Route::GET('expense-info-search', 'Admin\CustomerSearchController@expense_search')->name('customSearch.expenseSearch');

    //Income report =======================================
    Route::GET('total-invoice-income', 'Admin\IncomeReportController@total_invoice_income')->name('totalIncome.total_income');


    // User Route ===========================================
    Route::GET('user-create', 'Admin\UserController@create')->name('user.create');
    Route::GET('user-list', 'Admin\UserController@list')->name('user.list');
    Route::POST('user-store', 'Admin\UserController@store')->name('user.store');

    // Role Route ===========================================
    Route::GET('role-list', 'Admin\RoleController@list')->name('role.list');

    // Permission Route ===========================================
    Route::GET('permission-list', 'Admin\PermissionController@list')->name('permission.list');

    //user-role
    Route::get('/user-role-edit/{id}/{name}', 'Admin\UserController@editRole')->name('user.role.edit');
    Route::post('/user-role-update', 'Admin\UserController@updateRole')->name('user.role.update');

    //role-permission
    Route::post('/permission-role', 'Admin\RoleController@setPermission')->name('role.permission');
    Route::get('/permission-role-edit/{id}/{name}', 'Admin\RoleController@editPermission')->name('role.permission.edit');
    Route::post('/permission-role-update', 'Admin\RoleController@updatePermission')->name('role.permission.update');

});

