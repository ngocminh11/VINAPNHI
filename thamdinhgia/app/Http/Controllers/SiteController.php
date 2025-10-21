<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;

class SiteController extends Controller
{
    public function home()        { return view('home'); }
    public function about()       { return view('pages.gioi-thieu'); }
    public function letter()      { return view('pages.thu-ngo'); }
    public function profile()     { return view('pages.ho-so-nang-luc'); }
    public function customers()   { return view('pages.khach-hang'); }
    public function contact()     { return view('pages.lien-he'); }
    public function pricing()     { return view('pages.bao-gia'); }
    public function process()     { return view('pages.quy-trinh'); }

    public function services()    { return view('pages.dich-vu.index'); }

    public function serviceShow(string $slug)
    {
        // Tìm dịch vụ theo slug sinh từ title trong config
        $tiles = config('site.home.serviceTiles') ?? [];
        $found = collect($tiles)->first(function ($t) use ($slug) {
            $title = $t['title'] ?? '';
            return Str::slug($title) === $slug;
        });

        abort_if(!$found, 404);
        return view('pages.dich-vu.show', ['service' => $found]);
    }

    public function activities()  { return view('pages.hoat-dong'); }
    public function news()        { return view('pages.tin-tuc'); }
    public function legal()       { return view('pages.van-ban'); }
    public function links()       { return view('pages.lien-ket'); }
}
