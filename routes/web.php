<?php

use Illuminate\Support\Facades\Route;
use App\Models\Redirect;

Route::get('/', function () {
    return redirect()->away('https://getmancar.com');
})->name('main');

Route::get('/{redirect}', function ($redirect) {
    $redirect = Redirect::query()->where('alias', $redirect)->first();
    if (!$redirect) {
        return redirect()->away('https://getmancar.com');
    }

    if ($redirect->is_active) {
        return redirect()->away($redirect->redirect_to);
    }

    return redirect()->away('https://getmancar.com');
})->name('redirect');

Route::fallback(static function () {
    abort(404);
});
