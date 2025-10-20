<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiteController;

// Trang chủ
Route::get('/', [SiteController::class, 'home'])->name('home');

// Trang tĩnh chính (render từ config, không DB)
Route::get('/gioi-thieu', [SiteController::class, 'about'])->name('about');
Route::get('/thu-ngo', [SiteController::class, 'letter'])->name('letter');
Route::get('/ho-so-nang-luc', [SiteController::class, 'profile'])->name('profile');
Route::get('/khach-hang', [SiteController::class, 'customers'])->name('customers');
Route::get('/lien-he', [SiteController::class, 'contact'])->name('contact');
Route::get('/bao-gia', [SiteController::class, 'pricing'])->name('pricing');
Route::get('/quy-trinh', [SiteController::class, 'process'])->name('process');

// Dịch vụ: index + chi tiết (slug lấy từ config)
Route::get('/dich-vu', [SiteController::class, 'services'])->name('services.index');
Route::get('/dich-vu/{slug}', [SiteController::class, 'serviceShow'])->name('services.show');

// Hoạt động & Tin tức (từ config)
Route::get('/hoat-dong', [SiteController::class, 'activities'])->name('activities.index');
Route::get('/tin-tuc', [SiteController::class, 'news'])->name('news.index');

// Văn bản pháp luật & Liên kết web
Route::get('/van-ban-phap-luat', [SiteController::class, 'legal'])->name('legal');
Route::get('/lien-ket-web', [SiteController::class, 'links'])->name('links');
