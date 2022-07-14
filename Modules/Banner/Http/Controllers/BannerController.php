<?php

namespace Modules\Banner\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Banner\Http\Requests\BannerRequest;
use Modules\Banner\Models\Banner;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        return view('banner::index', ['banners' => Banner::all()]);
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('banner::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param BannerRequest $request
     * @return Renderable
     */
    public function store(BannerRequest $request)
    {
        if ($request->hasFile('banner')) {
            $file = $request->file('banner');
            $fileExtension = $file->getClientOriginalExtension();
            $fileName = date('Ymdhis') . '.' . $fileExtension;
            $file->move(storage_path('app/public/'), $fileName);
            Banner::create(array_merge($request->validated(), ['banner' => $fileName]));
            flash()->title("successfully action")
                ->success('بنر با موفقیت اضافه شد')->flash();
        }
        return redirect(route('banners.index'));
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('banner::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param Banner $banner
     * @return Renderable
     */
    public function edit(Banner $banner)
    {
        return view('banner::edit', compact('banner'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param Banner $banner
     * @return Renderable
     */
    public function update(Request $request, Banner $banner)
    {
        if ($request->hasFile('banner')) {
            unlink(storage_path('app/public/'. $banner->banner));
            $file = $request->file('banner');
            $fileExtension = $file->getClientOriginalExtension();
            $fileName = date('Ymdhis') . '.' . $fileExtension;
            $file->move(storage_path('app/public/'), $fileName);
            $banner->update(array_merge($request->only('title', 'status'), ['banner' => $fileName]));
            flash()->title("successfully action")
                ->success('بنر با موفقیت ویرایش شد')->flash();
        }else{
            $banner->update(array_merge($request->only('title', 'status'), ['banner' => $banner->banner]));
            flash()->title("successfully action")
                ->success('بنر با موفقیت ویرایش شد')->flash();
        }
        return redirect(route('banners.index'));
    }

    /**
     * Remove the specified resource from storage.
     * @param Banner $banner
     * @return Renderable
     */
    public function destroy(Banner $banner)
    {
        unlink(storage_path('app/public/'. $banner->banner));
        $banner->delete();
        flash()->title("successfully action")
            ->success('بنر با موفقیت حذف شد')->flash();
        return back();
    }
}
