<?php

namespace App\Http\Controllers;

use Intervention\Image\Facades\Image;
use Modules\Banner\Http\Requests\BannerRequest;
use Modules\Banner\Models\Banner;
use Exception;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }


    public function store(BannerRequest $request)
    {
        dd('local');
        if ($request->file('banner'))
        {
            dd($request->all());
        }


        try {
            if ($request->file('banner')) {
                $file = $request->file('banner');
                $fileExtension = strtolower($file->getClientOriginalExtension());
                $fileName = date('Ymdhis') . '.' . $fileExtension;
                Image::make($file)->resize(128, 128)->save(storage_path('app/public/') . $fileName);
                Banner::create(array_merge($request->validated(), ['banner' => $fileName]));
                $banner = new Banner();
                $banner->title = $request->title;
                $banner->status = $request->status;
                $banner->banner = $request->banner;
                $banner->save();
                $fileName = time().'.'.$request->file->extension();

                $request->file->move(public_path('uploads'), $fileName);
            }
        } catch (Exception $e) {
            dd($e);
//            toast('مشکلی رخ داده دوباره تلاش کنید!','error','top-right')->showCloseButton();
//            return back();
        }
//        toast('اطلاعات دانشجو با موفقیت ثبت شد!','success','top-right')->showCloseButton();
        return back();
    }
}
