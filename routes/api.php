<?php

Route::group(['prefix' => 'v1', 'as' => 'api.', 'namespace' => 'Api\V1\Admin', 'middleware' => ['auth:api']], function () {
    // Permissions
    Route::apiResource('permissions', 'PermissionsApiController');

    // Roles
    Route::apiResource('roles', 'RolesApiController');

    // Users
    Route::apiResource('users', 'UsersApiController');

    // Crm Statuses
    Route::apiResource('crm-statuses', 'CrmStatusApiController');

    // Crm Customers
    Route::apiResource('crm-customers', 'CrmCustomerApiController');

    // Crm Notes
    Route::apiResource('crm-notes', 'CrmNoteApiController');

    // Crm Documents
    Route::post('crm-documents/media', 'CrmDocumentApiController@storeMedia')->name('crm-documents.storeMedia');
    Route::apiResource('crm-documents', 'CrmDocumentApiController');

    // Cities
    Route::apiResource('cities', 'CitiesApiController');

    // Categories Items
    Route::apiResource('categories-items', 'CategoriesItemsApiController');

    // Categories Types
    Route::apiResource('categories-types', 'CategoriesTypesApiController');

    // Territorio Vecis
    Route::apiResource('territorio-vecis', 'TerritorioVeciApiController');

    // Companies
    Route::post('companies/media', 'CompaniesApiController@storeMedia')->name('companies.storeMedia');
    Route::apiResource('companies', 'CompaniesApiController');

    // Teams
    Route::apiResource('teams', 'TeamApiController');

    // Centros Educativos
    Route::post('centros-educativos/media', 'CentrosEducativosApiController@storeMedia')->name('centros-educativos.storeMedia');
    Route::apiResource('centros-educativos', 'CentrosEducativosApiController');
});
