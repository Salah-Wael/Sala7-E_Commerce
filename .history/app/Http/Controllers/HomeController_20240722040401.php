<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        $result = DB::table('categories')->get();

        $news = News::with('tags')
            ->join('users', 'news.user_id', '=', 'users.id')
            ->select('news.*', 'users.name', 'users.role')
            ->orderBy('news.created_at', 'desc')
            ->limit(3)
            ->get();

        return view('welcome', ['categories' => $result, 'news' => $news]);
    }
}
