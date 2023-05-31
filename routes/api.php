<?php

Route::group(['prefix' => 'v1', 'as' => 'api.', 'namespace' => 'Api\V1\Admin', 'middleware' => ['auth:sanctum']], function () {
    // Real Pc
    Route::apiResource('real-pcs', 'RealPcApiController');

    // Remote Pc
    Route::apiResource('remote-pcs', 'RemotePcApiController');

    // Email
    Route::apiResource('emails', 'EmailApiController');

    // Skype
    Route::apiResource('skypes', 'SkypeApiController');

    // Discord
    Route::apiResource('discords', 'DiscordApiController');
});
