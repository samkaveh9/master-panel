<?php

namespace Modules\Category\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Category\Http\Requests\CategoryRequest;
use Modules\Category\Models\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        return view('category::index', ['categories' => Category::all()]);
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('category::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param CategoryRequest $request
     * @return Renderable
     */
    public function store(CategoryRequest $request)
    {
        Category::create($request->validated());
        flash()->title("successfully action")
            ->success('دسته بندی با موفقیت اضافه شد')->flash();
        return back();
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
//        return view('category::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param Category $category
     * @return Renderable
     */
    public function edit(Category $category)
    {
        alert()->info('Info Message', 'Optional Title');
        $categories = Category::all();
        return view('category::edit', ['category' => $category, 'categories' => $categories]);
    }

    /**
     * Update the specified resource in storage.
     * @param CategoryRequest $request
     * @param Category $category
     * @return Renderable
     */
    public function update(CategoryRequest $request, Category $category)
    {
        $category->update($request->validated());
        flash()->title("successfully action")
            ->success('دسته بندی با موفقیت ویرایش شد')->flash();
        return redirect(route('categories.index'));
    }

    /**
     * Remove the specified resource from storage.
     * @param Category $category
     * @return Renderable
     */
    public function destroy(Category $category)
    {
        $category->delete();
        flash()->title("successfully action")
            ->success('دسته بندی با موفقیت حذف شد')->flash();
        return back();
    }
}
