<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiteController;

// Trang chủ
Route::get('/', [SiteController::class, 'home'])->name('home');

// Trang tĩnh chính (render từ config)
Route::get('/gioi-thieu',       [SiteController::class, 'about'])->name('about');
Route::get('/thu-ngo',          [SiteController::class, 'letter'])->name('letter');
Route::get('/ho-so-nang-luc',   [SiteController::class, 'profile'])->name('profile');
Route::get('/khach-hang',       [SiteController::class, 'customers'])->name('customers');
Route::get('/lien-he',          [SiteController::class, 'contact'])->name('contact');
Route::get('/bao-gia',          [SiteController::class, 'pricing'])->name('pricing');
Route::get('/quy-trinh',        [SiteController::class, 'process'])->name('process');

// Dịch vụ: index + chi tiết (slug chỉ nhận a-z0-9, gạch)
Route::get('/dich-vu',          [SiteController::class, 'services'])->name('services.index');
Route::get('/dich-vu/{slug}',   [SiteController::class, 'serviceShow'])
    ->where('slug', '[a-z0-9-]+')
    ->name('services.show');

// Hoạt động & Tin tức
Route::get('/hoat-dong',        [SiteController::class, 'activities'])->name('activities.index');
Route::get('/tin-tuc',          [SiteController::class, 'news'])->name('news.index');

// Văn bản pháp luật & Liên kết web
Route::get('/van-ban-phap-luat',[SiteController::class, 'legal'])->name('legal');
Route::get('/lien-ket-web',     [SiteController::class, 'links'])->name('links');

// 404 gọn gàng (tùy view của bạn)
Route::fallback(function () {
    return response()->view('errors.404', [], 404);
});
