<?php

use Illuminate\Support\Facades\Route;
use App\Models\Redirect;

Route::get('/{redirect}', function (Redirect $redirect) {
    if($redirect->is_active){
        return redirect($redirect->redirect_to, 301);
    }
    abort(404);
})->name('redirect');

Route::fallback(static function () {
    abort(404);
});
