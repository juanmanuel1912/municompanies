<?php

Route::redirect('/', '/login');
Route::get('/home', function () {
    if (session('status')) {
        return redirect()->route('admin.home')->with('status', session('status'));
    }

    return redirect()->route('admin.home');
});

Auth::routes(['register' => false]);
// Admin

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

    // Crm Statuses
    Route::delete('crm-statuses/destroy', 'CrmStatusController@massDestroy')->name('crm-statuses.massDestroy');
    Route::resource('crm-statuses', 'CrmStatusController');

    // Crm Customers
    Route::delete('crm-customers/destroy', 'CrmCustomerController@massDestroy')->name('crm-customers.massDestroy');
    Route::resource('crm-customers', 'CrmCustomerController');

    // Crm Notes
    Route::delete('crm-notes/destroy', 'CrmNoteController@massDestroy')->name('crm-notes.massDestroy');
    Route::resource('crm-notes', 'CrmNoteController');

    // Crm Documents
    Route::delete('crm-documents/destroy', 'CrmDocumentController@massDestroy')->name('crm-documents.massDestroy');
    Route::post('crm-documents/media', 'CrmDocumentController@storeMedia')->name('crm-documents.storeMedia');
    Route::resource('crm-documents', 'CrmDocumentController');

    // Cities
    Route::delete('cities/destroy', 'CitiesController@massDestroy')->name('cities.massDestroy');
    Route::post('cities/parse-csv-import', 'CitiesController@parseCsvImport')->name('cities.parseCsvImport');
    Route::post('cities/process-csv-import', 'CitiesController@processCsvImport')->name('cities.processCsvImport');
    Route::resource('cities', 'CitiesController');

    // Categories Items
    Route::delete('categories-items/destroy', 'CategoriesItemsController@massDestroy')->name('categories-items.massDestroy');
    Route::post('categories-items/parse-csv-import', 'CategoriesItemsController@parseCsvImport')->name('categories-items.parseCsvImport');
    Route::post('categories-items/process-csv-import', 'CategoriesItemsController@processCsvImport')->name('categories-items.processCsvImport');
    Route::resource('categories-items', 'CategoriesItemsController');

    // Categories Types
    Route::delete('categories-types/destroy', 'CategoriesTypesController@massDestroy')->name('categories-types.massDestroy');
    Route::post('categories-types/parse-csv-import', 'CategoriesTypesController@parseCsvImport')->name('categories-types.parseCsvImport');
    Route::post('categories-types/process-csv-import', 'CategoriesTypesController@processCsvImport')->name('categories-types.processCsvImport');
    Route::resource('categories-types', 'CategoriesTypesController');

    // Territorio Vecis
    Route::delete('territorio-vecis/destroy', 'TerritorioVeciController@massDestroy')->name('territorio-vecis.massDestroy');
    Route::post('territorio-vecis/parse-csv-import', 'TerritorioVeciController@parseCsvImport')->name('territorio-vecis.parseCsvImport');
    Route::post('territorio-vecis/process-csv-import', 'TerritorioVeciController@processCsvImport')->name('territorio-vecis.processCsvImport');
    Route::resource('territorio-vecis', 'TerritorioVeciController');

    // Companies
    Route::delete('companies/destroy', 'CompaniesController@massDestroy')->name('companies.massDestroy');
    Route::post('companies/media', 'CompaniesController@storeMedia')->name('companies.storeMedia');
    Route::post('companies/parse-csv-import', 'CompaniesController@parseCsvImport')->name('companies.parseCsvImport');
    Route::post('companies/process-csv-import', 'CompaniesController@processCsvImport')->name('companies.processCsvImport');
    Route::resource('companies', 'CompaniesController');

    // Teams
    Route::delete('teams/destroy', 'TeamController@massDestroy')->name('teams.massDestroy');
    Route::resource('teams', 'TeamController');

    // Centros Educativos
    Route::delete('centros-educativos/destroy', 'CentrosEducativosController@massDestroy')->name('centros-educativos.massDestroy');
    Route::post('centros-educativos/media', 'CentrosEducativosController@storeMedia')->name('centros-educativos.storeMedia');
    Route::post('centros-educativos/parse-csv-import', 'CentrosEducativosController@parseCsvImport')->name('centros-educativos.parseCsvImport');
    Route::post('centros-educativos/process-csv-import', 'CentrosEducativosController@processCsvImport')->name('centros-educativos.processCsvImport');
    Route::resource('centros-educativos', 'CentrosEducativosController');
});
