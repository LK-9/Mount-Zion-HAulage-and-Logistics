<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// Public Website Routes
Route::get('/', function () {
    return view('pages.home');
})->name('home');

Route::get('/about', function () {
    return view('pages.about');
})->name('about');

Route::get('/services', function () {
    return view('pages.services');
})->name('services');

Route::get('/track', function () {
    return view('pages.track');
})->name('track');

Route::get('/quote', function () {
    return view('pages.quote');
})->name('quote');

Route::get('/contact', function () {
    return view('pages.contact');
})->name('contact');

Route::get('/faq', function () {
    return view('pages.faq');
})->name('faq');

// Staff Admin Portal Routes
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/', function () {
        return view('admin.dashboard');
    })->name('dashboard');

    Route::get('/login', function () {
        return view('admin.login');
    })->name('login');

    Route::get('/manifests', function () {
        return view('admin.manifests');
    })->name('manifests');

    Route::get('/messages', function () {
        return view('admin.messages');
    })->name('messages');

    Route::get('/quotes', function () {
        return view('admin.quotes');
    })->name('quotes');
});

// Super Admin Executive Portal Routes
Route::prefix('super-admin')->name('super-admin.')->group(function () {
    Route::get('/', function () {
        return view('super-admin.dashboard');
    })->name('dashboard');

    Route::get('/login', function () {
        return view('super-admin.login');
    })->name('login');

    Route::get('/manifests', function () {
        return view('super-admin.manifests');
    })->name('manifests');

    Route::get('/drivers', function () {
        return view('super-admin.drivers');
    })->name('drivers');

    Route::get('/finance', function () {
        return view('super-admin.finance');
    })->name('finance');

    Route::get('/staff', function () {
        return view('super-admin.staff');
    })->name('staff');

    Route::get('/audit', function () {
        return view('super-admin.audit');
    })->name('audit');

    Route::get('/settings', function () {
        return view('super-admin.settings');
    })->name('settings');
});

// Branded Error Pages Preview
Route::prefix('errors')->name('errors.')->group(function () {
    Route::get('/403', fn() => response()->view('errors.403', [], 403))->name('403');
    Route::get('/404', fn() => response()->view('errors.404', [], 404))->name('404');
    Route::get('/500', fn() => response()->view('errors.500', [], 500))->name('500');
    Route::get('/503', fn() => response()->view('errors.503', [], 503))->name('503');
});

// Legacy .html redirects & aliases
Route::redirect('/index.html', '/');
Route::redirect('/about.html', '/about');
Route::redirect('/services.html', '/services');
Route::redirect('/track.html', '/track');
Route::redirect('/quote.html', '/quote');
Route::redirect('/contact.html', '/contact');
Route::redirect('/faq.html', '/faq');
Route::redirect('/admin.html', '/admin');
Route::redirect('/admin-login.html', '/admin/login');
Route::redirect('/admin-manifests.html', '/admin/manifests');
Route::redirect('/admin-messages.html', '/admin/messages');
Route::redirect('/admin-quotes.html', '/admin/quotes');
Route::redirect('/super-admin.html', '/super-admin');
Route::redirect('/super-admin-login.html', '/super-admin/login');
Route::redirect('/super-admin-manifests.html', '/super-admin/manifests');
Route::redirect('/super-admin-drivers.html', '/super-admin/drivers');
Route::redirect('/super-admin-finance.html', '/super-admin/finance');
Route::redirect('/super-admin-staff.html', '/super-admin/staff');
Route::redirect('/super-admin-audit.html', '/super-admin/audit');
Route::redirect('/super-admin-settings.html', '/super-admin/settings');
Route::redirect('/403.html', '/errors/403');
Route::redirect('/404.html', '/errors/404');
Route::redirect('/500.html', '/errors/500');
Route::redirect('/503.html', '/errors/503');

// Laravel Breeze Default Routes
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
