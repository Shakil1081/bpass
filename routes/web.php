<?php

Route::redirect('/', '/login');
Route::get('/home', function () {
    if (session('status')) {
        return redirect()->route('admin.home')->with('status', session('status'));
    }

    return redirect()->route('admin.home');
});

Auth::routes();

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
    Route::get('/', 'HomeController@index')->name('home');
    // Permissions
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionsController');

    // Roles
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'RolesController');

    // Users
    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::resource('users', 'UsersController');

    // Audit Logs
    Route::resource('audit-logs', 'AuditLogsController', ['except' => ['create', 'store', 'edit', 'update', 'destroy']]);

    // Team
    Route::delete('teams/destroy', 'TeamController@massDestroy')->name('teams.massDestroy');
    Route::resource('teams', 'TeamController');

    // Finance Bank
    Route::delete('finance-banks/destroy', 'FinanceBankController@massDestroy')->name('finance-banks.massDestroy');
    Route::post('finance-banks/parse-csv-import', 'FinanceBankController@parseCsvImport')->name('finance-banks.parseCsvImport');
    Route::post('finance-banks/process-csv-import', 'FinanceBankController@processCsvImport')->name('finance-banks.processCsvImport');
    Route::resource('finance-banks', 'FinanceBankController');

    // Organization
    Route::delete('organizations/destroy', 'OrganizationController@massDestroy')->name('organizations.massDestroy');
    Route::post('organizations/media', 'OrganizationController@storeMedia')->name('organizations.storeMedia');
    Route::post('organizations/ckmedia', 'OrganizationController@storeCKEditorImages')->name('organizations.storeCKEditorImages');
    Route::resource('organizations', 'OrganizationController');

    //bank account
    Route::resource('bank-account', 'BankAccountController');

    //cheques account
    Route::resource('cheques', 'ChequeController');
    Route::resource('cheques-details', 'ChequeDetailsController');

    //Requisitions
    Route::resource('products', 'ProductController');

    //Documents
    Route::resource('documents', 'DocumentController');

    //disbursements
    Route::resource('disbursements', 'DisbursementController');

    //barcodes
    Route::resource('barcodes', 'BarCodeController');

    // Party Group
    Route::delete('party-groups/destroy', 'PartyGroupController@massDestroy')->name('party-groups.massDestroy');
    Route::post('party-groups/parse-csv-import', 'PartyGroupController@parseCsvImport')->name('party-groups.parseCsvImport');
    Route::post('party-groups/process-csv-import', 'PartyGroupController@processCsvImport')->name('party-groups.processCsvImport');
    Route::resource('party-groups', 'PartyGroupController');

    // Party Group Bd
    Route::delete('party-group-bds/destroy', 'PartyGroupBdController@massDestroy')->name('party-group-bds.massDestroy');
    Route::post('party-group-bds/media', 'PartyGroupBdController@storeMedia')->name('party-group-bds.storeMedia');
    Route::post('party-group-bds/ckmedia', 'PartyGroupBdController@storeCKEditorImages')->name('party-group-bds.storeCKEditorImages');
    Route::post('party-group-bds/parse-csv-import', 'PartyGroupBdController@parseCsvImport')->name('party-group-bds.parseCsvImport');
    Route::post('party-group-bds/process-csv-import', 'PartyGroupBdController@processCsvImport')->name('party-group-bds.processCsvImport');
    Route::resource('party-group-bds', 'PartyGroupBdController');

    // Party Table
    Route::delete('party-tables/destroy', 'PartyTableController@massDestroy')->name('party-tables.massDestroy');
    Route::post('party-tables/parse-csv-import', 'PartyTableController@parseCsvImport')->name('party-tables.parseCsvImport');
    Route::post('party-tables/process-csv-import', 'PartyTableController@processCsvImport')->name('party-tables.processCsvImport');
    Route::resource('party-tables', 'PartyTableController');
    Route::resource('party-bills', 'PartyBillController');

    // Department
    Route::delete('departments/destroy', 'DepartmentController@massDestroy')->name('departments.massDestroy');
    Route::resource('departments', 'DepartmentController');

    // Non Purchase Order
    Route::delete('non-purchase-orders/destroy', 'NonPurchaseOrderController@massDestroy')->name('non-purchase-orders.massDestroy');
    Route::post('non-purchase-orders/parse-csv-import', 'NonPurchaseOrderController@parseCsvImport')->name('non-purchase-orders.parseCsvImport');
    Route::post('non-purchase-orders/process-csv-import', 'NonPurchaseOrderController@processCsvImport')->name('non-purchase-orders.processCsvImport');
    Route::resource('non-purchase-orders', 'NonPurchaseOrderController');

    // Purchase Order
    Route::delete('purchase-orders/destroy', 'PurchaseOrderController@massDestroy')->name('purchase-orders.massDestroy');
    Route::post('purchase-orders/parse-csv-import', 'PurchaseOrderController@parseCsvImport')->name('purchase-orders.parseCsvImport');
    Route::post('purchase-orders/process-csv-import', 'PurchaseOrderController@processCsvImport')->name('purchase-orders.processCsvImport');

    //new added
    Route::get('purchase-orders/entry', 'PurchaseOrderController@purchaseOrderEntry')->name('purchase-orders.entry');
    Route::get('purchase-orders/get-purchase-order', 'PurchaseOrderController@getPurchaseOrder')->name('get-purchase-order');
    Route::post('purchase-orders/entry/store', 'PurchaseOrderController@purchaseOrderEntryStore')->name('purchase-orders.entryStore');

    Route::resource('purchase-orders', 'PurchaseOrderController');

    // Requisition
    Route::delete('requisitions/destroy', 'RequisitionController@massDestroy')->name('requisitions.massDestroy');
    Route::post('requisitions/parse-csv-import', 'RequisitionController@parseCsvImport')->name('requisitions.parseCsvImport');
    Route::post('requisitions/process-csv-import', 'RequisitionController@processCsvImport')->name('requisitions.processCsvImport');
    Route::resource('requisitions', 'RequisitionController');

    // Term Condition
    Route::delete('term-conditions/destroy', 'TermConditionController@massDestroy')->name('term-conditions.massDestroy');
    Route::post('term-conditions/parse-csv-import', 'TermConditionController@parseCsvImport')->name('term-conditions.parseCsvImport');
    Route::post('term-conditions/process-csv-import', 'TermConditionController@processCsvImport')->name('term-conditions.processCsvImport');
    Route::resource('term-conditions', 'TermConditionController');

    // Budget
    Route::delete('budgets/destroy', 'BudgetController@massDestroy')->name('budgets.massDestroy');
    Route::post('budgets/parse-csv-import', 'BudgetController@parseCsvImport')->name('budgets.parseCsvImport');
    Route::post('budgets/process-csv-import', 'BudgetController@processCsvImport')->name('budgets.processCsvImport');
    Route::resource('budgets', 'BudgetController');
    //budget_details
    Route::resource('budget-details', 'BudgetDetailsController');

    // Expense Type
    Route::delete('expense-types/destroy', 'ExpenseTypeController@massDestroy')->name('expense-types.massDestroy');
    Route::post('expense-types/parse-csv-import', 'ExpenseTypeController@parseCsvImport')->name('expense-types.parseCsvImport');
    Route::post('expense-types/process-csv-import', 'ExpenseTypeController@processCsvImport')->name('expense-types.processCsvImport');
    Route::resource('expense-types', 'ExpenseTypeController');

    Route::get('team-members', 'TeamMembersController@index')->name('team-members.index');
    Route::post('team-members', 'TeamMembersController@invite')->name('team-members.invite');
});
Route::group(['prefix' => 'profile', 'as' => 'profile.', 'namespace' => 'Auth', 'middleware' => ['auth']], function () {
    // Change password
    if (file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php'))) {
        Route::get('password', 'ChangePasswordController@edit')->name('password.edit');
        Route::post('password', 'ChangePasswordController@update')->name('password.update');
        Route::post('profile', 'ChangePasswordController@updateProfile')->name('password.updateProfile');
        Route::post('profile/destroy', 'ChangePasswordController@destroy')->name('password.destroyProfile');
    }
});
