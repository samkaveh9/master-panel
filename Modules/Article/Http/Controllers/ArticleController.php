<?php

namespace Modules\Article\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Article\Http\Requests\ArticleRequest;
use Modules\Article\Models\Article;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        return view('article::index', ['articles' => Article::all()]);
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('article::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param ArticleRequest $request
     * @return Renderable
     */
    public function store(ArticleRequest $request)
    {
        if ($request->hasFile('banner')) {
            $file = $request->file('banner');
            $fileExtension = $file->getClientOriginalExtension();
            $fileName = date('Ymdhis') . '.' . $fileExtension;
            $file->move(storage_path('app/public/'), $fileName);
            Article::create(array_merge($request->validated(), ['banner' => $fileName]));
        }
        return redirect(route('articles.index'));
    }

    /**
     * Show the specified resource.
     * @param Article $article
     * @return Renderable
     */
    public function show(Article $article)
    {
        return view('article::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param Article $article
     * @return Renderable
     */
    public function edit(Article $article)
    {
        return view('article::edit', compact('article'));
    }

    /**
     * Update the specified resource in storage.
     * @param ArticleRequest $request
     * @param Article $article
     * @return Renderable
     */
    public function update(ArticleRequest $request, Article $article)
    {
        if ($request->hasFile('banner')) {
            unlink(storage_path('app/public/'. $article->banner));
            $file = $request->file('banner');
            $fileExtension = $file->getClientOriginalExtension();
            $fileName = date('Ymdhis') . '.' . $fileExtension;
            $file->move(storage_path('app/public/'), $fileName);
            $article->update(array_merge($request->validated(), ['banner' => $fileName]));
        }else{
            $article->update(array_merge($request->validated(), ['banner' => $article->banner]));
        }
        return redirect(route('articles.index'));
    }

    /**
     * Remove the specified resource from storage.
     * @param Article $article
     * @return Renderable
     */
    public function destroy(Article $article)
    {
        unlink(storage_path('app/public/'. $article->banner));
        $article->delete();
        return back();
    }
}
