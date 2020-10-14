<?php

namespace App\Http\Controllers\Backend;


use App\Http\Requests;
use App\Category;
use App\Post;
use App\User;

class UsersController extends backendController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::orderBy('name')->paginate(6);
        $usersCount = User::count();
        return view('backend.users.index',compact('users','usersCount'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = new User();
        return view('backend.users.create',compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Requests\UserStoreRequest $request)
    {
        $request->password = bcrypt($request->password);
        // return $request->all();
        // $this->admin->password = Hash::make($request->input('password'));
        $user = User::create($request->all());
        $user->attachRole($request->role);
        // $request->user()->fill([
        //     'password' => bcrypt($request->password)
        // ])->save();
        return redirect(route('users.index'))->with('message','New User created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('backend.users.edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Requests\UserUpdateRequest $request, $id)
    {
        $user = User::findOrFail($id);
        $user->detachRole($user->role);
        $user->attachRole($request->role);
        $user->update($request->all());
        return redirect(route('users.index'))->with('message','User was updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Requests\UserDestroyRequest $request,$id)
    {
        
        $user = User::findOrFail($id);
        $deletion_option = $request->deletion_option;
        $selected_user = $request->selected_user;
        if($deletion_option == 'delete'){
            $user->posts()->withTrashed()->forceDelete();
        }elseif($deletion_option = 'attribute'){
            $user->posts()->update('author_id',$selected_user);
        }
        $user->delete();
        return redirect(route('users.index'))->with('message','User was deleted successfully');
    }

    public function confirm(Requests\UserDestroyRequest $request,$id)
    {
        
        $user = User::findOrFail($id);
        $users = User::where('id','!=',$user->id)->pluck('name','id');
        return view('backend.users.confirm',compact('user','users'));
    }
}
