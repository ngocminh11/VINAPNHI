<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection;
use App\Models\Comment;

class ActivitiesController extends Controller
{
    protected function allArticles(): Collection
    {
        $items = collect(config('site.activities', []));
        // đảm bảo có slug hợp lệ
        return $items->filter(fn($a)=> isset($a['slug']) && preg_match('/^[a-z0-9-]+$/',$a['slug']));
    }

    public function index(Request $request)
    {
        $all = $this->allArticles();
        // phân trang 5 bài / trang
        $page = max(1, (int)$request->query('page', 1));
        $perPage = 5;
        $paginator = new LengthAwarePaginator(
            $all->forPage($page, $perPage)->values(),
            $all->count(),
            $perPage,
            $page,
            ['path' => route('activities.index')]
        );
        return view('pages.activities.index', [
            'articles' => $paginator,
        ]);
    }

    public function show(Request $request, string $slug)
    {
        $all = $this->allArticles();
        $article = $all->firstWhere('slug', $slug);
        abort_if(!$article, 404);

        // bình luận đã duyệt
        $comments = Comment::query()
            ->where('article_slug', $slug)
            ->where('approved', true)
            ->latest()
            ->get();

        $avgRating = round((float) Comment::where('article_slug', $slug)->where('approved', true)->avg('rating'), 1);

        // liên quan: random 4-6 bài khác
        $take = random_int(4, 6);
        $related = $all->where('slug','!=',$slug)->shuffle()->take($take)->values();

        return view('pages.activities.show', [
            'article'   => $article,
            'slug'      => $slug,
            'comments'  => $comments,
            'avgRating' => $avgRating,
            'related'   => $related,
        ]);
    }

    public function comment(Request $request, string $slug)
    {
        $all = $this->allArticles();
        abort_if(!$all->firstWhere('slug', $slug), 404);

        $data = $request->validate([
            'name'   => ['required','string','max:120'],
            'rating' => ['required','integer','min:1','max:5'],
            'body'   => ['required','string','max:5000'],
        ]);

        Comment::create([
            'article_slug' => $slug,
            'name'   => $data['name'],
            'rating' => (int)$data['rating'],
            'body'   => $data['body'],
            'approved' => true, // nếu cần duyệt tay thì set false và làm trang admin
        ]);

        return redirect()->route('activities.show', $slug)->with('ok','Cảm ơn bạn đã bình luận.');
    }
}
