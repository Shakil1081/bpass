<?php

Route::group(['prefix' => 'v1', 'as' => 'api.', 'namespace' => 'Api\V1\Admin', 'middleware' => ['auth:sanctum']], function () {
    // Party Group
    Route::apiResource('party-groups', 'PartyGroupApiController');

    // Party Table
    Route::apiResource('party-tables', 'PartyTableApiController');
});
