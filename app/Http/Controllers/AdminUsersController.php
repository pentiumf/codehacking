<?php

namespace App\Http\Controllers;
use App\Http\Requests\UserEditRequest;
use Illuminate\Http\Request;
use App\Http\Requests\UsersRequest;
use Illuminate\Support\Facades\Session;
use App\User;
use App\Role;
use App\Photo;



class AdminUsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();

        return view('admin.users.index', compact('users')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //roles 
        $roles = Role::pluck('name', 'id')->all();

        return view('admin.users.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UsersRequest $request)
    {
        //User::create($request->all());

        if (trim($request->password == '')) {
            $input = $request->except('password');
        } else {
            $input = $request->all();
        } 


        if ($file = $request->file ('photo_id')) {
            $name = time() . $file->getClientOriginalName();

            $file->move('images', $name);

            $photo = Photo::create(['file' => $name]);

            $input['photo_id'] = $photo->id;

        }

        $input['password'] = bcrypt($request->password);


        User::create($input);

        return redirect('admin/users');

        //return $request->all();

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('admin.users.show');
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

        //roles 
        $roles = Role::pluck('name', 'id')->all(); 

        return view('admin.users.edit', compact('user', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UsersRequest $request, $id)
    {
        $user = User::findOrFail($id);

        if (trim($request->password == '')) {
            $input = $request->except('password');
        } else {
            $input = $request->all();
        }


        if ($file = $request->file ('photo_id')) {
            $name = time() . $file->getClientOriginalName();

            $file->move('images', $name);

            $photo = Photo::create(['file' => $name]);

            $input['photo_id'] = $photo->id;

        } 

        $input['password'] = bcrypt($request->password);

        $user->update($input);

        return redirect('admin/users');

        // return $request->all(); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);

        unlink(public_path() . "/images/" . $user->photo->file);

        $user->delete();

        Session::flash('deleted_user', 'User deleted');

        return redirect('admin/users');
    }
}










