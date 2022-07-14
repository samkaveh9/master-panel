<?php

namespace Modules\User\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\User\Http\Requests\UserRequest;
use Modules\User\Models\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        return view('user::index', ['users' => User::all()]);
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('user::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {

    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('user::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('user::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        //
    }

    /**
     * Show the specified information of user and edit it.
     * @param User $user
     * @return Renderable
     */
    public function info(User $user)
    {
       return view('user::info', compact('user'));
    }


    /**
     * Show the specified information of user and edit it.
     * @param  UserRequest $request
     * @param  User $user
     * @return Renderable
     */
    public function storeInfo(UserRequest $request, User $user)
    {
        if ($request->hasFile('image')){
            if ($user->image != ''){
                unlink(storage_path('app/public/'. $user->image));
            }
            $file = $request->file('image');
            $fileExtension = strtolower($file->getClientOriginalExtension());
            $fileName = date('Ymdhis') . '.' . $fileExtension;
            $file->move(storage_path('app/public/'), $fileName);
            $user->update(array_merge($request->validated(), ['image' => $fileName]));
        }else{
            $user->update(array_merge($request->validated(), ['image' => $user->image]));
        }
        return back();
    }

    /**
     * Show the specified information of user and edit it.
     * @param  Request $request
     * @param  User $user
     * @return Renderable
     */
    public function userImageStore(Request $request, User $user)
    {
        if ($request->hasFile('image')){
            if ($user->image != ''){
                unlink(storage_path('app/public/'. $user->image));
            }
            $file = $request->file('image');
            $fileExtension = strtolower($file->getClientOriginalExtension());
            $fileName = date('Ymdhis') . '.' . $fileExtension;
            $file->move(storage_path('app/public/'), $fileName);
            $user->update(['image' => $fileName]);
        }
        return back();
    }

}
