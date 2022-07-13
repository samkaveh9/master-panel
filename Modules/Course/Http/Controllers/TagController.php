<?php

namespace Modules\Course\Http\Controllers;

use App\Http\Controllers\Controller;
use Modules\Course\Http\Requests\TagRequest;
use Modules\Course\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        flash()->addSuccess('Data has been saved successfully!', 'opt');
        return view('course::tags.index', ['tags' => Tag::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  TagRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TagRequest $request)
    {
        Tag::create($request->validated());
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function show(Tag $tag)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function edit(Tag $tag)
    {
       return view('course::tags.edit', ['tag' => $tag]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  TagRequest  $request
     * @param  Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function update(TagRequest $request, Tag $tag)
    {
        $tag->update($request->validated());
        return redirect(route('tags.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tag $tag)
    {
        $tag->delete();
        return back();
    }
}
