<?php

    use Illuminate\Support\Facades\Route;
    use App\Http\Controllers\api\PostController;
    use App\Http\Controllers\api\AuthController;

    Route::prefix('v1')->group(function () {
        Route::apiResource('posts', PostController::class)->middleware('auth:api');

        Route::prefix('auth')->group(function () {
            Route::post('login', [AuthController::class, 'login']);
            Route::middleware('auth:api')->group(function () {
                Route::get('me', [AuthController::class, 'me']);
                Route::post('logout', [AuthController::class, 'logout']);
                Route::post('refresh', [AuthController::class, 'refresh']);
            });
        });
    });
    // Route::apiResource('/comments', CommentController::class);
    // Route::apiResource('/tags', TagController::class);
