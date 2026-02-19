<?php

    use Illuminate\Support\Facades\Route;
    use App\Http\Controllers\api\PostController;

Route::prefix('api')->group(function () {

});
    Route::apiResource('posts', PostController::class)->names('api.posts');
    // Route::apiResource('/comments', CommentController::class);
    // Route::apiResource('/tags', TagController::class);
