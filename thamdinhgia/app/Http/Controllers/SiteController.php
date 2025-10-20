<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class SiteController extends Controller
{
    private array $site;

    public function __construct()
    {
        $this->site = config('site');
    }

    public function home(): View   { return view('home', ['site' => $this->site]); }
    public function about(): View  { return view('pages.about',  ['site' => $this->site]); }
    public function letter(): View { return view('pages.letter', ['site' => $this->site]); }
    public function profile(): View{ return view('pages.profile',['site' => $this->site]); }
    public function customers(): View{ return view('pages.customers',['site'=>$this->site]); }
    public function contact(): View{ return view('pages.contact',['site'=>$this->site]); }
    public function pricing(): View{ return view('pages.pricing',['site'=>$this->site]); }
    public function process(): View{ return view('pages.process',['site'=>$this->site]); }

    public function services(): View
    {
        return view('pages.services.index', ['services' => $this->site['services_catalog'] ?? []]);
    }

    public function serviceShow(string $slug): View
    {
        $items = $this->site['services_catalog'] ?? [];
        $service = collect($items)->firstWhere('slug', $slug);
        abort_if(!$service, 404);
        return view('pages.services.show', compact('service'));
    }

    public function activities(): View
    {
        return view('pages.activities', ['items' => $this->site['activities'] ?? []]);
    }

    public function news(): View
    {
        return view('pages.news', ['items' => $this->site['news'] ?? []]);
    }

    public function legal(): View
    {
        return view('pages.legal', ['docs' => $this->site['legal_docs'] ?? []]);
    }

    public function links(): View
    {
        return view('pages.links', ['links' => $this->site['web_links'] ?? []]);
    }
}
