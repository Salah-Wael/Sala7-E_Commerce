<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tags = Tag::all()->sortByDesc('name');
        return view('tag.index', compact('tags'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tag.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate(
            [
                'tag' => 'required|string',
            ]
        );

        $tag = new Tag();
        $tag->tag = ucwords(strtolower($data['tag']));
        $tag->save();
    }

    /**
     * Display the specified resource.
     */

    public function edit(string $tagId)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $tagId)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(string $tagId)
    {
        //
    }
}
