<?php declare(strict_types=1);

use Illuminate\Support\Facades\Route;

Route::any('/{any?}', fn() => abort(403));