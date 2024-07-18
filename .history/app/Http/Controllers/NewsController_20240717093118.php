<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use App\Http\Controllers\ImageController;

class NewsController extends Controller
{
    protected $userId;

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            if (Auth::check()) {
                $this->userId = Auth::user()->id;
            } else {
                return redirect()->route('login');
            }

            return $next($request);
        });
    }

    public function create()
    {
        $tags = Tag::all();
        return view('news.create', ['tags' => $tags]);
    }

    public function store(Request $request) {
        $data= $request->validate([
                'title' => 'required|string',
                'content' => 'required|string',
                'image' => 'required|image|mimes:jpeg,jpg,png,jfif,svg|max:5048'
            ],
            #errors
            [
                'image' . 'image' => "The image field must be an image.",
                'image' . 'mimes' => "The image field must be an image with extention (jpeg, jpg, png, jfif, or svg).",
            ]
        );

        $news = new News();
            $news->image = ImageController::storeImage($request, 'image', 'assets/img/news');
            $news->title = $data['title'];
            $news->content = $data['content'];
            $news->user_id = $this->userId;
            $news->save();

        $tags = $request->get('tags');
        if ($tags) {
            $news->tags()->attach($tags);
        }

        return redirect()->route('news.index')->with('success', "News created successfully.");
    }

    

    public function index(Request $request){

        if ($request->has('search')) {
            $search = $request->get('search');
            $news = News::with('tags')
            ->whereHas('tags', function ($query) use ($search) {
                $query->where('tag', 'LIKE', "%$search%");
            })
            ->orWhereHas("user", function ($query) use ($search, $request) {
                $query->whereRaw("name", "LIKE", "%$search%")
                ->when($request->has('search') && $request->get('search') == 'admin', function ($query) use ($search) {
                    $query->orWhere("role", "LIKE", "%$search%");
                });
            })
            ->orWhere("title", "LIKE", "%$search%")
            ->orWhere("content", "LIKE", "%$search%")
            ->join('users', 'news.user_id', '=', 'users.id')
            ->select('news.*', 'users.name', 'users.role')
            ->orderBy('news.created_at', 'desc')
            ->get();

        }
        else{
            $news = News::with('tags')
            ->join('users', 'news.user_id', '=', 'users.id')
            ->select('news.*', 'users.name', 'users.role')
            ->orderBy('news.created_at', 'desc')
            ->get();

            $tags = Tag::all();
        }

        return view('news.index', compact('news','tags'));
    }

    public function show(int $newsId) {

        $news = News::find($newsId)
        ->join('users', 'news.user_id', '=', 'users.id')
        ->select('news.*', 'users.name', 'users.role')
        ->where('news.id', $newsId)
        ->first();

        if($news->count() == 0){

            $tags = $news->tags;

            $relatedNews = [];
            $addedNewsIds = []; // Temporary array to keep track of added news IDs

            foreach ($tags as $tag) {
                foreach ($tag->news->where("id", "!=", $news->id) as $related) {
                    if (!in_array($related->id, $addedNewsIds)) {
                        $relatedNews[] = $related;
                        $addedNewsIds[] = $related->id;
                    }
                }
            }

            return view('news.show', compact('news', 'relatedNews'));
        }
        return view('error.404');
        }
    

    public  function delete($newsId) {

        $news = News::find($newsId);

        if($news){

            if (((auth()->user()->role == 'admin') || (auth()->user()->role == 'salesman' && $this->userId == $news->user_id))) {

                File::delete(public_path('assets/img/news/') . $news->image);
                DB::table('news')->where('id', $newsId)->delete();

                return redirect()->route('news.index')->with('success', "Your news deleted successfully");
            } else {
                return view('error.401');
            }
        }
        return view('error.404');
    }
}
