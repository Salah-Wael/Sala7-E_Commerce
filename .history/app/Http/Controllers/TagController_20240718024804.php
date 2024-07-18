<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function create()
    {
        return view('tag.create');
    }
    public function index()
    {
        $tags = Tag::all()->sortByDesc('name');
        return view('tag.index', compact('tags'));
    }

    

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

    public function edit(int $tagId)
    {
        $tag = Tag::findOrFail($tagId);
        return view('tag.edit', compact('tag'));
    }

    public function update(Request $request, int $tagId)
    {
        $tag = Tag::findOrFail($tagId);

        $data = $request->validate(
            [
                'tag' => 'required|string|unique:tags',
            ],
            [
                'tag.unique' => "$tag->tag has already been created."
            ]
        );

        $tag->tag = ucwords(strtolower($data['tag']));
        $tag->update();

        return redirect()->route('tag.index');
    }

    public function delete(int $tagId)
    {
        $tag = Tag::findOrFail($tagId);
        $tag->delete();

        return redirect()->route('tag.index');
    }
}
