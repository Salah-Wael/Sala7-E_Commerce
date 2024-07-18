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
                'tag' => 'required|string|unique:tags', 
            ],
            #error
            [
                'tag.unique' => "The tag has already been Created."
            ]
        );

        $tag = new Tag();
        $tag->tag = ucwords(strtolower($data['tag']));
        $tag->save();

        return redirect()->route('tag.index');
    }

    /**
     * Display the specified resource.
     */

    public function edit(int $tagId)
    {
        $tag = Tag::findOrFail($tagId);
        return view('tag.edit', compact('tag'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $tagId)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(string $tagId)
    {
        $tag = Tag::findOrFail($tagId);
        $tag->delete();

        return redirect()->route('tag.index');
    }
}
