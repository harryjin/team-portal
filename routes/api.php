<?php

Route::group(['prefix' => 'v1', 'as' => 'api.', 'namespace' => 'Api\V1\Admin', 'middleware' => ['auth:sanctum']], function () {
    // Remote Pc
    Route::apiResource('remote-pcs', 'RemotePcApiController');

    // Email
    Route::apiResource('emails', 'EmailApiController');

    // Discord
    Route::apiResource('discords', 'DiscordApiController');
});
