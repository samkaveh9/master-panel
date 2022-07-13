<?php

namespace Modules\Slider\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Slider\Models\Slider;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        return view('slider::index', ['sliders' => Slider::all()]);
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('slider::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        if ($request->hasFile('slide')) {
            $file = $request->file('slide');
            $fileExtension = $file->getClientOriginalExtension();
            $fileName = date('Ymdhis') . '.' . $fileExtension;
            $file->move(storage_path('app/public/'), $fileName);
            Slider::create(array_merge($request->only('title', 'status'), ['slide' => $fileName]));
        }
        return redirect(route('slider.index'));
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('slider::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param Slider $slider
     * @return Renderable
     */
    public function edit(Slider $slider)
    {
        return view('slider::edit', compact('slider'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param Slider $slider
     * @return Renderable
     */
    public function update(Request $request, Slider $slider)
    {
        if ($request->hasFile('slide')) {
            unlink(storage_path('app/public/'. $slider->slide));
            $file = $request->file('slide');
            $fileExtension = $file->getClientOriginalExtension();
            $fileName = date('Ymdhis') . '.' . $fileExtension;
            $file->move(storage_path('app/public/'), $fileName);
            $slider->update(array_merge($request->only('title', 'status'), ['slide' => $fileName]));
        }else{
            $slider->update(array_merge($request->only('title', 'status'), ['slide' => $slider->slide]));
        }
        return  redirect(route('slider.index'));
    }

    /**
     * Remove the specified resource from storage.
     * @param Slider $slider
     * @return Renderable
     */
    public function destroy(Slider $slider)
    {
        unlink(storage_path('app/public/'. $slider->slide));
        $slider->delete();
        return back();
    }
}
